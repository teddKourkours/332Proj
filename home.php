<?php
   require_once('config.php');
   session_start();
   
   //check if post
   if($_SERVER["REQUEST_METHOD"] == "POST") {
	   
		
		$_SESSION['theatrecomplex'] = mysqli_real_escape_string($db,$_POST['theatrecomlexForm']);
		
		if (!isset($_SESSION['date'])){
			$_SESSION['date'] = date('Y-m-d');
		}else{
			$_SESSION['date'] = mysqli_real_escape_string($db,$_POST['dateForm']);
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
	<div class="box-body table-responsive no-padding">
	
		<table class="table table-hover">
		
			<tr>
				<th>Theatre Complex&emsp;&emsp;&emsp;&emsp;Date
				
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
					
					
					<select name="dateForm" onchange="change()">
						
						<!--populate drop down with Dates -->
						<?php
							$sql2 = mysqli_query($db, "SELECT DateOfShowing FROM playing WHERE TheatreName = '{$_SESSION['theatrecomplex']}' ORDER BY DateOfShowing");
							while ($dateRow = $sql2->fetch_assoc()){
								if($dateRow['DateOfShowing'] != $_SESSION['date']){
									echo "<option>" . $dateRow['DateOfShowing'] . "</option>";
								}
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
				
				</th>
			</tr>
			
			
			
			<?php  
				if ($_SESSION['date'] != "" && $_SESSION['theatrecomplex'] != ""){
					$results = mysqli_query($db, "SELECT Title,StartHourTime,StartMinuteTime FROM playing WHERE TheatreName = '{$_SESSION['theatrecomplex']}' AND DateOfShowing > '{$_SESSION['date']}'");//AND DateOfShowing > '{$_SESSION['date']}'");//change to =
	
					while($data=mysqli_fetch_array($results)){ 
			?>
			
			<tr>
				<td> <?php  print_r($data[0] );?> &nbsp; <?php print_r($data[1]. ":" . $data[2]) ?></td>
			</tr>
				<?php }} ?>
			<tr>
				<td>
					<a href="logout.php">Logout</a>
					
				</td>
			</tr>
		</table>

	</div>	
	<!-- footer -->	
    <footer>
		<?php include(ROOT_PATH . '/includes/footer.php') ?>
    </footer>
</body>
</html>