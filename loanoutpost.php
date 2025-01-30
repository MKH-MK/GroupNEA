<?php

include_once('connection.php');

try {
    
    $_POST = array_map("htmlspecialchars", $_POST);
    
    print_r($_POST);
    echo($_POST["bookid"]);

    $stmt = $conn->prepare("INSERT INTO tblstudentloans (loanid,bookid,userid,endloan)
    VALUES (NULL,:bookid,:userid,:endloan");
    $stmt->bindParam(':bookid', $_POST["bookid"]);
    $stmt->bindParam(':userid', $_POST["userid"]);
    $stmt->bindParam(':endloan', $_POST["endloan"]);
    
    $stmt->execute();
    
    $stmt = $conn->prepare("UPDATE tblbooks SET available = available - 1 WHERE bookid = :bookid");
    $stmt->bindParam(':bookid', $_POST["bookid"]);
    $stmt->execute();
    
    header('Location:loanout.php');

} catch (PDOException $e) {

    echo "Error: " . $e->getMessage();

}

?>