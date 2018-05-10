<?php 
include 'connectDB.php';
include 'friendTrigger.php';
session_start();
$sid = $_SESSION['sid'];
echo "Hello, "."$sid"."<br>";
$conn = connectDB();
$row_trigger = friendTrigger($conn,$sid);
$fmt = $row_trigger['fmesTrigger'];
$fmtFrom = $row_trigger['fmesFrom'];
$frt = $row_trigger['freqTrigger'];
$frtFrom = $row_trigger['freqFrom'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Jobster</title>
</head>
<body>
	<div class="MainPage">
		<h1>Job Search</h1>

		<?php $_SESSION['sid']   = $sid; ?>
		<form method="post" action="viewProfile.php">
			<input type="submit" value="View Your Profile">
		</form>

		<form method="post" action="viewFriends.php">
			<input type="submit" value="Talk To Your Friends">
			<?php  
				if($fmt == True){ echo "You have a new message:)";}
				$_SESSION['newMessageFrom'] = $fmtFrom;
			?>
		</form>

		<form method="post" action="friendSearch.php">
			<p>Search Friends
				<input id="friendsname" name="friendsname" required="required" type="text" placeholder="friends&nbsp;username">
			<input type="submit" value="Search Friends">
			</p>
		</form>


		<form method="post" action="friendNotifications.php">
			<input type="submit" value="Friend Notifications">
			<?php  
				if($frt == True){ echo "You have a new Request:)";}
				$_SESSION['newRequestFrom'] = $frtFrom;
			?>
		</form>

		<form method="post" action="ViewJob.php">
			<p>Search Job
				<input id="jobsname" name="jobname" required="required" type="text" placeholder="Job&nbsp;keyword">
			<input type="submit" value="Search Job">
			</p>
		</form>
		<form method="post" action="JobNotifications.php">
			<input type="submit" value="Job Notifications">
		</form>
		<form method="post" action="ViewCompany.php">
			<p>Search Company
				<input id="companyname" name="companyname" required="required" type="text" placeholder="Company&nbsp;Name">
			<input type="submit" value="Search Company">
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