<?php 
include 'connectDB.php';
include 'friendTrigger.php';
session_start();
ob_start();
$sid = $_SESSION['sid'];

$conn = connectDB();
$row_trigger = friendTrigger($conn,$sid);
$fmt = $row_trigger['fmesTrigger'];
$fmtFrom = $row_trigger['fmesFrom'];
$frt = $row_trigger['freqTrigger'];
$frtFrom = $row_trigger['freqFrom'];
// echo $frt;
// echo $frtFrom;
$query1 = "select * from JobNotifications where sid='$sid' and ViewStstus='New' and jid not in (select jid from JobApply where sid = '$sid')";
$result1 = mysqli_query($conn, $query1) or die('Query failed: ' . mysqli_error($conn));
?>

<!DOCTYPE html>
<html>
<head>
	<title>Jobster</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div class="mainpage">
		<h1>Jobster</h1>
		<h3>Welcome to Jobster, <?php echo "$sid"."<br>"; ?></h3>
		<br>
		<?php $_SESSION['sid']   = $sid; ?>
		<form class="view1" method="post" action="viewProfile.php">
			<input type="submit" value="View Your Profile">
		</form>

		<form class="view2" method="post" action="viewFriends.php">
			<input type="submit" value="Talk To Your Friends">
			<?php  
				if($fmt == True){ echo "New :)";}
				$_SESSION['newMessageFrom'] = $fmtFrom;
			?>
		</form>

		<form class="notify1" method="post" action="friendNotifications.php">
			<input type="submit" value="Friend Notifications">
			<?php  
				if($frt == True){ echo "New :)";}
				$_SESSION['newRequestFrom'] = $frtFrom;
			?>
		</form>

		<form class="notify2" method="post" action="..\phpw\jobNotifications.php">
			<input type="submit" value="Job Notifications">
			<?php
				if (mysqli_num_rows($result1) > 0) { echo "New jobs:)";}
			?>
		</form>
		<br></br>

		<form class="search" method="post" action="..\phpw\ViewCompany.php">
			<p class="normaltext">Company
				<input id="companyname" name="companyname" required="required" type="text" >
			<input type="submit" value="Search">
			</p>
		</form>

		<form class="search" method="post" action="friendSearch.php">
			<p class="normaltext">Friends&nbsp;&nbsp;
				<input id="friendsname" name="friendsname" required="required" type="text">
			<input type="submit" value="Search">
			</p>
		</form>

		<form class="search" method="post" action="..\phpw\ViewJob.php">
			<p class="normaltext">Job&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input id="jobsname" name="jobname" required="required" type="text" >
			<input type="submit" value="Search">
			</p>
		</form>
	    	<!-- <p class="jobsearch">Job Search 
	    		<input class="jobsearch" type="text" />
	    	</p> -->
    	<p class = change_link>
    		<a href="studentLogin.php" class="tologin">Sign out</a>
    	</p>
	</div>
</body>
</html>