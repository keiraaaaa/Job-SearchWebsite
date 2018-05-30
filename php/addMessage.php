<?php 
include('connectDB.php');
session_start();

$sid = $_SESSION['sid'];
$fid = $_SESSION['fid'];
$message = $_POST['message'];
// $mdate = $_POST['mdate'];

$now = new DateTime(null, new DateTimeZone('America/New_York'));
$mdate = $now->format('Y-m-d H:i:s');    // MySQL datetime format

$conn = connectDB();
$mes =  mysqli_real_escape_string($conn, $message);
$sql = "INSERT INTO `FriendMessage` 
		VALUES ('$sid', '$fid', '$mdate','$mes','');";

if ($conn->query($sql) === TRUE) {
 //    echo "<form method='post' action='friendMessage.php'>";
 //    echo "<input type='hidden' name = 'sid' value='$sid'>";
 //    echo "<input type='hidden' name = 'fid' value='$fid'>";
 //    echo "<p><input type='submit' value='Return'>";
	// echo "</form>";
	$_SESSION['sid'] = $sid;
    $_SESSION['fid'] = $fid;
    header("Location: friendMessage.php");
} else {
    echo "Error updating record: " . $conn->error;
}
?>
