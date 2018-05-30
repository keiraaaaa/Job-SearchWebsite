<?php 
	include 'connectDB.php';
	session_start();

	if (isset($_POST['sid'])) {
		$sid = $_POST['sid'];
	}
	if (isset($_SESSION['sid'])) {
		$sid = $_SESSION['sid'];
	}
	if (isset($_POST['cid'])) {
	$keyword = $_POST['cid'];
	}
	if (isset($_SESSION['keyword'])) {
		$keyword = $_SESSION['keyword'];
	}
	if (isset($_POST['companyname'])) {
		$keyword = $_POST['companyname'];
	}

	$conn = connectDB();
	echo "Hello, ".$sid;
	$query1 = "select * from Company natural join (select cid from Company where (cname LIKE '%$keyword%' or cid='$keyword') and cid not in (select cid from Follow where sid = '$sid')) as a";
    $result1 = mysqli_query($conn, $query1) or die('Query failed: ' . mysqli_error($conn));

    $query2 = "select * from Company natural join (select cid from Company where (cname LIKE '%$keyword%' or cid='$keyword') and cid in (select cid from Follow where sid='$sid')) as a";
    $result2 = mysqli_query($conn, $query2) or die('Query failed: ' . mysqli_error($conn));
?>
<form action="FollowCompany.php" method="POST">
	<?php
	    // echo "<h2>Companys you may interest</h2>";
		if (mysqli_num_rows($result1) > 0) {
			while($row1 = mysqli_fetch_assoc($result1)) {
				echo "<h2><i>".$row1["cname"]."</i></h2>";			
				echo "<p>Headquarters: ".$row1["ccity"].", ".$row1["cstate"]."</p>";
				echo "<p>Industry: ".$row1["cindustry"]."</P>";
				echo "<button type='submit' name='follow' value='".$row1["cid"]."'>Follow</button> ";
				echo "<button type='submit' name='seecompanyjobs' value='".$row1["cid"]."' formaction='ViewJob_Company.php'>Posted Jobs</button>";
			}
		}
		if (mysqli_num_rows($result2) > 0) {
			while($row2 = mysqli_fetch_assoc($result2)) {
			echo "<h2><i>".$row2["cname"]."</i></h2>";
			echo "<p>Headquarters: ".$row2["ccity"].", ".$row2["cstate"]."</p>";
			echo "<p>Industry: ".$row2["cindustry"]."</P>";
			echo "<h4>Followed</h4>";
			echo "<button type='submit' name='seecompanyjobs' value='".$row2["cid"]."' formaction='ViewJob_Company.php'>Posted Jobs</button>";
			}
		}
	    echo ""."<p class='change_link'><a href='..\php\mainPage.php' class='tosignup'>Return to the main page</a></p>";
	?>
	<table>
		<input type = "text" name = "sid" value = "<?php echo $sid; ?>" style = "display: none;" />
		<input type = "text" name = "keyword" value = "<?php echo $keyword; ?>" style = "display: none;" />

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