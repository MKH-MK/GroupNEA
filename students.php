<!DOCTYPE html>
<html>
<head>
    
    <title>USERS FORM</title>
    
</head>
<body>

    <form action="addstudents.php" method="POST">
    First name:<input type="text" name="forename"><br>
    Last name:<input type="text" name="surname"><br>
    Password:<input type="password" name="passwd"><br>
    House:<input type="text" name="house"><br>
    Year:<input type="text" name="year"><br>
    
    Gender:<select name="gender">
            <option value="M">Male</option>
            <option value="F">Female</option>
        </select>

        <br>
        
    <input type="radio" name="role" value="Pupil" checked> Student<br>
    <input type="radio" name="role" value="Teacher"> Teacher<br>
    <input type="radio" name="role" value="Admin"> Admin<br>
        
    <br>
    <br>

    <input type="submit" value="Add Student">

    </form>


    <br>

    <h2>Current Users:</h2>
    
    <?php
    
    include_once("connection.php");
    
    $stmt = $conn->prepare("SELECT * FROM tblstudents");
    $stmt->execute();
    
    while ($row =$stmt->fetch(PDO::FETCH_ASSOC))
        {   
            #print_r($row);
            echo("<h4>".$row["forename"]." ".$row["surname"]."</h4>");
        }
    ?>

</body>
</html>