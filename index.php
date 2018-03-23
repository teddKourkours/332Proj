<?php
   require_once('config.php');
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
	
      $sql = "SELECT AccountNumber FROM customer WHERE AccountNumber = '$myusername' and Password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      

      $count = mysqli_num_rows($result);
      
      if($count == 1) {
			session_start();
			
			$_SESSION['account_Num'] = $myusername;
			
			$result = mysqli_query($db, "SELECT isAdmin FROM Customer WHERE AccountNumber = '$myusername'");
			
           	$_SESSION['isAdmin'] = mysqli_fetch_assoc($result)["isAdmin"]; //retrieve Admin property
			
			header("Location: http://localhost/332Proj/home.php");
      }else {
         $error = "Your Login Name or Password is invalid";
		 ?>
		 <div class="alert alert-danger" role="alert">
			<strong>Oh snap!</strong> Your Login ID or Password is invalid
			</div>

		 <?php
      }
   }
?>


<!DOCTYPE html>
<html>
	<head>
		<?php include(ROOT_PATH . '/includes/head_section.php') ?>
		<title>Online Movie Tiket Service | Login </title>
	</head>
<body>

	<header>
      <div class="container">
        <div id="branding">
          <h1> Online Movie Ticket Service</h1>
        </div>
      </div>
    </header>


	 
	<div class="container col-md-4">
		
		
		<div class="login_div" style="margin-top: 30%; margin-bottom: -30%;">
		
		<form action="index.php" method="post" >
			<h2>Login</h2>
			<input type="text" name="username" placeholder="ID" style="margin">
			<input type="password" name="password"  placeholder="Password"> 
			<button class="btn" type="submit" name="login_btn">Sign in</button>
		</form>
		
		<a href="register.php"> 
		<button class="btn" onclick="" name="login_btn">Don't have an account? Sign Up Here</button>
		</a>
		
		</div>
	</div>	
		<!--<footer>-->
		<footer>
			<?php include(ROOT_PATH . '/includes/footer.php') ?>
		</footer>
</body>
</html>