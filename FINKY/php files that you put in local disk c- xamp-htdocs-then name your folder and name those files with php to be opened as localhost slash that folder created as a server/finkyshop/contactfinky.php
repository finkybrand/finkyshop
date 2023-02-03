<?php 
$servername='localhost';
$username='root';
$password='';
$databasename='finky';
$con=mysqli_connect($servername,$username,$password,$databasename);
if(isset($_POST['send'])){
    $a=$_POST['Fullname'];
    $b=$_POST['Email'];
    $c=$_POST['phone'];
    $d=$_POST['Location'];
    $e=$_POST['Message'];
    $sql="INSERT INTO 
    message(Fullname,Email,phone,Location,Message)
    VALUES('$a','$b','$c','$d','$e')";
    $run=mysqli_query($con,$sql);
    if($run)

    {
    echo "<script>alert('Message sent successfully!')</script>"; 
    }

    else{
        echo "<script>alert('oops!Something wrong')</script>";
    }

  } 

 ?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
</head>
<body>
<h1>Fill the form Below to contact Us</h1>
    <form method="post"action="contactfinky.php">

    Fullname
    <input type="text" placeholder="Enter Fullname" name="Fullname" required><br><br>
    Email
    <input type="text" placeholder="Enter Email" name="Email" required><br><br>
    phone
    <input type="text" placeholder="Enter phone" name="phone" required><br><br>
    Location
    <input type="text" placeholder="Enter Location" name="Location" required><br><br>
    Message
    <input type="text" placeholder="Enter Message" name="Message" required><br><br>

    <input type="submit" value="submit" name="send">

    </form>
</body>
</html>