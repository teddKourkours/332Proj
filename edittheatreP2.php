<?php
session_start();

require_once('config.php');
 if($_SERVER["REQUEST_METHOD"] == "POST") {
  //initialize variables
  $ID=$_POST['ID'];
  $max=$_POST['MaxSeating'];
  $size=$_POST['ScreenSize'];

  //Execute the query
  $sql =  "UPDATE Theatre
          SET ID = '$ID',
          MaxSeating = '$max',
          ScreenSize = '$size'

          WHERE ID = '$ID' AND TheatreName = '{$_SESSION['Complex']}'";

   mysqli_query($db,$sql);

 	header("Location: http://localhost/332Proj/admin.php");
 }
?>
