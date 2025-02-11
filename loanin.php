<!DOCTYPE html>
<html>
<title>Loan out a book as student</title>
    
</head>
<body>
    
    <form action="loaninpost.php" method = "post">
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
    <select name ="bookid">
    
    <?php
        
        include_once("connection.php");
       
        $stmt = $conn->prepare("SELECT * FROM tblbooks WHERE available>0 ORDER BY title ASC");
        $stmt->execute();
        
        while ($row =$stmt->fetch(PDO::FETCH_ASSOC))
            {
                #print_r($row);
                echo("<option value=".$row["bookid"].">".$row["title"]."</option>");
            }
    ?>
    </select>
    <br>

    <input type="date" name="endloan" required>
    <br>
    <input type="submit" value="Confirm Loan">

</form>

<h2>Current Loaning:</h2>
    
    <?php
    
    include_once("connection.php");
    
    $stmt = $conn->prepare("SELECT * FROM tblstudentloans");
    $stmt->execute();
    
    while ($row =$stmt->fetch(PDO::FETCH_ASSOC))
        {   
            #print_r($row);
            echo("<h4>"."Loan ID: ".$row["loanid"]." Book ID: ".$row["bookid"].". User loaning out: ".$row["userid"]."</h4>");
        }
    ?>

</body>
</html>