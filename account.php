<?php
   require_once('config.php');

  // if(isset($_SESSION['login_user']){


  // }else{

	//echo "what?"
   //}
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

  <br/>

  <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'CurrentPurchases')">View Current Purchases</button>
    <button class="tablinks" onclick="openCity(event, 'OldPurchases')">View Old Purchases</button>
    <button class="tablinks" onclick="openCity(event, 'Update')">Update Info</button>
  </div>

  <div id="CurrentPurchases" class="tabcontent">
    <h3>London</h3>
    <?php
      require_once('config.php');
      $sql = "SELECT AccountNumber, Title, DateOfShowing FROM Reservation WHERE AccountNumber = 1";
      $result = mysqli_query($db,$sql);
    ?>
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
             <tr>
                 <th>Account</th>
                 <th>Title</th>
                 <th>Date</th>
             </tr>

                 <?php
                    while($row=mysqli_fetch_array($result))
                    {

                   ?>
                <tr>
                   <td><?php print_r($row[0]); ?></td>
                   <td><?php print_r($row[1]); ?></td>
                   <td><?php print_r($row[2]); ?></td>
                 </tr>
                   <?php

                   }
                    ?>


          </table>
       </div>
  </div>

  <div id="Update" class="tabcontent">
    <h3>Paris</h3>
    <p>Paris is the capital of France.</p>
  </div>

  <div id="OldPurchases" class="tabcontent">
    <h3>Tokyo</h3>
    <p>Tokyo is the capital of Japan.</p>
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
    <footer>
		<?php include(ROOT_PATH . '/includes/footer.php') ?>
    </footer>
</body>
</html>
