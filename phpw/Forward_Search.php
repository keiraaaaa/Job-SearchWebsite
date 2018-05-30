<?php 
	include 'connectDB.php';
	session_start();
	// $jid = $_POST['forward'];
	// $sid = $_POST['sid'];
	
	if (isset($_SESSION['jid'])) {
	$jid = $_SESSION['jid'];
	}
	if (isset($_POST['forward'])) {
	$jid = $_POST['forward'];
	}

	if (isset($_SESSION['sid'])) {
	$sid = $_SESSION['sid'];
	}
	if (isset($_POST['sid'])) {
	$sid = $_POST['sid'];
	}

	if (isset($_SESSION['jobname'])) {
	$jobname = $_SESSION['jobname'];
	}
	if (isset($_POST['jobname'])) {
	$jobname = $_POST['jobname'];
	}

	$conn = connectDB();
	$query1 = "select fid from Friends where sid='$sid'";

    $result1 = mysqli_query($conn, $query1) or die('Query failed: ' . mysqli_error($conn));
?>

<form action="ForwardTo_Search.php" method="POST">
	<?php
	    echo "<h2>Forward To:</h2>";
		if (mysqli_num_rows($result1) > 0) {
			while($row1 = mysqli_fetch_assoc($result1)) {
			echo "<p>".$row1["fid"]."</p>";
			echo "<button type='submit' name='forward' value='".$row1["fid"]."'>Forward</button>";
			}
		}
		else{echo "No friends need to be forwarded.";}
	    // echo ""."<p class='change_link'><a href='MarkViewed.php' class='tosignup'>Return to the main page</a></p>";
	    // echo ""."<p class='change_link'><a href='ViewJob.php' class='tosignup'>Return</a></p>";
	?>
	<table>
		<input type = "text" name = "sid" value = "<?php echo $sid; ?>" style = "display: none;" />
		<input type = "text" name = "jid" value = "<?php echo $jid; ?>" style = "display: none;" />
		<input type = "text" name = "jobname" value = "<?php echo $jobname; ?>" style = "display: none;" />
	</table>
</form>

<form action="ViewJob.php" method="POST">
	<br>
	<button type="submit" name='jobname' Value="<?php echo $jobname; ?>">Return</button>
	<table>
		<input type = "text" name = "sid" value = "<?php echo $sid; ?>" style = "display: none;" />
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

