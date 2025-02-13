<?php

include_once('connection.php');

try {
    
    $_POST = array_map("htmlspecialchars", $_POST);
    
    print_r($_POST);
    echo($_POST["bookid"]);

    if (isset($_POST["bookid"]) && isset($_POST["userid"]) && !empty($_POST["bookid"]) && !empty($_POST["userid"])) {
        
        $bookid = $_POST["bookid"];
        $userid = $_POST["userid"];

        $stmt = $conn->prepare("DELETE FROM tblstudentloans WHERE bookid = :bookid AND userid = :userid");
        $stmt->bindParam(':bookid', $bookid);
        $stmt->bindParam(':userid', $userid);
        $stmt->execute();

        $stmt = $conn->prepare("UPDATE tblbooks SET available = available + 1 WHERE bookid = :bookid");
        $stmt->bindParam(':bookid', $bookid);
        $stmt->execute();
    
    header('Location:loanin(2).php');

    } else {
        echo "Error: Book ID or User ID not set or empty.";
    }

} catch (PDOException $e) {

    echo "Error: " . $e->getMessage();

}

?>