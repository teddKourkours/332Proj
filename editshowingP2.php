<?php
session_start();

require_once('config.php');
 if($_SERVER["REQUEST_METHOD"] == "POST") {
  //initialize variables
  echo "," . $title=$_POST['Title'];
  echo "," . $hour=$_POST['StartHour'];
    echo "," . $minute=$_POST['StartMinute'];
    echo "," . $date=$_POST['Date'];
    echo "," . $seats=$_POST['Seats'];
    echo "," . $ID=$_POST['ShowingID'];

  $sql =  "SELECT PlotSynopsis FROM Movie WHERE Title = '$title'";
     $result = mysqli_query($db,$sql);
     $row=mysqli_fetch_array($result);
echo "," . $plot = $row['PlotSynopsis'];

  //Execute the query
  $sql =  "UPDATE Showing
          SET Title = '$title',
          PlotSynopsis = '$plot',
          StartHourTime = '$hour',
          StartMinuteTime = '$minute',
          DateOfShowing = '$date',
          SeatsAvailable = '$seats'

          WHERE ShowingID = '$ID'";

   mysqli_query($db,$sql);

 	header("Location: http://localhost/332Proj/admin.php");
 }
?>
