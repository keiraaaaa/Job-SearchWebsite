<?php
// Note the space before "<?php"
@session_start();
?>

<!DOCTYPE html>
<html>

<?php

	$jtitle = $_POST['jtitle'];
	$jcity = $_POST['jcity'];
	$jstate = $_POST['jstate'];
	$jsalary = $_POST['jsalary'];
	$jdegree = $_POST['jdegree'];
	$jmajor = $_POST['jmajor'];
	$jdesc = $_POST['jdesc'];
	$cid = $_POST['cid'];
	$jpostdate = $_POST['jpostdate'];

	include 'connectDB.php';
	$conn = connectDB();
		 	
    $query1 = "insert into JobInfo (`jid`,`cid`,`jcity`,`jstate`,`jtitle`,`jsalary`,`jdegree`,`jmajor`,`jpostdate`,`jdesc`) SELECT      CONCAT('J',             CAST(LPAD(CONVERT( SUBSTR(MAX(jid), 3) , UNSIGNED INTEGER) + 1,                         3,                         '0')                 AS CHAR (5))) AS temp_ind, '".$cid."', '".$jcity."', '".$jstate."', '".$jtitle."', '".$jsalary."', '".$jdegree."', '".$jmajor."', '".$jpostdate."', '".$jdesc."' FROM     JobInfo";
    $result1 = mysqli_query($conn, $query1) or die('Query failed: ' . mysqli_error($conn));

    $query2 = "select max(jid) as jid from Jobinfo";
    $result2 = mysqli_query($conn, $query2) or die('Query failed: ' . mysqli_error($conn));
    $row = mysqli_fetch_assoc($result2);
    $jid = $row["jid"];

    $query3 = "insert into JobNotifications (`sid`,`jid`,`cid`,`NotifyDate`,`ViewStstus`) select c.sid, '".$jid."', '".$cid."', '".$jpostdate."', 'New' from (select sid from Follow where cid = '".$cid."' union select b.sid from  (select jid, jdegree, jmajor, jdesc from JobInfo where jid = '".$jid."') as a, (select sid, sdegree, smajor, sinfo from StudentInfo) as b where ((jdegree=sdegree) OR (jdegree='BS' and sdegree='MS')) and (jmajor = smajor or jmajor='Any')) as c";
    $result3 = mysqli_query($conn, $query3) or die('Query failed: ' . mysqli_error($conn));


?>
<script type="text/javascript">location.href = 'JobPosting.php';</script>

