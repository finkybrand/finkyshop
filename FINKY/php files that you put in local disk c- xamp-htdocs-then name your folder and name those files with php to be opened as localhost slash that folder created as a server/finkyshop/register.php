<?php 
$servername='localhost';
$username='root';
$password='';
$databasename='finky';
$con=mysqli_connect($servername,$username,$password,$databasename);
if(isset($_POST['send'])){
	$a=$_POST['Firstname'];
	$b=$_POST['Lastname'];
	$c=$_POST['Telephone'];
	$d=$_POST['Email'];
	$sql="INSERT INTO 
	user(Firstname,Lastname,Telephone,Email)
	VALUES('$a','$b','$c','$d')";
	$run=mysqli_query($con,$sql);
	if($run)

	{
	echo "<script>alert('Congratulations,you have successfully Registered!')</script>"; 
	}

	else{
		echo "<script>alert('oops!Something wrong')</script>";
	}

  } 

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>REGISTER NOW</title>
</head>
<body>
<h1>Fill the form Below to Register</h1>
	<form method="post"action="register.php">

	Firstname
	<input type="text" placeholder="Enter Firstname" name="Firstname" required><br><br>
	Lastname
	<input type="text" placeholder="Enter Lastname" name="Lastname" required><br><br>
	Telephone
	<input type="text" placeholder="Enter Telephone" name="Telephone" required><br><br>
	Email
	<input type="text" placeholder="Enter Email" name="Email" required><br><br>

	<input type="submit" value="submit" name="send">

	</form>
</body>
</html>
	
	