<!DOCTYPE html>
<?php
session_start();
?>

<?php
require_once('config.php');
 if($_SERVER["REQUEST_METHOD"] == "POST") {

   $Complex = $_POST['theater_btn'];

   $_SESSION['Complex'] = $Complex;

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

<h2><?php echo $Complex ?></h2>


  <div>
    <?php
      require_once('config.php');
      $sql = "SELECT * FROM Theatre WHERE TheatreName = '$Complex' ORDER BY ID";
      $result = mysqli_query($db,$sql);
    ?>
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
           <tr>
               <th>Theatre ID</th>
               <th>Maximum Seating</th>
               <th>Screen Size</th>
               <th></th>
           </tr>

               <?php
                  while($row=mysqli_fetch_array($result))
                  {

                 ?>
              <tr>
                 <td><?php print_r($row['ID']); ?></td>
                 <td><?php print_r($row['MaxSeating']); ?></td>
                 <td><?php print_r($row['ScreenSize']); ?></td>
                 <form action="edittheatre.php" method="post" >
                   <td><button class="btn" onclick="" name="edittheatre" value="<?php echo $row['ID']  ?>">Edit Theatre</button></td>
                 </form>
               </tr>
                 <?php
                  }
                  ?>


        </table>
       </div>
  </div>

  <form action="addtheatre.php" method="post" >
    <td><button class="btn" onclick="" name="addtheatre" value="<?php echo $Complex ?>">Add Theatre</button></td>
  </form>

		<!-- footer -->
    <br/><br/><br/>
    <footer>
		<?php include(ROOT_PATH . '/includes/footer.php') ?>
    </footer>
</body>
</html>
