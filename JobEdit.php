<!DOCTYPE html>
<html>

<?php
	$cid = $_POST['cid'];

	$host="127.0.0.1";
	$user="root";
	$password="";
	$dbname="jobhunter";

	$conn = mysqli_connect($host, $user, $password, $dbname);
	if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

	date_default_timezone_set('America/New_York');
	$date = date('Y-m-d H:i:s');

?>

<form action="JobAdd.php" method="POST">

	<h1>Create new position now!</h1>
	<br>
	<p><strong>Job Title:</strong><input type="text" name="jtitle" size="48"></p>
	<p><strong>City:</strong><input type="text" name="jcity" size="48"></p>
	<p><strong>State:</strong><input type="text" name="jstate" size="48"></p>
	<p><strong>Estimate Salary:</strong><input type="text" name="jsalary" size="48"></p>
	<p><strong>Desired Degree:</strong><input type="text" name="jdegree" size="48"></p>
	<p><strong>Desired Major:</strong><input type="text" name="jmajor" size="48"></p>
	<p><strong>Description:</strong><input type="text" name="jdesc" size="48"></p>


	<!-- <input type="submit" value="Looks good, add this position!" name="button1"> -->
	<button type="submit" name="button1" value="add">Looks good, add this position!</button>

	<table>
		<input type = "text" name = "jpostdate" value = "<?php echo $date; ?>" style = "display: none;" />
		<input type = "text" name = "cid" value = "<?php echo $cid; ?>" style = "display: none;" />
	</table>
</form>

<!-- 	<?php
		if(isset($_POST["button1"]))
		{		 	
	     $query = "insert into JobInfo (`jid`,`cid`,`jcity`,`jstate`,`jtitle`,`jsalary`,`jdegree`,`jmajor`,`jpostdate`,`jdesc`) SELECT      CONCAT('J',             CAST(LPAD(CONVERT( SUBSTR(MAX(jid), 3) , UNSIGNED INTEGER) + 1,                         3,                         '0')                 AS CHAR (5))) AS temp_ind, '".$cid."', '".$jcity."', '".$jstate."', '".$jtitle."', '".$jsalary."', '".$jdegree."', '".$jmajor."', '".$date."', '".$jdesc."' FROM     JobInfo";
	     $result = mysqli_query($conn, $query);
		}
		mysqli_close($conn);
	?> -->

