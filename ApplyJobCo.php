<?php
	include 'connectDB.php';
	session_start();
	$jid = $_POST['apply'];
	$sid = $_POST['sid'];
	$cid = $_POST['cid'];
	$keyword = $_POST['keyword'];

	$conn = connectDB();

	$query1 = "select cid from JobInfo where jid='".$jid."'";
	$result1 = mysqli_query($conn, $query1) or die('Query failed: ' . mysqli_error($conn));
	$row1 = mysqli_fetch_assoc($result1);

 	$query = "insert into JobApply (`sid`,`jid`,`cid`) VALUES ('".$sid."','".$jid."','".$row1["cid"]."')";
	$result = mysqli_query($conn, $query) or die('Query failed: ' . mysqli_error($conn));
	
	if ($result === TRUE) {
		$_SESSION['keyword'] = $keyword;
		$_SESSION['sid'] = $sid;		
		$_SESSION['cid'] = $cid;
		header("Location: ViewJob_Company.php");
	}
	else {
		echo "Error updating record: " . $conn->error;
	}
?>

<!-- <script type="text/javascript">location.href = 'ViewJob.php';</script> -->
