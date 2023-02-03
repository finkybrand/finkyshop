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
	$d=$_POST['SelectMenu'];
	$e=$_POST['Quantity'];
	$f=$_POST['Address'];
	$g= date('y-m-d',strtotime($_POST['Date']));
	$h=$_POST['Payby'];
	$sql="INSERT INTO 
    buy(Fullname,Email,phone,SelectMenu,Quantity,Address,Date,Payby)
	VALUES('$a','$b','$c','$d','$e','$f','$g','$h')";
	$run=mysqli_query($con,$sql);
	if($run)

	{
	echo "<script>alert('order sent successfully!')</script>"; 
	}

	else{
		echo "<script>alert('oops!Something wrong')</script>";
	}

  } 

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>buy</title>
	<style type="text/css">

     button{
        width: 200px;
     	padding: 15px 0;
     	text-align: center;
     	margin: 20px 10px;
        border-radius: 25px;
        font-weight: bold;
        border: 2px solid #009688;
        background: transparent;
        color: #fff;
        cursor: pointer;
        position: relative;
        overflow: hidden;
     }

        span{
              background: #009688;
              height: 100%;
              width: 0;
              border-radius: 25px;
              position: absolute;
              left: 0;
              bottom: 0;
              z-index: -1;
             transition:0.5s;
     }

     button:hover span{
     	width: 100%;
     }

     button:hover{
     	border: none;
     }

	</style>
</head>
<body  style="background-image: url(15.jpg);background-size: cover;background-attachment: fixed;width: 80%">

<h1>Fill the form Below to order</h1>
	<form method="post"action="buy.php">

	Fullname
	<input type="text" placeholder="Enter Fullname" name="Fullname" required><br><br>
	Email
	<input type="text" placeholder="Enter Email" name="Email" required><br><br>
	phone
<select name="phone" required>
	<option value="+250">+250</option>
	<option value="+254">+254</option>
	<option value="+256">+256</option>
	<option value="+257">+257</option>
	<option value="+243">+243</option>
	<option value="+255">+255</option>
    <option value="+1">+1</option>
</select>
<input type="text" placeholder="Enter phone" name="phone" required><br><br>

	SelectMenu
	<select name="SelectMenu" required>
		<option value="Coffee">Coffee</option>
		<option value="Rice">Rice</option>
		<option value="Flour">Flour</option>
		<option value="Agashya">Agashya</option>
		<option value="Olive oil">Olive oil</option>
	</select>
    <br><br>
    Quantity
<select name="Quantity" required>
	<option value="1piece">1piece</option>
	<option value="5pieces">5pieces</option>
	<option value="10pieces">10pieces</option>
	<option value="15pieces">15pieces</option>
	<option value="25pieces">25pieces</option>
	<option value="1KG">1KG</option>
	<option value="5KG">5KG</option>
	<option value="10KG">10KG</option>
	<option value="15G">15G</option>
	<option value="25KG">25KG</option>
	<option value="1L">1L</option>
	<option value="5L">5L</option>
	<option value="10L">10L</option>
	<option value="15L">15L</option>
	<option value="25L">25L</option>
	</select>
	<br><br>
	Address
	<input type="text" placeholder="Enter Address" name="Address" required><br><br>

    	<table>
    <tr>
    	<td>Date</td>
    	<td><input type="Date" name="Date" required></td>
    </tr>
    </table>
<br><br>

    Payby
<select name="Payby" required>
	<option value="Payment method">Payment method</option>
	<option value="Mobile Money">Mobile Money</option>
	<option value="VISA">VISA</option>
	<option value="MasterCard">MasterCard</option>
	<option value="PayPal">PayPal</option>
</select>
<br><br>

	<input type="submit" value="submit" name="send">
    <br><br>
	<a href="http://localhost/finkyshop/buyview.php" style="background: green;color: white;font: bold;">View Your Order</a>
	<br><br>
	<button type="button"><span></span>Reset</button>

	</form>
</body>
</html>
	