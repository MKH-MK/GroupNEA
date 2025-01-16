<?php
include_once("connection.php");

try {
    $_POST = array_map("htmlspecialchars", $_POST);

    print_r($_POST);
    echo($_POST["forename"]);

    $Username=substr($_POST["forename"],0,1).".".$_POST["surname"];
    $hashed_password = password_hash($_POST["passwd"], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO tblstudents (studentID,username,surname,forename,passwd,gender,house,yearg)
    VALUES (null,:username,:surname,:forename,:passwd,:gender,:house,:year)");

    $stmt->bindParam(':username', $Username);
    $stmt->bindParam(':surname', $_POST["surname"]);
    $stmt->bindParam(':forename', $_POST["forename"]);
    $stmt->bindParam(':passwd', $hashed_password);
    $stmt->bindParam(':gender', $_POST["gender"]);
    $stmt->bindParam(':year', $_POST["year"]);
    $stmt->bindParam(':house', $_POST["house"]);

    $stmt->execute();  

    header('Location: students.php');


} catch (PDOException $e) {

    echo "Error: " . $e->getMessage();

}

$conn=null;

?>