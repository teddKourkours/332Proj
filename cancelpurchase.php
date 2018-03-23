<?php
   require_once('config.php');
   if($_SERVER["REQUEST_METHOD"] == "POST") {

     $ID = $_POST['cancelPurchase'];

     $sql =  "DELETE FROM Reservation WHERE ID = '$ID'";

      mysqli_query($db,$sql);

      			header("Location: http://localhost/332Proj/account.php");
   }
?>
