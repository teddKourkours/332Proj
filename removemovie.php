<?php
   require_once('config.php');
   if($_SERVER["REQUEST_METHOD"] == "POST") {

     $title = $_POST['removeMovie'];
     $Complex = $_POST['ComplexRemove'];



     $sql =  "DELETE FROM MovieBank WHERE Title = '$title' AND TheatreName = '$Complex'";

      mysqli_query($db,$sql);

      			header("Location: http://localhost/332Proj/admin.php");
   }
?>
