<!DOCTYPE html>
<?php
session_start();
require_once('config.php');
 if($_SERVER["REQUEST_METHOD"] == "POST") {

 $title=$_POST['Title'];
 $hour=$_POST['StartHour'];
  $minute=$_POST['StartMinute'];
  $date=$_POST['Date'];
 $seats=$_POST['SeatsAvailable'];

   $sql =  "SELECT PlotSynopsis FROM Movie WHERE Title = '$title'";
      $result = mysqli_query($db,$sql);
      $row=mysqli_fetch_array($result);
 $plot = $row['PlotSynopsis'];

    $sql =  "INSERT INTO Showing
    VALUES (NULL, '$title','$plot','$hour','$minute','$date','$seats')";

     mysqli_query($db,$sql);

  header("Location: http://localhost/332Proj/admin.php");
 }
?>


<html>
	<head>
		<?php include(ROOT_PATH . '/includes/head_section.php') ?>
		<title>Online Movie Tiket Service | Home </title>
	</head>
<body>

  <header>
      <div class="container">
        <div id="branding">
          <h1> Online Movie Ticket Service</h1>
        </div>
        <nav>
          <ul>
            <li class="current"><a href="home.php">Home</a></li>
            <li><a href="about.php">Contact</a></li>
            <li><a href="account.php">My Account</a></li>

              <?php if($_SESSION['isAdmin'] == 1) : ?>
                  <li><a href="admin.php">Admin</a></li>
              <?php endif; ?>

          </ul>
        </nav>
      </div>
    </header>

  <br/>

<h2>Add a New Showing</h2>

<div class="container col-md-4">
    <div class="login_div" style="margin-top: 30%; margin-bottom: -30%;">

        <form method="post" action="addshowing.php">

            <input type="hidden" name="Complex" value="<?php echo $Complex?>">

            <label for="Title"><b>*Movie Title</b></label>
            <input type="text" placeholder="Enter Title" name="Title" required>
            <br/>
            <label for="StartHour"><b>*Start Time Hour (24h)</b></label>
            <input type="Number" placeholder="Enter Hour" name="StartHour" required>
            <br/>
            <label for="StartMinute"><b>*Start Time Minutes</b></label>
            <input type="Number" placeholder="Enter Minutes" name="StartMinute" required>
            <br/>
            <label for="Date"><b>*Date of Showing</b></label>
            <input type="text" placeholder="Enter Date" name="Date" required>
            <br/>
            <label for="SeatsAvailable"><b>*Number of Available Seats</b></label>
            <input type="number" placeholder="Enter Available Seats" name="SeatsAvailable" required>

            <br/>
            <input type="submit" value="Add Showing">
        </form>

    </div>
</div>





		<!-- footer -->
    <br/><br/><br/>            <br/>  <br/>  <br/>             <br/>  <br/>  <br/>

    <footer>
		<?php include(ROOT_PATH . '/includes/footer.php') ?>
    </footer>
</body>
</html>
