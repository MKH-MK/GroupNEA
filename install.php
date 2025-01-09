<?php

include_once("connection.php");

$stmt = $conn->prepare("DROP TABLE IF EXISTS tblstudents;

CREATE TABLE tblstudents
(studentid INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
gender VARCHAR(1) NOT NULL,
surname VARCHAR(20) NOT NULL,
forename VARCHAR(20) NOT NULL,
password VARCHAR(20) NOT NULL,
house VARCHAR(20) NOT NULL,
yearg INT(2) NOT NULL,
);
ALTER TABLE `tblstudents`
ADD UNIQUE KEY `surname_forename` (`surname`,`forename`);");

$stmt->execute();
$stmt->closeCursor();

echo"<br>tblstudents created";


$stmt = $conn->prepare("DROP TABLE IF EXISTS tblbooks;

CREATE TABLE tblbooks
(bookid INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
isbn INT(4) NOT NULL,
title VARCHAR(20) NOT NULL,
authors TEXT NOT NULL);
cover VARCHAR(255) NOT NULL,
BLURB TEXT NOT NULL,
rating INT(1) NOT NULL,
ALTER TABLE `tblbooks`");

$stmt->execute();
$stmt->closeCursor();

echo"<br>tblbooks created";


$stmt = $conn->prepare("DROP TABLE IF EXISTS tblstudentloans;

CREATE TABLE tblstudentloans
(bookid INT(5) NOT NULL,
userid INT(5) NOT NULL,
endloan DATE NOT NULL,
classgrade CHAR(1) NOT NULL,
PRIMARY KEY(subjectid, userid))
ADD UNIQUE KEY `studentid_bookid` (`studentid`,`bookid`);");

$stmt->execute();
$stmt->closeCursor();

echo"<br>tblstudentloans created";

$hashed_password = password_hash("password", PASSWORD_DEFAULT);
    $stmt4 = $conn->prepare("INSERT INTO Tblstudents(studentid,gender,surname,forename,Password,house,yearg)VALUES 
    (NULL,'M','Khametov','Mark',:hp,'Crosby',12)
    ");
?>