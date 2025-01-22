<!DOCTYPE html>
<html>
<title>Loan out a book as student</title>
    
</head>
<body>
    
    <form action="loanoutpost.php" method = "post">
    <select name ="student">
    
    <?php
        include_once("connection.php");
        
        $stmt = $conn->prepare("SELECT * FROM tblstudents WHERE role=0 ORDER BY surname ASC");
        $stmt->execute();
        
        while ($row =$stmt->fetch(PDO::FETCH_ASSOC))
            {
                #print_r($row);
                echo("<option value=".$row["studentid"].">".$row["surname"]." , ".$row["forename"]."</option>");
            }
    ?>
    </select>
    <select name ="book">
    
    <?php
        
        include_once("connection.php");
       
        $stmt = $conn->prepare("SELECT * FROM tblbooks ORDER BY title ASC");
        $stmt->execute();
        
        while ($row =$stmt->fetch(PDO::FETCH_ASSOC))
            {
                #print_r($row);
                echo("<option value=".$row["bookid"].">".$row["title"]."</option>");
            }
    ?>
    </select>
    <input type="submit" value="Confirm Loan">

</form>

</body>
</html>