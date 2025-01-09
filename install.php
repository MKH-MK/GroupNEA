<?php

include_once("connection.php");

// Create tblstudents table
$stmt = $conn->prepare("DROP TABLE IF EXISTS tblstudents;
CREATE TABLE tblstudents (
    studentid INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    gender VARCHAR(1) NOT NULL,
    surname VARCHAR(20) NOT NULL,
    forename VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    house VARCHAR(20) NOT NULL,
    yearg INT(2) NOT NULL,
    UNIQUE KEY surname_forename (surname, forename)
);");
$stmt->execute();
$stmt->closeCursor();
echo "<br>tblstudents created";

// Create tblbooks table
$stmt = $conn->prepare("DROP TABLE IF EXISTS tblbooks;
CREATE TABLE tblbooks (
    bookid INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    isbn VARCHAR(13) NOT NULL,
    title VARCHAR(255) NOT NULL,
    authors TEXT NOT NULL,
    cover VARCHAR(255) NOT NULL,
    blurb TEXT NOT NULL,
    rating INT(1) NOT NULL
);");
$stmt->execute();
$stmt->closeCursor();
echo "<br>tblbooks created";

// Create tblstudentloans table
$stmt = $conn->prepare("DROP TABLE IF EXISTS tblstudentloans;
CREATE TABLE tblstudentloans (
    bookid INT(5) NOT NULL,
    userid INT(5) NOT NULL,
    endloan DATE NOT NULL,
    classgrade CHAR(1) NOT NULL,
    PRIMARY KEY(bookid, userid),
    UNIQUE KEY studentid_bookid (bookid, userid)
);");
$stmt->execute();
$stmt->closeCursor();
echo "<br>tblstudentloans created";

// Insert initial data into tblstudents
$hashed_password = password_hash("password", PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO tblstudents (studentid, gender, surname, forename, password, house, yearg) VALUES 
    (NULL, 'M', 'Khametov', 'Mark', :hp, 'Crosby', 12)");
$stmt->bindParam(':hp', $hashed_password);
$stmt->execute();
$stmt->closeCursor();
?>
