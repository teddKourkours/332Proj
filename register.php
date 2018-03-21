<!DOCTYPE html>
<?php
require_once('config.php');
 if($_SERVER["REQUEST_METHOD"] == "POST") {
	//initialize variables
	$pw=$_POST['Password'];
	$first_name=$_POST['FirstName'];
	$last_name=$_POST['LastName'];
	$card_num=$_POST['CardNum'];
	$exp_month=$_POST['ExpMonth'];
	$exp_year=$_POST['ExpYear'];
	$street_num=$_POST['StreetNum'];
	$street_name=$_POST['StreetName'];
	$apt_num=$_POST['AptNum'];
	$city=$_POST['City'];
	$province=$_POST['Province'];
	$postal=$_POST['PostalCode'];
	$phone_num=$_POST['PhoneNum'];
	$email=$_POST['Email'];
	if($apt_num=="")$apt_num="NULL";
	if($phone_num=="")$phone_num="NULL";

	//Execute the query
	$sql =  "INSERT INTO Customer
	VALUES (NULL, '$pw', '$first_name', '$last_name', $card_num,
	  $exp_month, $exp_year, $street_num, '$street_name', $apt_num,
	   '$city', '$province', '$postal', $phone_num, '$email', 0)";
   
   mysqli_query($db,$sql);
   
   session_start();
			
	$result = mysqli_query($db, "SELECT MAX(AccountNumber) AS CurrentID FROM Customer");
	
    $_SESSION['account_Num'] = mysqli_fetch_assoc($result)["CurrentID"];

	  echo $_SESSION['account_Num'];
	//header('Location: home.php');
	
 }
?>


<html>
<head>
	<?php include(ROOT_PATH . '/includes/head_section.php') ?>
    <title>Online Movie Ticket Service | Home </title>
</head>
<body>
<!-- container - wraps whole page -->
<div class="container col-md-4">
    <div class="login_div" style="margin-top: 30%; margin-bottom: -30%;">

        <form method="post" action="register.php">
            <h1>Registration</h1>
            <label for="FirstName"><b>*First Name</b></label>
            <input type="text" placeholder="Enter First Name" name="FirstName" required>
            <br/>
            <label for="LastName"><b>*Last Name</b></label>
            <input type="text" placeholder="Enter Last Name" name="LastName" required>
            <br/>
            <label for="Password"><b>*Password</b></label>
            <input type="password" placeholder="Enter Password" name="Password" required>
            <br/>
            <label for="Email"><b>*Email</b></label>
            <input type="text" placeholder="Enter Email" name="Email" required>
            <br/>
            <h2>Credit Card Info</h2>
            <label for="CardNum"><b>*Credit Card Number</b></label>
            <input type="text" placeholder="Enter Credit Card Number" name="CardNum" required>
            <br/>
            <label for="ExpMonth"><b>*Credit Card Expiration Month</b></label>
            <input type="number" placeholder="Enter Credit Card Expiration Month" name="ExpMonth" required>
            <br/>
            <label for="ExpYear"><b>*Credit Card Expiration Year</b></label>
            <input type="number" placeholder="Enter Credit Card Expiration Year" name="ExpYear" required>
            <br/>

            <h2>Address Info</h2>
            <label for="StreetNum"><b>*Street Number</b></label>
            <input type="number" placeholder="Enter Street Number" name="StreetNum" required>
            <br/>
            <label for="StreetName"><b>*Street Name</b></label>
            <input type="text" placeholder="Enter Street Name" name="StreetName" required>
            <br/>
            <label for="AptNum"><b>Apartment Number</b></label>
            <input type="number" placeholder="Enter Apartment Number" name="AptNum">
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
            <input type="submit" value="Sign Up">
        </form>

    </div>
</div>

</body>
</html>

