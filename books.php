<!DOCTYPE html>
<html>
<title>Books</title>
    
</head>
<body>
   <form action="addbooks.php" method="post">
  
    ISBN:<input type="text" name="isbn" minlength="10" maxlength="10"><br>
    Title:<input type="text" name="title"><br>
    Authors (Format: Name1,Name2,Name3,etc):<input type="text" name="authors"><br>
    Cover image:<input type="text" name="cover"><br>
    BLURB:<br><textarea name="blurb" rows="6" cols="75"></textarea><br>
    Age Rating:<input type="text" name="agerating"><br>

  <input type="submit" value="Add Book">
</form>

<h2>Current Books:</h2>
    
    <?php
    include_once("connection.php");
    $stmt = $conn->prepare("SELECT * FROM tblbooks");
    $stmt->execute();
    while ($row =$stmt->fetch(PDO::FETCH_ASSOC))
        {   
            #print_r($row);
            echo("<h4>".$row["bookid"].$row["title"]."</h4>");
        }
    ?>
  
</body>
</html>