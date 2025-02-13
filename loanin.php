<!DOCTYPE html>
<html>
<title>Hand in a book as student</title>
    
</head>
<body>
    
    <form action="loaninpost.php" method = "post">
    <label for="userid">Select Student:</label>
    <select name ="userid">
    
    <?php
        include_once("connection.php");
        
        $stmt = $conn->prepare("SELECT * FROM tblstudents WHERE role=0 ORDER BY surname ASC");
        $stmt->execute();
        
        while ($row =$stmt->fetch(PDO::FETCH_ASSOC))
            {
                #print_r($row);
                echo("<option value=".$row["userid"].">".$row["surname"]." , ".$row["forename"]."</option>");
            }
    ?>
    </select>
    <br>

    <label for="bookid">Select Book:</label>
    <select name ="bookid">
    
    <?php
        
        include_once("connection.php");
       
        $stmt = $conn->prepare("SELECT l.bookid, b.title FROM tblstudentloans l INNER JOIN tblbooks b ON l.bookid = b.bookid ORDER BY b.title ASC");
        $stmt->execute();
            
        
        while ($row =$stmt->fetch(PDO::FETCH_ASSOC))
            {
                #print_r($row);
                echo("<option value=".$row["bookid"].">".$row["title"]."</option>");
            }
    ?>
    </select>
    <br>

    <input type="submit" value="Confirm hand in">

</form>

</body>
</html>