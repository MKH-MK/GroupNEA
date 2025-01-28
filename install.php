<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS library";
    $conn->exec($sql);

    //next 3 lines optional only needed really if you want to go on an do more SQL here!
    
    $sql = "USE library";
    $conn->exec($sql);
    echo "DB created successfully";

    // Create tblstudents table

    $stmt = $conn->prepare("DROP TABLE IF EXISTS tblstudents;

    CREATE TABLE tblstudents (
    studentid INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(20) NOT NULL,
    surname VARCHAR(20) NOT NULL,
    forename VARCHAR(20) NOT NULL,
    passwd VARCHAR(255) NOT NULL,
    gender VARCHAR(1) NOT NULL,
    yearg INT(2) NOT NULL,
    house VARCHAR(20) NOT NULL,
    role TINYINT(1)
    );");

    $stmt->execute();
    $stmt->closeCursor();
    echo "<br>tblstudents created";


    // Create tblbooks table
    $stmt = $conn->prepare("DROP TABLE IF EXISTS tblbooks;
    CREATE TABLE tblbooks (
    bookid INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    isbn VARCHAR(10) NOT NULL,
    title VARCHAR(255) NOT NULL,
    authors TEXT NOT NULL,
    cover VARCHAR(255) NOT NULL,
    blurb TEXT NOT NULL,
    agerating INT(2) NOT NULL,
    available INT(2) NOT NULL
    );");

    $stmt->execute();
    $stmt->closeCursor();
    echo "<br>tblbooks created";


    // Create tblreviews table
    // $stmt = $conn->prepare("DROP TABLE IF EXISTS tblreviews;
    
    // );");

    // $stmt->execute();
    // $stmt->closeCursor();
    // echo "<br>tblreviews created";


    // Create tblstudentloans table


    $stmt = $conn->prepare("DROP TABLE IF EXISTS tblstudentloans;

    CREATE TABLE tblstudentloans (
    loanid INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    bookid INT(5) NOT NULL,
    userid INT(5) NOT NULL,
    endloan DATE
    );");

    $stmt->execute();
    $stmt->closeCursor();
    echo "<br>tblstudentloans created";

    // Insert initial data into tblstudents

    $hashed_password = password_hash("passwd", PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO tblstudents (studentid, username, surname, forename, passwd, gender, house, yearg, role) VALUES 
    (NULL, 'Mark.KHA', 'Khametov', 'Mark', :hp, 'M', 'Crosby', 12, 2)");
   
    $stmt->bindParam(':hp', $hashed_password);
    $stmt->execute();
    // $stmt->closeCursor();

}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}
$conn=Null;
?>
