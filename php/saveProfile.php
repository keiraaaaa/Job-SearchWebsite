<?php 
include('connectDB.php');
include 'resumeLoad.php';
session_start();
$sid = $_SESSION["sid"];
$suniversity = $_POST['suniversity'];
$sdegree = $_POST['sdegree'];
$smajor = $_POST['smajor'];
$sgpa = $_POST['sgpa'];
$sinfo = $_POST['sinfo'];
$srestriction = $_POST['srestriction'];
$sresumeaddr = "../cv/".$_POST['sresumeaddr'];

$conn = connectDB();
//$addrPrefix = "../cv/"
//check if sid exists in studentinfo, if update, else insert
$check = $conn->query("select * from studentinfo where sid='$sid'");
if ($check->num_rows> 0) {
	$sql = "update studentinfo 
			set suniversity='$suniversity',sdegree='$sdegree', smajor='$smajor',sgpa='$sgpa',
				sinfo='$sinfo',srestriction='$srestriction',sresumeaddr='$sresumeaddr'
			where sid='$sid'";
	$result = $conn->query($sql);
} else {
	$sql = "INSERT INTO `StudentInfo` VALUES ('$sid', '$suniversity', '$sdegree','$smajor','$sgpa','$sinfo','$srestriction', '$sresumeaddr')";
	$result = $conn->query($sql);
}
//check if sid exists in resumeinfo, if update, else insert
$check_cv = $conn->query("select * from resumeinfo where sid='$sid'");
if ($check_cv->num_rows > 0) {
	$sql_cv = resumeLoad_update($sid, $sresumeaddr);
	$result_cv = $conn->query($sql_cv);
} else {
	$sql_cv = resumeLoad_insert($sid, $sresumeaddr);
	$result_cv = $conn->query($sql_cv);
}

if ($result === TRUE && $result_cv === TRUE) {
    echo "Record updated successfully";
    $_SESSION['sid']   = $sid;
    header("Location: viewProfile.php");
} else {
    echo "Error updating record: " . $conn->error;
}
?>