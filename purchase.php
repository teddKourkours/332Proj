<?php
   require_once('config.php');
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

		$result = $_POST['showing_ID'];
		echo $result;
	  
   }
   ?>
   
<!DOCTYPE html>
 
<html>
	<head>
		<?php include(ROOT_PATH . '/includes/head_section.php') ?>
		<title>Online Movie Tiket Service | Transaction </title>
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
            <li><a href="myaccount.php">My Account</a></li>
          </ul>
        </nav>
      </div>
    </header>
	  
	  
	  
		<!--<footer>-->
		<footer>
			<?php include(ROOT_PATH . '/includes/footer.php') ?>
		</footer>
</body>
</html>