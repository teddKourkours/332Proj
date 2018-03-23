<?php
session_start();
require_once('config.php');
 if($_SERVER["REQUEST_METHOD"] == "POST") {

 	$title=$_POST['Title'];
 	$review=$_POST['Review'];

  $sql =  "SELECT PlotSynopsis FROM Movie WHERE Title = '$title'";
     $result = mysqli_query($db,$sql);
     $row=mysqli_fetch_array($result);
   $plot = $row['PlotSynopsis'];

      $sql =  "SELECT CURRENT_DATE()";
      $result = mysqli_query($db,$sql);
      $row=mysqli_fetch_array($result);
      $date = $row['CURRENT_DATE()'];
 $_SESSION['account_Num'];
 	//Execute the query
  $sql =  "INSERT INTO Reviews
 	VALUES ('{$_SESSION['account_Num']}','$title','$plot','$date','$review')";

   mysqli_query($db,$sql);

 	header("Location: http://localhost/332Proj/admin.php");
 }
?>
