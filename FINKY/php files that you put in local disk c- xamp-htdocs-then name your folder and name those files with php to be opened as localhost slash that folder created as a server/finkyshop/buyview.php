<?php 
$servername='localhost';
$username='root';
$password='';
$databasename='finky';
$con=mysqli_connect($servername,$username,$password,$databasename);
if($con)
{
	echo'Connected Successfully';
}
else{
	echo'Not Connected';
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>buy view</title>
	<div class="content">
		<h1>Orders</h1>
		<table border="1" width="350">
			<thead>
				<th>S.No.</th>
				<th>Fullname</th>
				<th>Email</th>
				<th>phone</th>
				<th>SelectMenu</th>
				<th>Quantity</th>
				<th>Address</th>
				<th>Date</th>
				<th>Payby</th>
			</thead>

			<?php

			$sql="SELECT* FROM buy";
			$run=mysqli_query($con,$sql);
			$i=0;
			while ($row=mysqli_fetch_array($run)) 
			{
				$a=$row['Fullname'];
				$b=$row['Email'];
				$c=$row['phone'];
				$d=$row['SelectMenu'];
				$e=$row['Quantity'];
				$f=$row['Address'];
				$g=$row['Date'];
				$h=$row['Payby'];
				$i++;
            
			?>

			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $a;?></td>
				<td><?php echo $b;?></td>
				<td><?php echo $c;?></td>
				<td><?php echo $d;?></td>
				<td><?php echo $e;?></td>
				<td><?php echo $f;?></td>
				<td><?php echo $g;?></td>
				<td><?php echo $h;?></td>
			</tr>
           
			<?php } ?>

		</table>
	</div>

</head>
<body>
<a href="http://localhost/finkyshop/buy.php">
	<input type="button" value="logout">
    
</body>
</html>