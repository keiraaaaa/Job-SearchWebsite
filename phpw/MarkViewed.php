<?php
	include 'connectDB.php';
	session_start();
	$sid = $_SESSION['sid'];

	$conn = connectDB();

 	$query = "update JobNotifications natural join (select * from Company natural join JobInfo natural join JobNotifications where sid='$sid' and ViewStstus='New' and jid not in (select jid from JobApply where sid = '$sid') )as a set JobNotifications.ViewStstus='Viewed'";
	$result = mysqli_query($conn, $query) or die('Query failed: ' . mysqli_error($conn));
	
	if ($result === TRUE) {
		$_SESSION['sid'] = $sid;
		header("Location: ..\php\mainPage.php");
	}
	else {
		echo "Error updating record: " . $conn->error;
	}
?>