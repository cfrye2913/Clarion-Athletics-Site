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
function _getConnection() {
    $dsn = 'mysql:host=localhost;dbname=athletics_db';
    $username = 'root';
    $password = 'root';

    return new \PDO($dsn, $username, $password);
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
    $parsedResults = [];
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
?>