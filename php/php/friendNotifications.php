<?php 
include 'connectDB.php';

session_start();
$sid = $_SESSION['sid'];
echo "Hello, ".$sid." Your Friend Request: "."<br></br>";

$newRid = $_SESSION['newRequestFrom'];

$conn = connectDB();
$sql = "select * from friendRequest where rid='$sid' and frstatus='Pending'
		order by requesttime";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$user = $row['sid'];
		$time = $row['requesttime'];
		$status = $row['frstatus'];
		echo "Request From : ".$user."; Request time : ".$time."; Status : ".$status."<br></br>";
		// if new
		if ($user == $newRid) {
			echo " (New!!!)";
		}

		echo "<form method='post' action='addFriend.php'>";
	    echo "<input type='hidden' name = 'berequestedman' value='$sid'>";
	    echo "<input type='hidden' name = 'requestman' value='$user'>";
	    echo "<input type='hidden' name = 'requesttime' value='$time'>";
		echo "<input type='submit' name = 'agree' value='Agree'>"."&nbsp;&nbsp;".
			 "<input type='submit' name='reject' value='Reject'>"."<br></br>";
		echo "</form>";

	}
} else {
	echo "No friend Request";
}
$conn->query("update friendTrigger set freqTrigger=False,freqFrom='' where sid='$sid'");
echo "<br>"."<p class='change_link'>
	   <a href='mainPage.php' class='tosignup'>Return to the main page</a>
	  </p>";
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