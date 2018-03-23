<?php
   require_once('config.php');
   if($_SERVER["REQUEST_METHOD"] == "POST") {

     $AccNum = $_POST['removeMember'];

     $sql =  "DELETE FROM Customer WHERE AccountNumber = '$AccNum'";

      mysqli_query($db,$sql);

      			header("Location: http://localhost/332Proj/admin.php");
   }
?>
