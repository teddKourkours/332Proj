

<?php
$connect = mysqli_connect("localhost","root","","test");
// create a variable
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

if ($connect->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Execute the query

$sql =  "INSERT INTO Customer
VALUES (NULL, '$pw', '$first_name', '$last_name', $card_num,
  $exp_month, $exp_year, $street_num, '$street_name', $apt_num,
   '$city', '$province', '$postal', $phone_num, '$email')";


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
