<?php
   require_once('config.php');
   session_start();

   //check if post
   if($_SERVER["REQUEST_METHOD"] == "POST") {

		$_SESSION['theatrecomplex'] = mysqli_real_escape_string($db,$_POST['theatrecomlexForm']);

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
            <li><a href="account.php">My Account</a></li>

              <?php if($_SESSION['isAdmin'] == 1) : ?>
                  <li><a href="admin.php">Admin</a></li>
              <?php endif; ?>

          </ul>
        </nav>
      </div>
    </header>

	<!-- container - wraps whole page -->
	<div class="box-body table-responsive no-padding">

		<table class="table table-hover">
		<h3>Select a Theatre Complex</h3>
			<tr>
				<th>Movie</th>
				<th>Time</th>
				<th>Date</th>
				<th></th>
			</tr>

					<form id="complex_form" method="post">
					<select name="theatrecomlexForm" onchange="change()">

						<!-- populate drop down with Theatre Complex -->
						<?php
							$sql = mysqli_query($db, "SELECT Name FROM theatrecomplex ORDER BY NAME");
							while ($row = $sql->fetch_assoc()){
								if($row['Name'] != $_SESSION['theatrecomplex']){
									echo "<option>" . $row['Name'] . "</option>";
								}
							}

							if(isset($_SESSION['theatrecomplex'])){
							?><option selected value =""><?php echo $_SESSION['theatrecomplex']; ?></option><?php
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




			<?php
				$results = mysqli_query($db, "SELECT Title,StartHourTime,StartMinuteTime,DateOfShowing,ShowingID FROM playing Natural join showing WHERE TheatreName = '{$_SESSION['theatrecomplex']}' ORDER BY DateOfShowing");
				while($data=mysqli_fetch_array($results)){ ?>
					<tr>
						<td> <?php  print_r($data['Title'] );?> </td>
						<td> <?php print_r($data['StartHourTime']. ":" . $data['StartMinuteTime']) ?> </td>
						<td> <?php print_r($data['DateOfShowing']) ?> </td>

						<form action="purchase.php" method="post" >
							<td><button class="btn" onclick="" name="showingID" value="<?php echo $data['ShowingID']; ?>">Purchase</button></td>
						</form>
					</tr>
		    <?php }?>
		</table>
	</div>
	<!-- footer -->
    <footer>
		<?php include(ROOT_PATH . '/includes/footer.php') ?>
    </footer>
</body>
</html>
