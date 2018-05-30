<?php  
include 'connectDB.php';

$fid = $_POST['fid'];
session_start();

$conn = connectDB();
$result = $conn->query("select * from studentInfo natural join student 
						where studentInfo.sid=student.sid
						and studentInfo.sid='$fid'");
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		echo "<div class='profile'>";
		echo "<br><i><h2>".$row["sname"]."</h2></i>";
		echo "<p>University: ".$row["suniversity"]."</p>";
		echo "<p>Degree: ".$row["sdegree"]."</p>";
		echo "<p>Major: ".$row["smajor"]."</p>";
		echo "<p>GPA: ".$row["sgpa"]."</p>";
		echo "<p>Interest and other Information: ".$row["sinfo"]."</p>";
		$r = $row['sresumeaddr'];
		echo "<a href='$r'>See Resume</a><br>";
		echo "</br>";
	}
} else {
	echo "No Profile";
}
echo "<br></br><p class='change_link'><a href='mainPage.php'>Return to Main Page</a></p>";


?>

<!DOCTYPE html>
<html>
<head>
	<title>Friend Profile</title>
	<link rel="stylesheet" type="text/css" href="..\css\style.css">
</head>
<body>

</body>
</html>