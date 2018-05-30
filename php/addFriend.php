<?php  
include 'connectDB.php';

session_start();
$sid = $_POST['requestman'];
$rid = $_POST['berequestedman'];
$time = $_POST['requesttime'];
if(isset($_POST['agree'])) {
	$status = 1; // agree add friend
} else {
	$status = 0; // reject add friend
}
$_SESSION['sid'] = $rid;
$conn = connectDB();
if ($status === 1) {
	// delete the record in friendRequest and add turple into Friends table
	$sql_delete = "delete from friendRequest where sid='$sid' and rid='$rid' and requesttime='$time'";
	if ($conn->query($sql_delete) === True) {
		// delete success, then insert
		$sql_insert = "INSERT INTO `Friends` VALUES ('$sid','$rid');";
		$sql_insert2 = "INSERT INTO `Friends` VALUES ('$rid','$sid');";
		if ($conn->query($sql_insert) === True && $conn->query($sql_insert2) === True) {
			// delete success, insert success, become friends
			header("Location: friendNotifications.php");
		} else {
			echo "Error updating record: " . $conn->error;
		}
	} else {
		echo "Error updating record: " . $conn->error;
	}
} else {
	// update friendRequest from pending to rejected
	$sql0 = "update friendRequest
			 set frstatus='Rejected'
			 where sid='$sid' and rid='$rid' and requesttime='$time'";
	if ($conn->query($sql0) === True) {
		header("Location: friendNotifications.php");
	} else {
	    echo "Error updating record: " . $conn->error;
	}
}

?>