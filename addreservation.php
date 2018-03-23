<?php
session_start();
require_once('config.php');
 if($_SERVER["REQUEST_METHOD"] == "POST") {

 $showing=$_POST['AddRes'];
 $numTicket=$_POST['numTicket'];



    $sql =  "INSERT INTO Reservation
    VALUES (NULL, '$showing','{$_SESSION['account_Num']}','$numTicket',10.99)";

     mysqli_query($db,$sql);

  header("Location: http://localhost/332Proj/home.php");
 }
?>
