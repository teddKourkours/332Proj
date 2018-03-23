<?php
session_start();
?>

<?php
  require_once('config.php');
   if($_SERVER["REQUEST_METHOD"] == "POST") {
  $showingID = $_POST['editshowing'];
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

<h2>Edit a Showing</h2>


<div class="container col-md-4">
    <div class="login_div" style="margin-top: 30%; margin-bottom: -30%;">
      <?php
        require_once('config.php');
        $sql = "SELECT * FROM Showing WHERE ShowingID = '$showingID'";
        $result = mysqli_query($db,$sql);
        $row=mysqli_fetch_array($result);
      ?>
      <form method="post" action="editshowingP2.php">
          <h1>Edit Information</h1>
          <input type="hidden" value="<?php echo $showingID; ?>" name="ShowingID" required>
          <label for="Title"><b>*Title</b></label>
          <input type="text" value="<?php echo $row['Title']; ?>" name="Title" required>
          <br/>
          <label for="StartHour"><b>*Start Time Hour (24h)</b></label>
          <input type="number" value="<?php echo $row['StartHourTime']; ?>" name="StartHour" required>
          <br/>
          <label for="StartMinute"><b>*Start Time Minutes</b></label>
          <input type="number" value="<?php echo $row['StartMinuteTime']; ?>" name="StartMinute" required>
          <br/>
          <label for="Date"><b>*Date</b></label>
          <input type="text" value="<?php echo $row['DateOfShowing']; ?>" name="Date" required>
          <br/>
          <label for="Seats"><b>*Number of Available Seats</b></label>
          <input type="number" value="<?php echo $row['SeatsAvailable']; ?>" name="Seats" required>
          <br/>

          <button class="btn" type="submit" name="update_btn">Update Showing</button>
      </form>
<br/><br/><br/>
    </div>
</div>

<footer>
<?php include(ROOT_PATH . '/includes/footer.php') ?>
</footer>
</body>
</html>
