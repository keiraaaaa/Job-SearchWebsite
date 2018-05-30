<?php 
include 'connectDB.php';
session_start();
$sid = $_POST['sid'];
$rid = $_POST['rid'];
$keyword = $_POST['keyword'];

$now = new DateTime(null, new DateTimeZone('America/New_York'));
$currdate = $now->format('Y-m-d H:i:s');

$conn = connectDB();

$sql = "INSERT INTO `FriendRequest` VALUES ('$sid', '$rid', '$currdate','Pending');";
if ($conn->query($sql) === TRUE) {
	$_SESSION['friendsname'] = $rid;
	$_SESSION['keyword'] = $keyword;
	header("Location: friendSearch.php");
} else {
	echo "Error updating record: " . $conn->error;
}
?>