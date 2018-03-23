<!DOCTYPE html>
<?php
require_once('config.php');
 if($_SERVER["REQUEST_METHOD"] == "POST") {
	//initialize variables
	$Title=$_POST['review'];
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

        <form method="post" action="addreview.php">
            <h1>'<?php echo $Title ?>' Review</h1>
            <input type="hidden" value="<?php echo $Title; ?>" name="Title" required>
            <label for="Review"><b>*Review</b></label>
            <input type="text" placeholder="Enter Review" name="Review" required>

            <br/>
            <input type="submit" value="Submit Review">
        </form>

    </div>
</div>

</body>
</html>
