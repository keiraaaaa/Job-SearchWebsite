<?php 
	include 'connectDB.php';
	session_start();
	$jid = $_POST['view'];
	$_SESSION['cid'] = $_SESSION['cid'];
	$conn = connectDB();
	echo $jid;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Jobster</title>
	<link rel="stylesheet" type="text/css" href="..\css\style.css">
</head>
<body>

<div class="profile">
	<?php 	
		$query = "select * from (select * from StudentInfo where sid in (select sid from JobApply where jid='".$jid."')) as A natural join Student";
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_assoc($result)) {
			echo "<br><i><h2>".$row["sname"]."</h2></i>";
			echo "<p>University: ".$row["suniversity"]."</p>";
			echo "<p>Degree: ".$row["sdegree"]."</p>";
			echo "<p>Major: ".$row["smajor"]."</p>";
			echo "<p>GPA: ".$row["sgpa"]."</p>";
			echo "<p>Interest and other Information: ".$row["sinfo"]."</p>";
			$r = $row['sresumeaddr'];
			echo "<a href='$r'>See Resume</a><br>";
		}
		echo "<br></br><p class='change_link'><a href='JobPosting.php' class='tosignup'>Return</a></p>";
	?>
	
</div>
</body>