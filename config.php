<?php 
	
	// connect to database
     $db = mysqli_connect("localhost", "root", "", "test");

	if (!$db) {
		die("Error connecting to database: " . mysqli_connect_error());
	}
    // define global constants
	define ('ROOT_PATH', realpath(dirname(__FILE__)));
	define('BASE_URL', 'http://localhost/332Proj/');
?>