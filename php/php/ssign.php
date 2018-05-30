<?php 
include('connectDB.php');
session_start();
ob_start();
$sid = $_POST['sid'];
$sname = $_POST['sname'];
$spassword = $_POST['spassword'];

$conn = connectDB();

$sql = "INSERT INTO `Student` VALUES('$sid','$sname','$spassword');";
$sql0 = "INSERT INTO `StudentInfo` VALUES  ('$sid', ' ', ' ',' ',0.1,' ','N', ' ');";

if ($conn->query($sql) === TRUE && $conn->query($sql0) === TRUE) {
    echo "Record updated successfully";
    header("Location: studentLogin.php");
} else {
    echo "You need change a different username";
}
?>