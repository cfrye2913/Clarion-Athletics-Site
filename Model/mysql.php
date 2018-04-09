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
    $error = $statement->errorInfo();
    $statement->closeCursor();
    return $db->lastInsertId();
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
    $sport = new \sport();

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
?>