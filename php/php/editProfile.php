<?php 
include 'connectDB.php';

session_start();
$sid = $_SESSION['sid'];
$suniversity = $_SESSION['suniversity'];
$sdegree = $_SESSION['sdegree'];
$smajor = $_SESSION['smajor'];
$sgpa = $_SESSION['sgpa'];
$sinfo = $_SESSION['sinfo'];
$srestriction = $_SESSION['srestriction'];
$sresumeaddr = $_SESSION['sresumeaddr'];

$conn = connectDB();

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Student Profile</title>
	<link rel="stylesheet" type="text/css" href="..\css\style.css">
</head>
<body>
    <div class="jobinfo">
		<h2>Student Profile</h2>
		<p>Login Name: <?php echo $sid ?></p>
	    <form method="post" action="saveProfile.php">
	    	<p id="suniversity">University
	    	<input id="suniversity" name="suniversity" required="required" type="text" value="<?php echo "$suniversity";?>" size="45"/>
	    	</p>
	    	<p id="sdegree">Degree
	    	<input id="sdegree" name="sdegree" required="required" type="text" value="<?php echo "$sdegree";?>" size="45"/>
	    	</p>
	    	<p>Major
	    	<input id="smajor" name="smajor" required="required" type="text" value="<?php echo "$smajor";?>" size="45"/>
	    	</p>
	    	<p id="sgpa">GPA
	    	<input id="sgpa" name="sgpa" required="required" type="text" value="<?php echo "$sgpa";?>" size="45"/>
	    	</p>
	    	<p id="sinfo">Information(Interests and Qualifications)</p>
	    	<p>
	    		<textarea id="sinfo" name="sinfo" rows="5" cols="80"><?php echo "$sinfo";?></textarea>
	    	</p>

	    	<p id="sgpa">Resume
	    	<input id="sresume" name="sresumeaddr" type="file" />
	    	</p>

	    	<p id="srestriction">If your profile is only visible to your fiends and to companies you applied.
	    	<select id="srestriction" name="srestriction">
	    		<option value="Y">Y</option>
	    		<option value="N">N</option>
	    	</select>
	    	</p>
	    	<p class="save button">
	    		<input type="submit" name="save" value="Save" />
	    	</p>
	    	<p>
	    		<a href='viewProfile.php'>Don't save, return to the Profile directly</a>
	    	</p>
	    </form>
	</div>
</body>
</html>