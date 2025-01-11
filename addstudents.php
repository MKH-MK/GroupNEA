<?php
include_once("connection.php");
header('Location:students.php');

array_map("htmlspecialchars", $_POST);

print_r($_POST);
echo($_POST["forename"]);

$stmt = $conn->prepare("INSERT INTO tblstudents (StudentID,Gender,Surname,Forename,Password,House,Year ,Role)
VALUES (null,:gender,:surname,:forename,:password,:house,:year,:role)");

$stmt->bindParam(':forename', $_POST["forename"]);
$stmt->bindParam(':surname', $_POST["surname"]);
$stmt->bindParam(':house', $_POST["house"]);
$stmt->bindParam(':gender', $_POST["gender"]);
$stmt->bindParam(':password', $_POST["passwd"]);
$stmt->bindParam(':year', $_POST["year"]);

$stmt->execute();
$conn=null;

?>