<!DOCTYPE html>
<?php
session_start();
?>

<?php
require_once('config.php');
 if($_SERVER["REQUEST_METHOD"] == "POST") {

   $Complex = $_POST['updateMovies'];

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
      $sql = "SELECT Title FROM MovieBank WHERE TheatreName = '$Complex' ORDER BY Title";
      $result = mysqli_query($db,$sql);
    ?>
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
           <tr>
               <th>Title</th>
               <th></th>
           </tr>

               <?php
                  while($row=mysqli_fetch_array($result))
                  {

                 ?>
              <tr>
                 <td><?php print_r($row['Title']); ?></td>
                 <form action="removemovie.php" method="post" >
                   <input type="hidden" name="ComplexRemove" value="<?php echo $Complex?>">
                   <td><button class="btn" onclick="" name="removeMovie" value="<?php echo $row['Title']  ?>">Remove Movie</button></td>
                 </form>
               </tr>
                 <?php
                  }
                  ?>


        </table>
       </div>
  </div>

  <?php
    require_once('config.php');
    $sql = "SELECT T1.Title FROM (SELECT Title FROM Movie) AS T1 LEFT JOIN (SELECT Title FROM MovieBank
       WHERE TheatreName = '$Complex') AS T2 ON T1.Title = T2.Title WHERE T2.Title IS NULL ORDER BY T1.Title";
    $result = mysqli_query($db,$sql);
  ?>


  <form action="addMovieBank.php" method="post" >
        <select name="Movie">

  <?php
     while($row=mysqli_fetch_array($result))
     {

    ?>
          <option value="<?php echo $row['Title']; ?>"><?php echo $row['Title']; ?></option>
  <?php
   }

   ?>
   <input type="hidden" name="Complex" value="<?php echo $Complex?>">
 <input type="submit" value="Add Movie to Complex">
 </form>

    <footer>
		<?php include(ROOT_PATH . '/includes/footer.php') ?>
    </footer>
</body>
</html>
