<?php
   require_once('config.php');
   if($_SERVER["REQUEST_METHOD"] == "POST") {

     echo $ID = $_POST['removeshowing'];

     $sql =  "DELETE FROM Showing WHERE ShowingID = '$ID'";

      mysqli_query($db,$sql);

      			header("Location: http://localhost/332Proj/admin.php");
   }
?>
