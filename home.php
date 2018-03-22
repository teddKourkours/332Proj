<?php
   require_once('config.php');
   
  // if(isset($_SESSION['login_user']){
	   
	   
  // }else{
	   
	//echo "what?"
   //}
?>


<!DOCTYPE html>
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
            <li><a href="myaccount.html">My Account</a></li>
          </ul>
        </nav>
      </div>
    </header>
	
	<!-- container - wraps whole page -->
	<div class="container">
		<div class="row">
			<div class="col-sm">
				One of three columns
			</div>
			<div class="col-sm">
				One of three columns
			</div>
			<div class="col-sm">
			One of three columns
			</div>
		</div>

	</div>	
		<!-- footer -->
		
		
    <footer>
		<?php include(ROOT_PATH . '/includes/footer.php') ?>
    </footer>
</body>
</html>