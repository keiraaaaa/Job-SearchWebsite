<?php
	include 'connectDB.php';
	session_start();
	$sid = $_SESSION['sid'];

	$conn = connectDB();

 	$query1 = "select * from Company natural join JobInfo natural join JobNotifications where sid='$sid' and ViewStstus='New' and jid not in (select jid from JobApply where sid = '$sid')";
    $result1 = mysqli_query($conn, $query1) or die('Query failed: ' . mysqli_error($conn));

 // 	$query = "insert into JobApply (`sid`,`jid`,`cid`) VALUES ('".$sid."','".$jid."','".$row1["cid"]."')";
	// $result = mysqli_query($conn, $query) or die('Query failed: ' . mysqli_error($conn));
	
	// if ($result === TRUE) {
	// 	$_SESSION['sid'] = $sid;
	// 	$_SESSION['jid'] = $jid;
	// 	header("Location: MarkViewed.php");
	// }
	// else {
	// 	echo "Error updating record: " . $conn->error;
	// }
?>