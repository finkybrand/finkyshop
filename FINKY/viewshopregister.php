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
	<title>Layout of the website</title>
	<div class="content">
		<h1>Student message</h1>
		<table border="1" width="350">
			<thead>
				<th>S.No.</th>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Telephone</th>
				<th>Email</th>
			</thead>

			<?php

			$sql="SELECT* FROM user";
			$run=mysqli_query($con,$sql);
			$i=0;
			while ($row=mysqli_fetch_array($run)) 
			{
				$a=$row['Firstname'];
				$b=$row['Lastname'];
				$c=$row['Telephone'];
				$d=$row['Email'];
				$i++;
            
			?>

			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $a;?></td>
				<td><?php echo $b;?></td>
				<td><?php echo $c;?></td>
				<td><?php echo $d;?></td>
			</tr>
           
			<?php } ?>

		</table>
	</div>
</head>
<body>

</body>
</html>