<?php
include_once("connection.php");
header('Location:students.php');

array_map("htmlspecialchars", $_POST);

print_r($_POST);
echo($_POST["forename"]);

$Username=substr($_POST["forename"],0,1).".".$_POST["surname"];
$hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO tblstudents (studentID,username,gender,surname,forename,password,house,yearg,role)
VALUES (null,:username,:gender,:surname,:forename,:password,:house,:year,:role)");

$stmt->bindParam(':un', $Username);
$stmt->bindParam(':gender', $_POST["gender"]);
$stmt->bindParam(':surname', $_POST["surname"]);
$stmt->bindParam(':forename', $_POST["forename"]);
$stmt->bindParam(':house', $_POST["house"]);
$stmt->bindParam(':password', $_POST["password"]);
$stmt->bindParam(':year', $_POST["year"]);

$stmt->execute();

catch(PDOException $e)
{
    echo "error".$e->getMessage();
}

$conn=null;

?>