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
    <button class="tablinks" onclick="openCity(event, 'AddMovies')">Add Movies</button>
    <button class="tablinks" onclick="openCity(event, 'UpdateShowing')">All Showings</button>
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

    <h3>Most Popular Theatre Complex is: <?php echo $popular['TheatreName']?></h3>


    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
             <tr>
                 <th>Name</th>
                 <th>Address</th>
                 <th>Phone #</th>
                 <th></th>
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
                   <form action="updatemovies.php" method="post" >
                     <td><button class="btn" onclick="" name="updateMovies" value="<?php echo $row['Name']  ?>">Update Movies</button></td>
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

  <div id="AddMovies" class="tabcontent">
            <form method="post" action="addmovie.php">
            <h1>Add a New Movie</h1>

                <label for="c"><b>*Title</b></label>
                <input type="text" placeholder="Enter Title" name="Title" required>
                <br/>
                <label for="Plot"><b>*Plot Synopsis</b></label>
                <input type="text" placeholder="Enter Plot Synopsis" name="Plot" required>
                <br/>
                <label for="RunTime"><b>*Run Time (Minutes)</b></label>
                <input type="number" placeholder="Enter Run Time" name="RunTime" required>
                <br/>
                <label for="Rating"><b>Rating</b></label>
                <input type="text" placeholder="Enter Rating" name="Rating" >
                <br/>
                <label for="DirFName"><b>*Director First Name</b></label>
                <input type="text" placeholder="Enter Director First Name" name="DirFName" required>
                <br/>
                <label for="DirLName"><b>*Director Last Name</b></label>
                <input type="text" placeholder="Enter Director Last Name" name="DirLName" required>
                <br/>
                <label for="ProdComp"><b>Production Company</b></label>
                <input type="text" placeholder="Enter Production Company" name="ProdComp" >
                <br/>
                <label for="StartDate"><b>*Start Date (YYYY-MM-DD)</b></label>
                <input type="text" placeholder="Enter Start Date" name="StartDate" required>
                <br/>
                <label for="EndDate"><b>*End Date (YYYY-MM-DD)</b></label>
                <input type="text" placeholder="Enter End Date" name="EndDate" required>
                <br/>
                <label for="Supplier"><b>*Supplier</b></label>
                <input type="text" placeholder="Enter Supplier" name="Supplier" required>
                <br/>

                <br/>
                <input type="submit" value="Add Movie">
            </form>
  </div>

  <div id="UpdateShowing" class="tabcontent">
    <?php
      require_once('config.php');
      $sql = "SELECT * FROM Showing ORDER BY DateOfShowing";
      $result = mysqli_query($db,$sql);
    ?>

    <?php
      $sqlP2 = "SELECT Title, SUM(NumberOfTickets) FROM (SELECT * FROM showing
        natural join reservation) AS T1 GROUP BY Title ORDER BY SUM(NumberOfTickets) DESC LIMIT 1";
      $resultP2 = mysqli_query($db,$sqlP2);
      $popular=mysqli_fetch_array($resultP2);
    ?>
    <h3>Most Popular Movie is: <?php echo $popular['Title']?></h3>


    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
             <tr>
                 <th>Title</th>
                 <th>Start Time</th>
                 <th>Date</th>
                 <th></th>
                 <th></th>
             </tr>

                 <?php
                    while($row=mysqli_fetch_array($result))
                    {

                   ?>
                <tr>
                   <td><?php print_r($row['Title']); ?></td>
                   <td><?php print_r($row['StartHourTime'] . ":" . $row['StartMinuteTime']); ?></td>
                   <td><?php print_r($row['DateOfShowing']); ?></td>
                   <form action="removeshowing.php" method="post" >
                     <td><button class="btn" onclick="" name="removeshowing" value="<?php echo $row['ShowingID']  ?>">Remove Showing</button></td>
                   </form>
                   <form action="editshowing.php" method="post" >
                     <td><button class="btn" onclick="" name="editshowing" value="<?php echo $row['ShowingID']  ?>">Edit Showing</button></td>
                   </form>
                 </tr>
                   <?php
                    }
                    ?>


          </table>
       </div>

       <a href="addshowing.php">
      <button class="btn" onclick="" name="addshowing">Add Showing</button>
      </a>


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
