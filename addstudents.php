<?php
include_once("connection.php");

try {
    $_POST = array_map("htmlspecialchars", $_POST);

    print_r($_POST);
    echo($_POST["forename"]);

    $Username=substr($_POST["forename"],0,1).".".$_POST["surname"];
    $hashed_password = password_hash($_POST["passwd"], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO tblstudents (studentID,username,gender,surname,forename,passwd,house,yearg)
    VALUES (null,:username,:gender,:surname,:forename,:passwd,:house,:year)");

    $stmt->bindParam(':username', $Username);
    $stmt->bindParam(':gender', $_POST["gender"]);
    $stmt->bindParam(':surname', $_POST["surname"]);
    $stmt->bindParam(':forename', $_POST["forename"]);
    $stmt->bindParam(':house', $_POST["house"]);
    $stmt->bindParam(':passwd', $hashed_password);
    $stmt->bindParam(':year', $_POST["year"]);

    $stmt->execute();  

    header('Location: students.php');
    
} catch (PDOException $e) {
    // Handle errors
    echo "Error: " . $e->getMessage();
}

$conn=null;

?>