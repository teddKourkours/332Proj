<?php
  require_once('config.php');
   if($_SERVER["REQUEST_METHOD"] == "POST") {
  $Name = $_POST['editcomplex'];
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
      <?php
        require_once('config.php');
        $sql = "SELECT * FROM TheatreComplex WHERE Name = '$Name'";
        $result = mysqli_query($db,$sql);
        $row=mysqli_fetch_array($result);
      ?>
      <form method="post" action="editcomplexP2.php">
          <h1>Edit Information</h1>

          <label for="Name"><b>*Theatre Complex Name</b></label>
          <input type="text" value="<?php echo $row['Name']; ?>" name="Name" required>
          <br/>

          <h2>Address Info</h2>
          <label for="StreetNum"><b>*Street Number</b></label>
          <input type="number" value="<?php echo $row['StreetNumber']; ?>" name="StreetNum" required>
          <br/>
          <label for="StreetName"><b>*Street Name</b></label>
          <input type="text" value="<?php echo $row['StreetName']; ?>" name="StreetName" required>
          <br/>
          <label for="City"><b>*City</b></label>
          <input type="text" value="<?php echo $row['City']; ?>" name="City" required>
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
          <input type="text" value="<?php echo $row['PostalCode']; ?>" name="PostalCode" required>
          <br/>
          <label for="PhoneNum"><b>Phone Number</b></label>
          <input type="number" value="<?php echo $row['PhoneNumber']; ?>" name="PhoneNum">
          <br/>
          <label for="NumTheatres"><b>*Number of Theatres</b></label>
          <input type="number" value="<?php echo $row['NumberOfTheatres']; ?>" name="NumTheatres" required>


          <br/>
          <button class="btn" type="submit" name="update_btn">Update</button>
      </form>
<br/><br/><br/>
    </div>
</div>
<footer>
<?php include(ROOT_PATH . '/includes/footer.php') ?>
</footer>
</body>
</html>
