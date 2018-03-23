<?php
require_once('config.php');
 if($_SERVER["REQUEST_METHOD"] == "POST") {

 	 echo $title=$_POST['Title'];
 	echo $plot=$_POST['Plot'];
 	echo $runtime=$_POST['RunTime'];
 	echo $rating=$_POST['Rating'];
 	echo $fname=$_POST['DirFName'];
 	echo $lname=$_POST['DirLName'];
 	echo $prod_comp=$_POST['ProdComp'];
 	echo $startdate=$_POST['StartDate'];
echo 	$enddate=$_POST['EndDate'];
echo $supplier=$_POST['Supplier'];
 	if($rating=="")$rating="NULL";
 	if($prod_comp=="")$prod_comp="NULL";
 	//Execute the query
 	$sql =  "INSERT INTO Movie
 	VALUES ('$title', '$plot', '$runtime',
 	  '$rating', '$fname', '$lname', '$prod_comp',
      '$startdate', '$enddate', '$supplier')";

    mysqli_query($db,$sql);

 header("Location: http://localhost/332Proj/admin.php");
 }
?>
