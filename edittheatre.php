<?php
session_start();
?>

<?php
  require_once('config.php');
   if($_SERVER["REQUEST_METHOD"] == "POST") {
  $ID = $_POST['edittheatre'];
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

<h2>Edit a Theatre</h2>


<div class="container col-md-4">
    <div class="login_div" style="margin-top: 30%; margin-bottom: -30%;">
      <?php
        require_once('config.php');
        $sql = "SELECT * FROM Theatre WHERE ID = '$ID' AND TheatreName = '{$_SESSION['Complex']}'";
        $result = mysqli_query($db,$sql);
        $row=mysqli_fetch_array($result);
      ?>
      <form method="post" action="edittheatreP2.php">
          <h1>Edit Information</h1>

          <label for="ID"><b>*Theatre ID</b></label>
          <input type="number" value="<?php echo $row['ID']; ?>" name="ID" required>
          <br/>

          <label for="MaxSeating"><b>*Maximum Seating</b></label>
          <input type="number" value="<?php echo $row['MaxSeating']; ?>" name="MaxSeating" required>
          <br/>
          <label for="ScreenSize"><b>*Screen Size</b></label>
          <input type="text" value="<?php echo $row['ScreenSize']; ?>" name="ScreenSize" required>
          <br/>

          <button class="btn" type="submit" name="update_btn">Update</button>
      </form>
<br/><br/><br/>
    </div>
</div>
<footer>
<?php include(ROOT_PATH . '/includes/footer.php') ?>
</footer>
</body>
</html>