<?php
require_once('config.php');
 if($_SERVER["REQUEST_METHOD"] == "POST") {

 	$complex=$_POST['Complex'];
 	$id=$_POST['ID'];
 	$max=$_POST['MaxSeating'];
 	$size=$_POST['ScreenSize'];
 	if($max=="")$max="NULL";

 	//Execute the query
 	$sql =  "INSERT INTO Theatre
 	VALUES ('$complex', $id, '$max',
 	   '$size')";

    mysqli_query($db,$sql);

 	header("Location: http://localhost/332Proj/admin.php");
 }
?>
