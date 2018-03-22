<?php
   require_once('config.php');
   
   //check if post
   if($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$_SESSION['theatrecomplex'] = mysqli_real_escape_string($db,$_POST['theatrecomlexForm']);
		$_SESSION['date'] = date("Y m d");
		echo $_SESSION['date'];
	  //first pass just gets the column names
		$results = mysqli_query($db, "SELECT Title FROM playing WHERE TheatreName = '{$_SESSION['theatrecomplex']}'");
		
		if($results === FALSE) { 
				//yourErrorHandler(mysqli_error($mysqli));
			echo "ERROR";
		}else{
			
			while($data=mysqli_fetch_array($results)){
				print_r($data[0]);
			}
		}
	}
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
				
				<form id="complex_form" method="post">
				<select name="theatrecomlexForm" onchange="change()">
				<option disabled selected value> -- select an option -- </option>
				<?php 
					$sql = mysqli_query($db, "SELECT Name FROM theatrecomplex");
					while ($row = $sql->fetch_assoc()){
						echo "<option>" . $row['Name'] . "</option>";
					}
				?>
				</select>
				</form>
				
				<!-- If form change, post to backend-->
				<script>
					function change(){
						document.getElementById("complex_form").submit();
					}
				</script>
				
				
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