<?php
   require_once('config.php');
?>


<!DOCTYPE html>
<?php
session_start();
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
            <li><a href="account.php">My Account</a></li>

              <?php if($_SESSION['isAdmin'] == 1) : ?>
                  <li class="current"><a href="admin.php">Admin</a></li>
              <?php endif; ?>

          </ul>
        </nav>
      </div>
    </header>

  <br/>

<h2>Administrator</h2>

  <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'MemberList')">All Customers</button>
    <button class="tablinks" onclick="openCity(event, 'ComplexList')">All Complexes</button>
    <button class="tablinks" onclick="openCity(event, 'Update')">Update Info</button>
    <button class="tablinks" onclick="openCity(event, 'MemberList')">View Current Purchases</button>
    <button class="tablinks" onclick="openCity(event, 'ComplexList')">View Old Purchases</button>
    <button class="tablinks" onclick="openCity(event, 'Update')">Update Info</button>
  </div>

  <div id="MemberList" class="tabcontent">
    <?php
      require_once('config.php');
      $sql = "SELECT * FROM Customer WHERE isAdmin = 0";
      $result = mysqli_query($db,$sql);
    ?>
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
             <tr>
                 <th>Account Number</th>
                 <th>Name</th>
                 <th>Email</th>
                 <th></th>
                 <th></th>
             </tr>

                 <?php
                    while($row=mysqli_fetch_array($result))
                    {

                   ?>
                <tr>
                   <td><?php print_r($row['AccountNumber']); ?></td>
                   <td><?php print_r($row['FirstName'] . " " . $row['LastName']); ?></td>
                   <td><?php print_r($row['Email']); ?></td>
                   <form action="removemember.php" method="post" >
                     <td><button class="btn" onclick="" name="removeMember" value="<?php echo $row['AccountNumber']  ?>">Remove Member</button></td>
                   </form>
                   <form action="history.php" method="post" >
                     <td><button class="btn" onclick="" name="memberHistory" value="<?php echo $row['AccountNumber']  ?>">Member History</button></td>
                   </form>
                 </tr>
                   <?php
                    }
                    ?>


          </table>
       </div>
  </div>




  <div id="ComplexList" class="tabcontent">
    <?php
      require_once('config.php');
      $sql = "SELECT * FROM TheatreComplex ORDER BY Name";
      $result = mysqli_query($db,$sql);
    ?>

    <?php
      $sqlP2 = "SELECT TheatreName FROM (SELECT* FROM playing natural join reservation)
       AS T1 GROUP BY TheatreName ORDER BY SUM(NumberOfTickets) DESC LIMIT 1";
      $resultP2 = mysqli_query($db,$sqlP2);
      $popular=mysqli_fetch_array($resultP2);
    ?>

    <h3>Most popular is: <?php echo $popular['TheatreName']?></h3>


    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
             <tr>
                 <th>Name</th>
                 <th>Address</th>
                 <th>Phone #</th>
                 <th></th>
                 <th></th>
             </tr>

                 <?php
                    while($row=mysqli_fetch_array($result))
                    {

                   ?>
                <tr>
                   <td><?php print_r($row['Name']); ?></td>
                   <td><?php print_r($row['StreetNumber'] . " " . $row['StreetName'] . ", " . $row['City'] . " " . $row['Province'] . ", " . $row['PostalCode']); ?></td>
                   <td><?php print_r($row['PhoneNumber']); ?></td>
                   <form action="theatres.php" method="post" >
                     <td><button class="btn" onclick="" name="theater_btn" value="<?php echo $row['Name']  ?>">View Theatres</button></td>
                   </form>
                   <form action="editcomplex.php" method="post" >
                     <td><button class="btn" onclick="" name="editcomplex" value="<?php echo $row['Name']  ?>">Edit Complex</button></td>
                   </form>
                 </tr>
                   <?php
                    }
                    ?>


          </table>
       </div>

       <a href="addcomplex.php">
   		<button class="btn" onclick="" name="login_btn">Add Complex</button>
   		</a>

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
