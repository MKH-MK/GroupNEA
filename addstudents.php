<?php

include_once("connection.php");

try {
    $_POST = array_map("htmlspecialchars", $_POST);

    print_r($_POST);
    echo($_POST["forename"]);

    switch($_POST["role"]){
        case "Pupil":
            $role=0;
            break;
        case "Teacher":
            $role=1;
            break;
        case "Admin":
            $role=2;
            break;
    }

    $Username=substr($_POST["forename"],0,1).".".$_POST["surname"];
    $hashed_password = password_hash($_POST["passwd"], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO tblstudents (userid,username,surname,forename,passwd,gender,house,yearg,role)
    VALUES (null,:username,:surname,:forename,:passwd,:gender,:house,:year,:role)");

    $stmt->bindParam(':username', $Username);
    $stmt->bindParam(':surname', $_POST["surname"]);
    $stmt->bindParam(':forename', $_POST["forename"]);
    $stmt->bindParam(':passwd', $hashed_password);
    $stmt->bindParam(':gender', $_POST["gender"]);
    $stmt->bindParam(':year', $_POST["year"]);
    $stmt->bindParam(':house', $_POST["house"]);
    $stmt->bindParam(':role', $role);

    $stmt->execute();  

    header('Location: students.php');


} catch (PDOException $e) {

    echo "Error: " . $e->getMessage();

}

$conn=null;

?>