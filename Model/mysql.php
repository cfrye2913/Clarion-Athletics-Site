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
    $query = "INSERT INTO `member` (fname, lname, signupdate, sport, email) 
          VALUES (:fname, :lname, :signupdate, :sport, :email)";
    $statement = $db->prepare($query);

    $statement->bindValue(':fname', $member->FName);
    $statement->bindValue(':lname', $member->LName);
    $statement->bindValue(':signupdate', $member->dateRegistered);
    $statement->bindValue(':sport', $member->sport);
    $statement->bindValue(':email', $member->email);

    $success = $statement->execute();
    $statement->closeCursor();
    return $db->lastInsertId();
}

function insertSport(\Sport $sport){
    $db = _getConnection();
    $query = "INSERT INTO  `sport`(sport_name) VALUES (:sportName)";

    $statement = $db-> prepare($query);

    $statement->bindValue(':sportName', $sport->sportsName);
    $success = $statement->execute();
    $statement->closeCursor();
    return $db->lastInsertId();
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