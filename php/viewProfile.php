<?php 

include 'connectDB.php';

session_start();
$sid = $_SESSION['sid'];


$conn = connectDB();
$sql = "select * from StudentInfo where sid = '$sid'";
$result = $conn->query($sql);

if ($result->num_rows > 0 ) {
	$row = $result->fetch_assoc();
	$suniversity = $row['suniversity'];
	$sdegree = $row['sdegree'];
	$smajor = $row['smajor'];
	$sgpa = $row['sgpa'];
	$sinfo = $row['sinfo'];
	$srestriction = $row['srestriction'];
	$sresumeaddr = $row['sresumeaddr'];

	$_SESSION['suniversity']   = $suniversity;
	$_SESSION['sdegree']   = $sdegree;
	$_SESSION['smajor']   = $smajor;
	$_SESSION['sgpa']   = $sgpa;
	$_SESSION['sinfo']   = $sinfo;
	$_SESSION['srestriction']   = $srestriction;
	$_SESSION['sresumeaddr']   = $sresumeaddr;
} else {
	echo "You need to create your profile";
	$suniversity = " ";
	$sdegree = " ";
	$smajor = " ";
	$sgpa = " ";
	$sinfo = " ";
	$srestriction = " ";
	$sresumeaddr = " ";

	$_SESSION['suniversity']   = $suniversity;
	$_SESSION['sdegree']   = $sdegree;
	$_SESSION['smajor']   = $smajor;
	$_SESSION['sgpa']   = $sgpa;
	$_SESSION['sinfo']   = $sinfo;
	$_SESSION['srestriction']   = $srestriction;
	$_SESSION['sresumeaddr']   = $sresumeaddr;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Profile</title>
	<link rel="stylesheet" type="text/css" href="..\css\style.css">
</head>
<body>
    <div class="profile">
		<h1>Profile</h1>
		<p>User Name: <?php echo $sid ?></p>
		<a href="appliedJob.php" class="tosignup">Applied Job</a>&nbsp;&nbsp;
		<a href="followedCompany.php" class="tosignup">Followed Company</a>

		<form method="post" action="editProfile.php">
			<ul>
				<li>Your University: <?php echo $suniversity ?></li><br>
				<li>Your Degree: <?php echo $sdegree ?></li><br>
				<li>Your Major: <?php echo $smajor ?></li><br>
				<li>Your GPA: <?php echo $sgpa ?></li><br>
				<li>Your Information: <?php echo $sinfo ?></li><br>
				<li>Your Restriction: <?php echo $srestriction ?></li><br>
				<li>Your Resume: <a href="<?php echo($sresumeaddr) ?>">Your Resume</a></li><br>
			</ul>
			<input type="submit" value="Edit">

			<p class="change_link">
	    		<a href="mainPage.php" class="tosignup">Return to the main page</a>
	    	</p>
		</form>
	</div>



</body>
</html>


