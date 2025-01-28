<?php

include_once('connection.php');

try { 
   
    $_POST = array_map("htmlspecialchars", $_POST);

    print_r($_POST);
    echo($_POST["isbn"]);

    $stmt = $conn->prepare("INSERT INTO tblbooks (bookid,isbn,title,authors,cover,blurb,agerating,available)
    VALUES (NULL,:isbn,:title,:authors,:cover,:blurb,:agerating,:available)");
    
    $stmt->bindParam(':isbn', $_POST["isbn"]);
    $stmt->bindParam(':title', $_POST["title"]);
    $stmt->bindParam(':authors', $_POST["authors"]);
    $stmt->bindParam(':cover', $_POST["cover"]);
    $stmt->bindParam(':blurb', $_POST["blurb"]);
    $stmt->bindParam(':agerating', $_POST["agerating"]);
    $stmt->bindParam(':available', $_POST["available"]);

    $stmt->execute();

    header('Location:books.php');

} catch (PDOException $e) {

    echo "Error: " . $e->getMessage();

}

$conn=null;
?>