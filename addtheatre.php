<!DOCTYPE html>
<?php
session_start();
?>

<?php
require_once('config.php');
 if($_SERVER["REQUEST_METHOD"] == "POST") {

   $Complex = $_POST['addtheatre'];

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

<h2>Add a New Theatre Complex</h2>

<div class="container col-md-4">
    <div class="login_div" style="margin-top: 30%; margin-bottom: -30%;">

        <form method="post" action="addtheatreP2.php">

            <input type="hidden" name="Complex" value="<?php echo $Complex?>">

            <label for="ID"><b>*Theatre ID</b></label>
            <input type="number" placeholder="Enter Theatre ID" name="ID" required>
            <br/>
            <label for="MaxSeating"><b>Maximum Seating</b></label>
            <input type="text" placeholder="Enter Maximum Seating" name="MaxSeating">
            <br/>
            <label for="ScreenSize"><b>*Screen Size</b></label>
            <input type="text" placeholder="Enter Screen Size" name="ScreenSize" required>

            <br/>
            <input type="submit" value="Add Theatre">
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
