<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="mainPage.php" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
    <a href="login.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Login</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Link 2</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Link 3</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Link 4</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="login.php" class="w3-bar-item w3-button w3-padding-large">Login</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 4</a>
  </div>
</div>

<!-- text -->
<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-third w3-center">
      <i class="fa fa-coffee w3-padding-64 w3-text-red w3-margin-right"></i>
    </div>
​
    <div class="w3-twothird">
      <form method="post" action="regProcess.php">
      <h1>Registration</h1>
      <label for="FirstName"><b>*First Name</b></label>
      <input type="text" placeholder="Enter First Name" name="FirstName" required>
      <br />
      <label for="LastName"><b>*Last Name</b></label>
      <input type="text" placeholder="Enter Last Name" name="LastName" required>
      <br />
      <label for="Password"><b>*Password</b></label>
      <input type="password" placeholder="Enter Password" name="Password" required>
      <br />
      <label for="Email"><b>*Email</b></label>
      <input type="text" placeholder="Enter Email" name="Email" required>
      <br />
      <h2>Credit Card Info</h2>
      <label for="CardNum"><b>*Credit Card Number</b></label>
      <input type="text" placeholder="Enter Credit Card Number" name="CardNum" required>
      <br />
      <label for="ExpMonth"><b>*Credit Card Expiration Month</b></label>
      <input type="number" placeholder="Enter Credit Card Expiration Month" name="ExpMonth" required>
      <br />
      <label for="ExpYear"><b>*Credit Card Expiration Year</b></label>
      <input type="number" placeholder="Enter Credit Card Expiration Year" name="ExpYear" required>
      <br />

      <h2>Address Info</h2>
      <label for="StreetNum"><b>*Street Number</b></label>
      <input type="number" placeholder="Enter Street Number" name="StreetNum" required>
      <br />
      <label for="StreetName"><b>*Street Name</b></label>
      <input type="text" placeholder="Enter Street Name" name="StreetName" required>
      <br />
      <label for="AptNum"><b>Apartment Number</b></label>
      <input type="number" placeholder="Enter Apartment Number" name="AptNum">
      <br />
      <label for="City"><b>*City</b></label>
      <input type="text" placeholder="Enter City" name="City" required>
      <br />
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
      <br />
      <label for="PostalCode"><b>*Postal Code</b></label>
      <input type="text" placeholder="Enter Postal Code" name="PostalCode" required>
      <br />
      <label for="PhoneNum"><b>Phone Number</b></label>
      <input type="number" placeholder="Enter Phone Number" name="PhoneNum" >


      <br />
      <input type="submit" value="Sign Up">
      </form>

      <p>* = Mandatory Fields</p>
    </div>
  </div>
</div>
​
<div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge">Quote of the day: live life</h1>
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity">
  <div class="w3-xlarge w3-padding-32">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
 </div>
</footer>

<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

<?php
  $connect = mysqli_connect("localhost","root","","test");


  $result = mysqli_query($connect,"SELECT AccountNumber FROM Customer WHERE FirstName = 'asdf'");

  if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
          echo $row["AccountNumber"];
      }
  } else {
      echo "0 results";
  }

  echo "<label> <b>New Account Number: </b></label>";
  $connect->close();
?>

</body>
</html>
