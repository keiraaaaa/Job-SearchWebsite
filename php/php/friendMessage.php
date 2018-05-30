<?php
include 'connectDB.php';

session_start();
if (isset($_SESSION['sid']) && isset($_SESSION['fid']) ) {
    $sid = $_SESSION['sid'];
    $fid = $_SESSION['fid'];
}
if (isset($_POST['sid']) && isset($_POST['fid']) ) {
    $sid = $_POST['sid'];
    $fid = $_POST['fid'];
}

echo "Hello, ".$sid." AND ".$fid."<br>";
$finalSid = $sid;
$finalFid = $fid;

$conn = connectDB();

$sql = "Select * from FriendMessage 	
		where (sid='$sid' and fid='$fid') or (sid='$fid' and fid='$sid')
		order by mdate";
$result = $conn->query($sql);

if ($result->num_rows > 0) { // output data of each row
    while($row = $result->fetch_assoc()) {
    	$sid = $row['sid'];
    	$fid = $row['fid'];
        $message = $row["message"];
        $mdate = $row['mdate'];
        if ($row['jidmes'] != '') {
            $jid = $row['jidmes'];
            echo "<br> ".$mdate."<br>";
            echo "<form method='post' action='..\phpw\ViewJob.php'>";
            echo $sid." talk to ".$fid." : ".
                "<input type='hidden' name = 'job' value='$jid'>".
                "<input class='joblink' type='submit' value='Job Information'>"."</form>";
            // echo "</form>";
        } else {
            $jid = '';
            echo "<br> ".$mdate."<br>";
            echo "<br>".$sid." talk to ".$fid." : ".$message."<br>";
        }
    }
	echo "<br> New Message: <br>";
    // set the button
    echo "<form method='post' action='addMessage.php'>";
    echo "<p><textarea name='message' rows='10' cols='80' required='required'></textarea>";
    // mark the current time
    $now = new DateTime(null, new DateTimeZone('America/New_York'));
	$currdate = $now->format('Y-m-d H:i:s');    // MySQL datetime format
	echo "<br> Current Time: ".$currdate."<br>";

    $_SESSION['sid'] = $finalSid;
    $_SESSION['fid'] = $finalFid;
	echo "<p><input type='submit' value='Send'>";
    echo "<br></br>"."<a href='viewFriends.php'>Return to the friend list</a>";
	echo "</form>";
} else {
    // echo "Add more Friends!";
    echo "<br> New Message: <br>";
    // set the button
    echo "<form method='post' action='addMessage.php'>";
    echo "<p><textarea name='message' rows='10' cols='80' required='required'></textarea>";
    // mark the current time
    $now = new DateTime(null, new DateTimeZone('America/New_York'));
    $currdate = $now->format('Y-m-d H:i:s');    // MySQL datetime format
    echo "<br> Current Time: ".$currdate."<br>";

    $_SESSION['sid'] = $finalSid;
    $_SESSION['fid'] = $finalFid;
    echo "<p><input type='submit' value='Send'>";
    echo "<br></br>"."<a href='viewFriends.php'>Return to the friend list</a>";
    echo "</form>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Jobster</title>
    <link rel="stylesheet" type="text/css" href="..\css\style.css">
</head>
<body class="profile">
</body>
</html>