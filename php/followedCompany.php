<?php  
include 'connectDB.php';
session_start();
$sid = $_SESSION['sid'];
echo "<br>Hello, ".$sid."</br>";

$conn = connectDB();
$result = $conn->query("select cid from Follow where sid='$sid'");
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$cid = $row['cid'];
		echo "<br>Company: ".$cid."</br>";
		echo "<form method='post' action='..\phpw\ViewCompany.php'>";
        echo "<input type='hidden' name = 'cid' value='$cid'>".
            "<input class='joblink' type='submit' value='Company Information'>"."</form>";
	}
} else{
	echo "No applied Job";
}

echo "<br></br>"."<a href='viewProfile.php'>Return to Your Profile</a>";
?>




<!DOCTYPE html>
<html>
<head>
	<title>Company List</title>
	<link rel="stylesheet" type="text/css" href="..\css\style.css">
</head>
<body>

</body>
</html>