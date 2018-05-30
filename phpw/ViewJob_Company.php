<?php 
	include 'connectDB.php';
	session_start();

	if (isset($_SESSION['sid'])) {
	$sid = $_SESSION['sid'];
	}
	if 	(isset($_POST['sid'])) {
	$sid = $_POST['sid'];
	}

	if (isset($_SESSION['cid'])) {
	$cid = $_SESSION['cid'];
	}
	if 	(isset($_POST['seecompanyjobs'])) {
	$cid = $_POST['seecompanyjobs'];
	}

	if (isset($_SESSION['keyword'])) {
	$keyword = $_SESSION['keyword'];
	}
 	if (isset($_POST['keyword'])) {
	$keyword = $_POST['keyword'];
	}
	$conn = connectDB();
	echo "Hello, ".$sid;

 	$query1 = "select * from Company natural join JobInfo where cid='$cid' and jid not in (select jid from JobApply where sid = '$sid')";
    $result1 = mysqli_query($conn, $query1) or die('Query failed: ' . mysqli_error($conn));

    $query2 = "select * from Company natural join JobInfo where cid='$cid' and jid in (select jid from JobApply where sid = '$sid')";
    $result2 = mysqli_query($conn, $query2) or die('Query failed: ' . mysqli_error($conn));
?>





<!DOCTYPE html>
<html>
<head>
    <title>Jobster</title>
    <link rel="stylesheet" type="text/css" href="..\css\style.css">
</head>
<body>
	<div class='jobinfo'>
	<form action="ApplyJobCo.php" method="POST">
		<?php
		    // echo "<h2>Jobs you may interest</h2>";
			if (mysqli_num_rows($result1) > 0) {
				while($row1 = mysqli_fetch_assoc($result1)) {
				// echo "<div class='jobinfo'>";
				echo "<h2><i>".$row1["jtitle"]."</i></h2>";
				echo "<p>Company: ".$row1["cname"]."</p>";
				echo "<p>Location: ".$row1["jcity"].", ".$row1["jstate"]."</p>";
				echo "<p>Estimate Salary: ".$row1["jsalary"]."</P>";
				echo "<p><strong>Job description: </strong></P>";
				echo "<p>".$row1["jdesc"]."</p>";
				echo "<p><strong>Qualification: </strong></P>";
				echo "<p>Desired Degree: ".$row1["jdegree"]."</P>";
				echo "<p>Desired Major: ".$row1["jmajor"]."</P>";
				echo "<button type='submit' name='apply' value='".$row1["jid"]."'>Apply</button> ";
				echo "<button type='submit' name='forward' formaction='Forward_Company.php' value='".$row1["jid"]."'>Forward</button>";
				}
				// echo "</div><br>";
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
				echo "<button type='submit' name='forward' formaction='Forward_Company.php' value='".$row2["jid"]."'>Forward</button>";
				}
			}
		    // echo ""."<p class='change_link'><a href='ViewCompany.php' class='tosignup'>Return</a></p>";

		?>
		<table>
			<input type = "text" name = "sid" value = "<?php echo $sid; ?>" style = "display: none;" />
			<input type = "text" name = "keyword" value = "<?php echo $keyword; ?>" style = "display: none;" />
			<input type = "text" name = "cid" value = "<?php echo $cid; ?>" style = "display: none;" />
		</table>
	</form>
	<form action="ViewCompany.php" method="POST">
		<br>
		<button type="submit" name="companyname" Value="<?php echo $keyword; ?>">Return to the main page.</button>	
		<table>
			<input type = "text" name = "sid" value = "<?php echo $sid; ?>" style = "display: none;" />
		</table>
	</form>
	</div>

</body>
</html>