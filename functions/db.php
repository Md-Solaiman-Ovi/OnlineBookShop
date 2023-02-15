<?php 
	$host = "localhost";
	$user = "root";
	$pass = "";
	$dbname = "book_store";
	$conn = mysqli_connect($host, $user, $pass, $dbname);
	if (!$conn) {
		echo 'Failed to connect with database';
	}

// $conn = new mysqli("localhost","root","","book_store");

// // Check connection
// if ($conn -> connect_errno) {
//   echo "Failed to connect to MySQL: " . $conn -> connect_error;
//   exit();
// }

 ?>