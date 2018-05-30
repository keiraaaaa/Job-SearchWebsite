<?php 
	include 'connectDB.php';
	session_start();
	$jid = $_POST['jid'];
	$sid = $_POST['sid'];
	$fid = $_POST['forward'];
	$jobname = $_POST['jobname'];

	$conn = connectDB();
	$now = new DateTime(null, new DateTimeZone('America/New_York'));
	$currdate = $now->format('Y-m-d H:i:s');

	$query = "insert into `FriendMessage` values ('$sid','$fid','$currdate','JobInfo','$jid');";
    $result = mysqli_query($conn, $query) or die('Query failed: ' . mysqli_error($conn));


	if ($result === TRUE) {
		$_SESSION['sid'] = $sid;
		$_SESSION['jid'] = $jid; 
		$_SESSION['jobname'] = $jobname; 
		header("Location: Forward_Search.php");
	}
	else {
		echo "Error updating record: " . $conn->error;
	}
?>