<!DOCTYPE html>
<html>

<?php 
	$jid = $_POST['view'];

	$host="127.0.0.1";
	$user="root";
	$password="";
	$dbname="jobhunter";

	$conn = mysqli_connect($host, $user, $password, $dbname);
	if (!$conn) {die("Connection failed: " . mysqli_connect_error());}


?>

<div id='candidates'>
	<?php 
		$query = "select * from (select * from StudentInfo where sid = (select sid from JobApply where jid='".$jid."')) as A natural join Student";
		$result = mysqli_query($conn, $query);

		while($row = mysqli_fetch_assoc($result)) {
			echo "<br><i><h2>".$row["sname"]."</h2></i>";
			echo "<p>University: ".$row["suniversity"]."</p>";
			echo "<p>Degree: ".$row["sdegree"]."</p>";
			echo "<p>Major: ".$row["smajor"]."</p>";
			echo "<p>GPA: ".$row["sgpa"]."</p>";
			echo "<p>Interest and other Information: ".$row["sinfo"]."</p>";
			// echo "<button type='submit' name='resume' value='".$row["sid"]."'>See Resume</button><br>";
			$r = $row['sresumeaddr'];
			echo "<a href='$r'>See Resume</a><br>";


		}
	?>
</div>