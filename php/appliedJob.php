<?php  
include 'connectDB.php';
session_start();
$sid = $_SESSION['sid'];
echo "<br>Hello, ".$sid."</br>";

$conn = connectDB();
$result = $conn->query("select jid from JobApply where sid='$sid'");
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$jid = $row['jid'];
		echo "<br>JOB: ".$jid."</br>";
		echo "<form method='post' action='..\phpw\ViewJob.php'>";
        echo "<input type='hidden' name = 'job' value='$jid'>".
            "<input class='joblink' type='submit' value='Job Information'>"."</form>";
	}
} else{
	echo "No applied Job";
}

echo "<br></br>"."<a href='viewProfile.php'>Return to Your Profile</a>";
?>




<!DOCTYPE html>
<html>
<head>
	<title>Job List</title>
	<link rel="stylesheet" type="text/css" href="..\css\style.css">
</head>
<body>

</body>
</html>