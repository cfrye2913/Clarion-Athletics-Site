<?php
//class that represents an athlete that is signed up to the site
class Member{
    /**
     * @var int
     */
    public $memberId;

    /**
     * @var string
     */
    public $FName;
    /**
     * @var string
     */
    public $LName;
    /**
     * @var string
     */
    public $email;
    /**
     * @var int
     */
    public $sport;
    /**
     * @var DateTime
     */
    public $dateRegistered;

    /**
     * @var int
     */
    public $receive_newsletter;
    /**
     * @var string
     */
    public $sport_name;//not used adding members, set when retrieving members from db
}

//class that represents a sport
//maps a sport ID to a sports name
class Sport{
    /**
     * @var int
     */
    public $sportsNum;

    /**
     * @var int
     */
    public $sportsName;
}

class Image{
    /**
     * @var int
     */
    public $imageId;
    /**
     * @var string
     */
    public $imagePath;
}

class User {
    /**
     * @var int
     */
    public $user_id;
    /**
     * @var string
     */
    public $username;
    /**
     * @var string
     */
    public $hashedPass;
    /**
     * @var string
     */
    public $salt;
    /**
     * @var string
     */
    public $role;
    /**
     * @var bool
     */
    public $isActive;
}

//TODO Ensure this connection is the proper connection
function _getConnection() {
    $dsn = 'mysql:host=localhost;dbname=athletics_db';
    $username = 'root';
    $password = 'root';

    return new \PDO($dsn, $username, $password);
}

function _generatePassword(string $plaintext_pass, string $salt) {
    return hash('sha512', $salt . $plaintext_pass);
}

function verifyPassword(string $plaintext, string $salt, string $hashed) {
    return hash('sha512', $salt . $plaintext) == $hashed;
}

//TODO Necessary functions:
//inserts for all
//delete for all
//update for user, images
//getallimages, getallsports, getathletebyid, getathletebyname, getathletebysport

function insertMember(\Member $member){
    $db = _getConnection();
    $sport_num = getSportIdByName($member->sport);
    $query = "INSERT INTO `member` (`fname`, `lname`, `signupdate`, `sport`, `email`, `receive_newsletters`) 
          VALUES (:fname, :lname, :signupdate, :sport, :email, :receive_newsletters)";
    $statement = $db->prepare($query);

    $statement->bindValue(':fname', $member->FName);
    $statement->bindValue(':lname', $member->LName);
    $statement->bindValue(':signupdate', date('Y-m-d', strtotime("now")));
    //$statement->bindValue(':signupdate', $member->dateRegistered);
    $statement->bindValue(':sport', $sport_num);
    $statement->bindValue(':email', $member->email);
    $statement->bindValue(':receive_newsletters', $member->receive_newsletter);


    $success = $statement->execute();
    $statement->closeCursor();
    return $db->lastInsertId();
}
//Gets the members that have elected to receive newsletters' emails
function getNewsletterMembersEmails() {
    $db = _getConnection();
    $query = "SELECT `email` FROM `member` WHERE receive_newsletters = 1";
    $statement = $db->prepare($query);

    $success = $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    $parsedResults = array();
    foreach ($results as $member){
        array_push($parsedResults, $member['email']);
    }
    return $parsedResults;
}

const MEMBER_QUERY = 'SELECT `member_id`, `fname`, `lname`, `signupdate`, `sport`, `email`, `receive_newsletters`, `sport_name` FROM member';

function _memberFromRow($result){
    $member = new \Member();

    $member->memberId = $result['member_id'];
    $member->FName = $result['fname'];
    $member->LName = $result['lname'];
    $member->dateRegistered = date_create_from_format('Y-m-d' ,$result['signupdate']);
    $member->sport = $result['sport'];
    $member->email = $result['email'];
    $member->receive_newsletter = $result['receive_newsletters'] > 0;
    $member->sport_name = $result['sport_name'];
    return $member;
}

function getAllMembers(){
    $db = _getConnection();
    $query = MEMBER_QUERY . ' INNER JOIN sport ON member.sport = sport.sport_num';
    $statement = $db->prepare($query);

    $success = $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    $parsedResults = array();
    foreach ($results as $result){
        array_push($parsedResults, _memberFromRow($result));
    }
    return $parsedResults;
}


function getMemberById($id){
    $db = _getConnection();
    $query = MEMBER_QUERY . ' INNER JOIN sport ON member.sport = sport.sport_num WHERE member_id = :memberId';
    $statement = $db->prepare($query);
    $statement->bindValue(':memberId', $id);

    $success = $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();

    return _memberFromRow($result);
}

//Allows the administrator to insert a sport into the database
function insertSport(\Sport $sport){
    $db = _getConnection();
    $query = "INSERT INTO  `sport`(sport_name) VALUES (:sportName)";

    $statement = $db-> prepare($query);

    $statement->bindValue(':sportName', $sport->sportsName);
    $success = $statement->execute();
    $statement->closeCursor();
    return $db->lastInsertId();
}

//Gets all sports in the database
function getSports() {
    $db = _getConnection();
    $query = "SELECT * FROM `sport`";

    $statement = $db->prepare($query);
    $success = $statement->execute();
    $results = $statement->fetchAll();

    $statement->closeCursor();
    $parsedResults = array();
    foreach ($results as $result){
        array_push($parsedResults, $result);
    }
    return $parsedResults;
}

function getSportIdByName($sport_name)
{
    $db = _getConnection();
    $query = "SELECT `sport_num` FROM `sport` WHERE sport_name = :sport_name";

    $statement = $db->prepare($query);
    $statement->bindValue(":sport_name", $sport_name);

    $success = $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    return intval($result['sport_num']);
}
//Parses the results of the sports query
function sportFromRow($result){
    $sport = new \Sport();

    $sport->sportsNum = $result['sport_num'];
    $sport->sportsName = $result['sport_name'];
    return $sport;
}

function insertImage(\Image $image){
    $db = _getConnection();
    $query = "INSERT INTO `image` (image_path) VALUES (:imagePath)";

    $statement = $db->prepare($query);
    $statement->bindValue(':imagePath', $image->imagePath);

    $statement->execute();
    $statement->closeCursor();

    return $db->lastInsertId();
}

const IMAGE_QUERY = 'SELECT `image_id`, `image_path` FROM image';

function _imageFromRow($result){
    $image = new \Image();

    $image->imageId = $result['image_id'];
    $image->imagePath = $result['image_path'];

    return $image;
}

function getImage($id){
    $db = _getConnection();
    $query = IMAGE_QUERY . ' WHERE image_id = :imageId';

    $statement = $db->prepare($query);
    $statement->bindValue(':imageId', $id);

    $success = $statement->execute();
    $result = $statement->fetch();

    return _imageFromRow($result);
}
function getAllImages(){
    $db = _getConnection();
    $query = IMAGE_QUERY;

    $statement = $db->prepare($query);

    $success = $statement->execute();
    $results = $statement->fetchAll();

    $parsedResults = [];
    foreach($results as $result){
        array_push($parsedResults, _imageFromRow($result));
    }
    return $parsedResults;
}

/**
 * @param User $user
 * @return string
 * if no id passed in, add
 * if id passed in, update
 */
function persistUser(User $user) {
    if (!isset($user->id) || $user->id == null)
        return _insertUser($user);
    else
        return _updateUser($user);
}

function _insertUser($user) {
    $db = _getConnection();
    $query = "INSERT INTO `user` (username, password, salt, role, isActive) VALUES
            (':username', ':pass', ':salt', ':role', ':active')";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $user->username);
    $statement->bindValue(':pass', $user->password);
    $statement->bindValue(':salt', $user->salt);
    $statement->bindValue(':role', $user->role);
    $statement->bindValue(':active', $user->isActive);

    $success = $statement->execute();
    $statement->closeCursor();

    return $db->lastInsertId();
}

/**
 * @param $result
 * @return User
 */
function _userFromRow($result) {
    $user = new \User();
    $user->user_id = $result['user_id'];
    $user->username = $result['username'];
    $user->hashedPass = $result['password'];
    $user->salt = $result['salt'];
    $user->role = $result['role'];
    $user->isActive = $result['is_active'];

    return $user;
}

function _updateUser(User $user) {
    $db = _getConnection();
    $query = "UPDATE `users` SET `username`=:Username, `password`=:Pass, `salt`=:Salt, `is_active`=:Is_Active, `role`=:Role WHERE `id`=:Id";
    $statement = $db->prepare($query);

    $statement->bindValue(':Username', $user->username);
    $statement->bindValue(':Pass', $user->hashedPass);
    $statement->bindValue(':Salt', $user->salt);
    $statement->bindValue(':Is_Active', $user->isActive);
    $statement->bindValue(':Role', $user->role);
    $statement->bindValue(':Id', $user->id);

    $success = $statement->execute();
    $statement->closeCursor();

    return $user->id;
}

function getUserById($id) {
    $db  = _getConnection();
    $query = "SELECT `user_id`, `username`, `password`, `salt`, `is_active`, `role` FROM `user` WHERE user_id=:Id LIMIT 1";

    $statement = $db->prepare($query);
    $statement->bindValue(':Id', $id);
    $statement->execute();
    $error = $statement->errorInfo();
    $result = $statement->fetch();
    $statement->closeCursor();

    if ($result) {
        return _userFromRow($result);
    } else {
        return null;
    }
}

function getUserByUsername($username) {
    $db = _getConnection();
    $query = "SELECT * FROM `user` WHERE `username` = :username";

    $statement = $db->prepare($query);
    $statement->bindValue(":username", $username);
    $success = $statement->execute();

    $result = $statement->fetch();
    if(isset($result)) {
        return _userFromRow($result);
    }
    else {
        return null;
    }
}