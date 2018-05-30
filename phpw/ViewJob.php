<?php 
	include 'connectDB.php';
	session_start();

	if 	(isset($_POST['sid'])) {
	$sid = $_POST['sid'];
	}
	if (isset($_SESSION['sid'])) {
	$sid = $_SESSION['sid'];
	}

 	if (isset($_POST['job'])) {
	$keyword = $_POST['job'];
	}
	if (isset($_SESSION['jobname'])) {
	$keyword = $_SESSION['jobname'];
	}
 	if (isset($_POST['jobname'])) {
	$keyword = $_POST['jobname'];
	}

	echo "Hello, ".$sid;
	$conn = connectDB();
	
 	$query1 = "select * from Company natural join JobInfo where (cname LIKE '%$keyword%' or jtitle LIKE '%$keyword%' or jdesc LIKE '%$keyword%' or jid LIKE '%$keyword%') and jid not in (select jid from JobApply where sid = '$sid')";
    $result1 = mysqli_query($conn, $query1) or die('Query failed: ' . mysqli_error($conn));

    $query2 = "select * from Company natural join JobInfo where (cname LIKE '%$keyword%' or jtitle LIKE '%$keyword%' or jdesc LIKE '%$keyword%' or jid LIKE '%$keyword%') and jid in (select jid from JobApply where sid = '$sid')";
    $result2 = mysqli_query($conn, $query2) or die('Query failed: ' . mysqli_error($conn));
?>
<form class="jobinfo" action="ApplyJob.php" method="POST">
	<?php
	    // echo "<h2>Jobs you may interest</h2>";
		if (mysqli_num_rows($result1) > 0) {
			while($row1 = mysqli_fetch_assoc($result1)) {
			echo "<h2><i>".$row1["jtitle"]."</i></h2>";
			echo "<p>Company: ".$row1["cname"]."</p>";
			echo "<p>Location: ".$row1["jcity"].", ".$row1["jstate"]."</p>";
			echo "<p>Estimate Salary: ".$row1["jsalary"]."</p>";
			echo "<p><strong>Qualification: </strong></P>";
			echo "<p>Desired Degree: ".$row1["jdegree"]."</P>";
			echo "<p>Desired Major: ".$row1["jmajor"]."</P>";
			echo "<p><strong>Job description: </strong>".$row1["jdesc"]."</p>";
			echo "<button type='submit' name='apply' value='".$row1["jid"]."'>Apply</button>"." ";
			echo "<button type='submit' name='forward' formaction='Forward_Search.php' value='".$row1["jid"]."'>Forward</button>";
			}
		}
		if (mysqli_num_rows($result2) > 0) {
			while($row2 = mysqli_fetch_assoc($result2)) {
			echo "<h2><i>".$row2["jtitle"]."</i></h2>";
			echo "<p>Company: ".$row2["cname"]."</p>";
			echo "<p>Location: ".$row2["jcity"].", ".$row2["jstate"]."</p>";
			echo "<p>Estimate Salary: ".$row2["jsalary"]."</P>";
			echo "<p><strong>Job description: </strong></P>";
			echo "<p>".$row2["jdesc"]."</p>";
			echo "<p><strong>Qualification: </strong></P>";
			echo "<p>Desired Degree: ".$row2["jdegree"]."</P>";
			echo "<p>Desired Major: ".$row2["jmajor"]."</P>";
			echo "<h4>Applied</h4>";
			echo "<button type='submit' name='forward' formaction='Forward_Search.php' value='".$row2["jid"]."'>Forward</button>";
			}
		}
	    echo ""."<p class='change_link'><a href='../php/mainPage.php' class='tosignup'>Return to the main page</a></p>";
	?>
	<table>
		<input type = "text" name = "sid" value = "<?php echo $sid; ?>" style = "display: none;" />
		<input type = "text" name = "jobname" value = "<?php echo $keyword; ?>" style = "display: none;" />
	</table>

</form>

<!DOCTYPE html>
<html>
<head>
    <title>Jobster</title>
    <link rel="stylesheet" type="text/css" href="..\css\style.css">
</head>
<body>

</body>
</html>