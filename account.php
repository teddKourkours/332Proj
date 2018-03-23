<?php
   require_once('config.php');

  // if(isset($_SESSION['login_user']){


  // }else{

	//echo "what?"
   //}
?>


<!DOCTYPE html>
<?php
session_start();
?>
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

  echo $_SESSION['account_Num'];

  //Execute the query
  $sql =  "UPDATE Customer
          SET Password = '$pw',
          FirstName ='$first_name',
          LastName = '$last_name',
          CreditCardNum = '$card_num',
          CardExpiryMonth = '$exp_month',
          CardExpiryYear = '$exp_year',
          StreetNumber = '$street_num',
          StreetName = '$street_name',
          AptNumber = '$apt_num',
          City = '$city',
          Province = '$province',
          PostalCode = '$postal',
          PhoneNumber = '$phone_num',
          Email = '$email'

          WHERE AccountNumber = '{$_SESSION['account_Num']}'";

   mysqli_query($db,$sql);

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
            <li><a href="home.php">Home</a></li>
            <li><a href="about.php">Contact</a></li>
            <li class="current"><a href="account.php">My Account</a></li>

              <?php if($_SESSION['isAdmin'] == 1) : ?>
                  <li><a href="admin.php">Admin</a></li>
              <?php endif; ?>

          </ul>
        </nav>
      </div>
    </header>

  <br/>

<h2>My Account</h2>

  <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'CurrentPurchases')">View Current Purchases</button>
    <button class="tablinks" onclick="openCity(event, 'OldPurchases')">View Old Purchases</button>
    <button class="tablinks" onclick="openCity(event, 'Update')">Update Info</button>
  </div>

  <div id="CurrentPurchases" class="tabcontent">
    <?php
      require_once('config.php');
      $sql = "Select * FROM (SELECT * FROM reservation natural join showing) AS T1 WHERE AccountNumber = '{$_SESSION['account_Num']}' AND DateOfShowing >= CURDATE() ORDER BY DateOfShowing";
      $result = mysqli_query($db,$sql);
    ?>
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
             <tr>
                 <th>Movie</th>
                 <th>Time</th>
                 <th>Date</th>
                 <th>Number of Tickets</th>
                 <th>Ticket Price</th>
                 <th></th>
             </tr>

                 <?php
                    while($row=mysqli_fetch_array($result))
                    {

                   ?>
                <tr>
                   <td><?php print_r($row['Title']); ?></td>
                   <td><?php print_r($row['StartHourTime'] . " : " . $row['StartMinuteTime']); ?></td>
                   <td><?php print_r($row['DateOfShowing']); ?></td>
                   <td><?php print_r($row['NumberOfTickets']); ?></td>
                   <td><?php print_r($row['Price']); ?></td>
                   <form action="cancelpurchase.php" method="post" >
                     <td><button class="btn" onclick="" name="cancelPurchase" value="<?php echo $row['ReservationID']  ?>">Cancel Purchase</button></td>
                   </form>
                 </tr>
                   <?php
                    }
                    ?>


          </table>
       </div>
  </div>



  <div id="OldPurchases" class="tabcontent">
    <?php
      require_once('config.php');
      $sql = "Select * FROM (SELECT * FROM reservation natural join showing) AS T1 WHERE AccountNumber = '{$_SESSION['account_Num']}' AND DateOfShowing < CURDATE() ORDER BY DateOfShowing";
      $result = mysqli_query($db,$sql);
    ?>
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
             <tr>
                 <th>Movie</th>
                 <th>Time</th>
                 <th>Date</th>
                 <th>Number of Tickets</th>
                 <th>Ticket Price</th>
                 <th></th>
             </tr>

                 <?php
                    while($row=mysqli_fetch_array($result))
                    {

                   ?>
                <tr>
                   <td><?php print_r($row['Title']); ?></td>
                   <td><?php print_r($row['StartHourTime'] . " : " . $row['StartMinuteTime']); ?></td>
                   <td><?php print_r($row['DateOfShowing']); ?></td>
                   <td><?php print_r($row['NumberOfTickets']); ?></td>
                   <td><?php print_r($row['Price']); ?></td>
                   <form action="review.php" method="post" >
                     <td><button class="btn" onclick="" name="review" value="<?php echo $row['Title']  ?>">Add Review</button></td>
                   </form>
                 </tr>
                   <?php
                    }
                    ?>


          </table>
       </div>
  </div>

  <div id="Update" class="tabcontent">
    <?php
      require_once('config.php');
      $sql = "SELECT * FROM Customer WHERE AccountNumber = '{$_SESSION['account_Num']}'";
      $result = mysqli_query($db,$sql);
      $row=mysqli_fetch_array($result);
    ?>
    <form method="post" action="account.php">
        <h1>Edit Information</h1>
        <label for="FirstName"><b>*First Name</b></label>
        <input type="text" value="<?php echo $row['FirstName']; ?>" name="FirstName" required>
        <br/>
        <label for="LastName"><b>*Last Name</b></label>
        <input type="text" value="<?php echo $row['LastName']; ?>" name="LastName" required>
        <br/>
        <label for="Password"><b>*Password</b></label>
        <input type="password" value="<?php echo $row['Password']; ?>" name="Password" required>
        <br/>
        <label for="Email"><b>*Email</b></label>
        <input type="text" value="<?php echo $row['Email']; ?>" name="Email" required>
        <br/>
        <h2>Credit Card Info</h2>
        <label for="CardNum"><b>*Credit Card Number</b></label>
        <input type="text" value="<?php echo $row['CreditCardNum']; ?>" name="CardNum" required>
        <br/>
        <label for="ExpMonth"><b>*Credit Card Expiration Month</b></label>
        <input type="number" value="<?php echo $row['CardExpiryMonth']; ?>" name="ExpMonth" required>
        <br/>
        <label for="ExpYear"><b>*Credit Card Expiration Year</b></label>
        <input type="number" value="<?php echo $row['CardExpiryYear']; ?>" name="ExpYear" required>
        <br/>

        <h2>Address Info</h2>
        <label for="StreetNum"><b>*Street Number</b></label>
        <input type="number" value="<?php echo $row['StreetNumber']; ?>" name="StreetNum" required>
        <br/>
        <label for="StreetName"><b>*Street Name</b></label>
        <input type="text" value="<?php echo $row['StreetName']; ?>" name="StreetName" required>
        <br/>
        <label for="AptNum"><b>Apartment Number</b></label>
        <input type="number" value="<?php echo $row['AptNumber']; ?>" name="AptNum">
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
        <button class="btn" type="submit" name="update_btn">Update</button>
    </form>
    <br/><br/><br/>
  </div>

  <script>
  function openCity(evt, operation) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(operation).style.display = "block";
      evt.currentTarget.className += " active";
  }
  </script>

		<!-- footer -->
    <br/><br/><br/>
    <footer>
		<?php include(ROOT_PATH . '/includes/footer.php') ?>
    </footer>
</body>
</html>
