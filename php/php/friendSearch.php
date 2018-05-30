<?php 
include 'connectDB.php';

session_start();
$sid = $_SESSION['sid'];
if (isset($_POST['friendsname'])) {
	$keyword = $_POST['friendsname'];
}
if (isset($_SESSION['friendsname'])) {
	$rid = $_SESSION['friendsname'];
	$keyword = $_SESSION['keyword'];
}
$_SESSION['stranger'] = 'strange';


$conn = connectDB();

$sql = "select sid from Student where sid like '%$keyword%' and sid != '$sid'";
$result = $conn->query($sql);
echo "<div class='friendSearch'>";
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$user = $row['sid'];
		$ifFriend = ifFriends($conn, $sid, $user);
		if ($ifFriend) {
			echo "<form method='post' action='friendProfile.php'>";
			echo "<br>"."Username: ".$user." (Friend)";
	        echo "<input type='hidden' name = 'fid' value='$user'>";
	        echo "<input type='submit' value='Profile'>";
	        echo "</form>";
		} else {
	        // No friend relationship, need to add
		    echo "<form class='view10' method='post' action='friendRequest.php'>";
		    echo "<input type='hidden' name = 'sid' value='$sid'>";
		    echo "<input type='hidden' name = 'rid' value='$user'>";
		    echo "<input type='hidden' name = 'keyword' value='$keyword'>";
			echo "<br>"."Username: ".$user." <input type='submit' value='Add'>"."&nbsp;";
			echo "</form>";

			$ifRestrict = ifRestrict($conn, $user);
			if ($ifRestrict == 'Y') {
				echo "<form class='view20' method='post' action='friendProfile.php'>";
		        echo "<input type='hidden' name = 'fid' value='$user'>";
		        echo "<input type='submit' value='Profile'>";
		        echo "</form><br>";
			} else {
				echo " &nbsp;Lock profile<br>";
			}
		}
	}
} else {
	echo "No Results";
}
echo "<br>"."<p class='change_link'>
	   <a href='mainPage.php' class='tosignup'>Return to the main page</a>
	  </p>";
echo "</div>";

function ifFriends($conn, $sid, $user) {
	$sql0 = "select * from Friends where (sid='$sid' and fid='$user') or (sid='$user' and fid='$sid')";
	$result0 = $conn->query($sql0);
	if($result0->num_rows > 0) {
		return True;
	} else {
		return False;
	}
}

function ifRestrict($conn, $user) {
	$res = $conn->query("select srestriction from studentInfo where sid='$user'");
	if ($res->num_rows > 0) {
		$row = $res->fetch_assoc();
		$ifRestrict = $row['srestriction'];
	} else {
		$ifRestrict = '';
	}
	return $ifRestrict;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<link rel="stylesheet" type="text/css" href="..\css\style.css">
</head>
<body>


</body>
</html>