<?php 
include('connectDB.php');
session_start();

$sid = $_POST['username'];
$spassword = $_POST['password'];

$conn = connectDB();
$ifAvailable = checkStudentId($conn, $sid, $spassword);
if($ifAvailable) {
	$_SESSION['sid']   = $sid;
	header("Location: mainPage.php");
} else {
	// $_SESSION['warning'] = "The username isn't exist or Password is wrong. Please Login again";
	// header("Location: studentLogin.php");
	echo "The username isn't exist or Password is wrong";
	echo "<br>";
	echo "Please Login again";
}

function checkStudentId($conn,$sid, $spassword) {
	$sql = "select sid, spassword from Student where sid = '$sid' and spassword = '$spassword'";
	$result = $conn->query($sql);
	// check if member id exists in the databse
	if ($result->num_rows > 0) {
		return True;
	} else {
		return False;
	}
}



 ?>