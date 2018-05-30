<?php 
	include 'connectDB.php';
	session_start();
	$jid = $_POST['jid'];
	$sid = $_POST['sid'];
	$fid = $_POST['forward'];

	$conn = connectDB();

	$now = new DateTime(null, new DateTimeZone('America/New_York'));
	$currdate = $now->format('Y-m-d H:i:s');

	$query = "insert into `FriendMessage` values ('$sid','$fid','$currdate','JobInfo','$jid');";
    $result = mysqli_query($conn, $query) or die('Query failed: ' . mysqli_error($conn));


	if ($result === TRUE) {
		$_SESSION['sid'] = $sid;
		$_SESSION['jid'] = $jid; 
		header("Location: Forward.php");
	}
	else {
		echo "Error updating record: " . $conn->error;
	}

	// $query1 = "select * from JobInfo where jid = 'jid'";
 //    $result1 = mysqli_query($conn, $query1) or die('Query failed: ' . mysqli_error($conn));

	// $query2 = "select sid from (select sid from JobApply where jid='$jid') as a, (select sid from JobNotifications where jid = '$jid') as b where sid='$fid'";
 //    $result2 = mysqli_query($conn, $query2) or die('Query failed: ' . mysqli_error($conn));
 ?>

 <!-- <form action="ApplyJobFo.php" method="POST"> -->
<!-- 	<?php
		if (mysqli_num_rows($result2) > 0) {
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
				echo "This job you already applied.";}
			}
		else{
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

		}

	 ?> -->