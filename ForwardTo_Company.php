<?php 
	include 'connectDB.php';
	session_start();
	$jid = $_POST['jid'];
	$sid = $_POST['sid'];
	$fid = $_POST['forward'];
	$keyword = $_POST['keyword'];

	$conn = connectDB();

	$query = "insert into `Forward` values ('$sid','$fid','$jid');";
    $result = mysqli_query($conn, $query) or die('Query failed: ' . mysqli_error($conn));


	if ($result === TRUE) {
		$_SESSION['sid'] = $sid;
		$_SESSION['jid'] = $jid; 
		$_SESSION['keyword'] = $keyword;
		$_SESSION['fid'] = $fid; 
		header("Location: Forward_Company.php");
	}
	else {
		echo "Error updating record: " . $conn->error;
	}
?>