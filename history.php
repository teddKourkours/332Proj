<!DOCTYPE html>
<?php
session_start();
?>

<?php
require_once('config.php');
 if($_SERVER["REQUEST_METHOD"] == "POST") {

   $AccNum = $_POST['memberHistory'];
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

<h2>Customer History</h2>


  <div>
    <?php
      require_once('config.php');
      $sql = "Select * FROM (SELECT * FROM reservation natural join showing) AS T1 WHERE AccountNumber = '$AccNum'";
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
                 </tr>
                   <?php
                    }
                    ?>


          </table>
       </div>
  </div>


		<!-- footer -->
    <br/><br/><br/>
    <footer>
		<?php include(ROOT_PATH . '/includes/footer.php') ?>
    </footer>
</body>
</html>
