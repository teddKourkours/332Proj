<?php
require_once('config.php');
 if($_SERVER["REQUEST_METHOD"] == "POST") {
	//initialize variables
	echo $movie=$_POST['Movie'];
	echo $Complex=$_POST['Complex'];

$sql =  "SELECT PlotSynopsis FROM Movie WHERE Title = '$movie'";
   $result = mysqli_query($db,$sql);
   $row=mysqli_fetch_array($result);


	//Execute the query
	$sql =  "INSERT INTO MovieBank
	VALUES ('$Complex', '$movie', '{$row['PlotSynopsis']}')";

   mysqli_query($db,$sql);


	header("Location: http://localhost/332Proj/admin.php");

 }
?>
