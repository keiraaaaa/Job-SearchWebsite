<?php  
	function connectDB() {
		// connect to the database
		$host="127.0.0.1";
		$user="root";
		$password="";
		$dbname="jobhunter";


		$conn = mysqli_connect($host, $user, $password, $dbname);
		if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

		return $conn;
	}
	// function connectDB() {
	// 	// connect to the database
	// 	$conn = new mysqli('localhost','root','','jobster');
	// 	// check connection
	// 	if ($conn->connect_error) {
	// 		die("Connection failed: " . $conn->connect_error);
	// 	}// echo "Access into system successfully"."<br>"."<br>";
	// 	return $conn;
	// }
?>