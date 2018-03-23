<?php
   require_once('config.php');
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
		//get showingID
		$showingID = $_POST['showingID'];
   }
   ?>
   
<!DOCTYPE html>
 
<html>
	<head>
		<?php include(ROOT_PATH . '/includes/head_section.php') ?>
		<title>Online Movie Ticket Service | Purchase </title>
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
          </ul>
        </nav>
      </div>
    </header>
	
	<!-- container - wraps whole page -->
	<div class="box-body table-responsive no-padding">
	
		<table class="table table-hover">
		<h3>Purchase Ticket</h3>
			<tr>
				<th>Movie</th>
				<th>Time</th>
				<th>Date</th>
				<th>Quantity</th>
				<th>Price</th>
			</tr>
				
			<?php
				$seatAvail = mysqli_query($db,"SELECT SeatsAvailable FROM showing WHERE ShowingID ='$showingID'");
			
				$results = mysqli_query($db, "SELECT Title,StartHourTime,StartMinuteTime,DateOfShowing FROM playing Natural join showing WHERE ShowingID = '$showingID'");
				while($data=mysqli_fetch_array($results)){ ?>
					<tr>
						<td> <?php  print_r($data['Title'] );?> </td>
						<td> <?php print_r($data['StartHourTime']. ":" . $data['StartMinuteTime']) ?> </td>
						<td> <?php print_r($data['DateOfShowing']) ?> </td>
				
						<form action="addreservation.php" method="post">
							<td> 
								<input type="number" name="numTicket"><br>
							</td>
							<td>$10.99 USD</td>
							<td>
								<button class="btn" onclick="" name="AddRes" value="<?php echo $showingID; ?>">Confirm Purchase</button>
							</td>
						</form>
					</tr>
		    <?php }?>
		</table>
	</div>	
	  
	
	  
		<!--<footer>-->
		<footer>
			<?php include(ROOT_PATH . '/includes/footer.php') ?>
		</footer>
</body>
</html>