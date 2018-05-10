<?php 
	include 'connectDB.php';
	session_start();
	if (isset($_SESSION['sid'])) {
	$sid = $_SESSION['sid'];
	}
	if (isset($_POST['sid'])) {
	$sid = $_POST['sid'];
	}


	// $sid = $_SESSION['sid'];

	$conn = connectDB();

 	$query1 = "select * from Company natural join JobInfo natural join JobNotifications where sid='$sid' and ViewStstus='New' and jid not in (select jid from JobApply where sid = '$sid')";
    $result1 = mysqli_query($conn, $query1) or die('Query failed: ' . mysqli_error($conn));
?>


<form action="ApplyJobNo.php" method="POST">
	<?php
	    echo "<h2>New Jobs</h2>";
		if (mysqli_num_rows($result1) > 0) {
			while($row1 = mysqli_fetch_assoc($result1)) {
			echo "<h2><i>".$row1["jtitle"]."</i></h2>";
			echo "<p>Company: ".$row1["cname"]."</p>";
			echo "<p>Location: ".$row1["jcity"].", ".$row1["jstate"]."</p>";
			echo "<p>Estimate Salary: ".$row1["jsalary"]."</P>";
			echo "<p><strong>Job description: </strong></P>";
			echo "<p>".$row1["jdesc"]."</p>";
			echo "<p><strong>Qualification: </strong></P>";
			echo "<p>Desired Degree: ".$row1["jdegree"]."</P>";
			echo "<p>Desired Major: ".$row1["jmajor"]."</P>";
			echo "<button type='submit' name='apply' value='".$row1["jid"]."'>Apply</button>";
			echo "<button type='submit' name='forward' formaction='Forward.php' value='".$row1["jid"]."'>Forward</button>";
			}
		}
		else{echo "No new notifications.";}
	    echo ""."<p class='change_link'><a href='MarkViewed.php' class='tosignup'>Return to the main page</a></p>";
	?>
	<table>
		<input type = "text" name = "sid" value = "<?php echo $sid; ?>" style = "display: none;" />
	</table>

</form>




