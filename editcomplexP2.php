<?php
require_once('config.php');
 if($_SERVER["REQUEST_METHOD"] == "POST") {
  //initialize variables
  echo $old_name=$_POST['oldName'];
  echo $name=$_POST['Name'];
  $street_num=$_POST['StreetNum'];
  $street_name=$_POST['StreetName'];
  $city=$_POST['City'];
  $province=$_POST['Province'];
  $postal=$_POST['PostalCode'];
  $phone_num=$_POST['PhoneNum'];
  $num=$_POST['NumTheatres'];
  if($phone_num=="")$phone_num="NULL";

  //Execute the query
  $sql =  "UPDATE TheatreComplex
          SET Name = '$name',
          StreetNumber = '$street_num',
          StreetName = '$street_name',
          City = '$city',
          Province = '$province',
          PostalCode = '$postal',
          PhoneNumber = '$phone_num',
          NumberOfTheatres = '$num'

          WHERE Name = '$old_name'";

   mysqli_query($db,$sql);

 	//header("Location: http://localhost/332Proj/admin.php");
 }
?>
