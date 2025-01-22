<?php

include_once('connection.php');

try {
    
    $_POST = array_map("htmlspecialchars", $_POST);
    
    print_r($_POST);
    echo($_POST["isbn"]);

    $stmt = $conn->prepare("INSERT INTO tblstudentloans (loanid,bookid,userid,endloan)
    VALUES (NULL,:bookid,:userid,:endloan");
    $stmt->bindParam(':subjectname', $_POST["subject"]);
    $stmt->bindParam(':student', $_POST["student"]);
    
    $stmt->execute();

    header('Location:loanout.php');

} catch (PDOException $e) {

    echo "Error: " . $e->getMessage();

}

?>