<!DOCTYPE html>
<?php
session_start();
?>

<?php
require_once('config.php');
 if($_SERVER["REQUEST_METHOD"] == "POST") {

 	$name=$_POST['Name'];
 	$street_num=$_POST['StreetNum'];
 	$street_name=$_POST['StreetName'];
 	$city=$_POST['City'];
 	$province=$_POST['Province'];
 	$postal=$_POST['PostalCode'];
 	$phone_num=$_POST['PhoneNum'];
 	$num_theatres=$_POST['NumTheatres'];
 	if($phone_num=="")$phone_num="NULL";

 	//Execute the query
 	$sql =  "INSERT INTO TheatreComplex
 	VALUES ('$name', $street_num, '$street_name',
 	   '$city', '$province', '$postal', $phone_num, '$num_theatres')";

    mysqli_query($db,$sql);

 	header("Location: http://localhost/332Proj/admin.php");
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

        <form method="post" action="addcomplex.php">

          <label for="Name"><b>*Theatre Name</b></label>
          <input type="input" placeholder="Enter Theatre Name" name="Name" required>
          <br/>

            <h2>Address Info</h2>
            <label for="StreetNum"><b>*Street Number</b></label>
            <input type="number" placeholder="Enter Street Number" name="StreetNum" required>
            <br/>
            <label for="StreetName"><b>*Street Name</b></label>
            <input type="text" placeholder="Enter Street Name" name="StreetName" required>
            <br/>
            <label for="City"><b>*City</b></label>
            <input type="text" placeholder="Enter City" name="City" required>
            <br/>
            <label for="Province"><b>*Province</b></label>
            <select name="Province" required>
                <option value="AB">Alberta</option>
                <option value="BC">British Columbia</option>
                <option value="MB">Manitoba</option>
                <option value="NB">New Brunswick</option>
                <option value="NL">Newfoundland and Labrador</option>
                <option value="NS">Nova Scotia</option>
                <option value="NT">Nothwest Territories</option>
                <option value="NU">Nunavut</option>
                <option value="ON">Ontario</option>
                <option value="PE">Prince Edward Island</option>
                <option value="QC">Quebec</option>
                <option value="SK">Saskatchewan</option>
                <option value="YT">Yukon Territories</option>
            </select>
            <br/>
            <label for="PostalCode"><b>*Postal Code</b></label>
            <input type="text" placeholder="Enter Postal Code" name="PostalCode" required>
            <br/>
            <label for="PhoneNum"><b>Phone Number</b></label>
            <input type="number" placeholder="Enter Phone Number" name="PhoneNum">
            <br/>
            <label for="NumTheatres"><b>*Number of Theatres</b></label>
            <input type="number" placeholder="Enter Number of Theatres" name="NumTheatres" required>

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
