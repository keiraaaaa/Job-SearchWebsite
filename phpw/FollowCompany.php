<?php
	include 'connectDB.php';
	session_start();
	$cid = $_POST['follow'];
	$sid = $_POST['sid'];
	$keyword = $_POST['keyword'];

	$conn = connectDB();

 	$query = "insert into Follow (`sid`,`cid`) VALUES ('".$sid."','".$cid."')";
	$result = mysqli_query($conn, $query) or die('Query failed: ' . mysqli_error($conn));
	
	if ($result === TRUE) {

		$_SESSION['keyword'] = $keyword;
		header("Location: ViewCompany.php");
	}
	else {
		echo "Error updating record: " . $conn->error;
	}
?>

<!-- <script type="text/javascript">location.href = 'ViewCompany.php';</script> -->
