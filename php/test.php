<?php
include 'connectDB.php';

// session_start();
// $sid = $_SESSION['sid'];
// echo "Hello, ".$sid;
// $jid = $_POST['job'];
// echo "Job, ".$jid;

$conn = connectDB();
$sid= 'S005';

echo $sid;

$result = $conn->query("select * from FriendTrigger where sid='$sid'") or die(mysqli_error());
if ($result->num_rows == 0) {
	$ans = $conn->query("INSERT INTO `FriendTrigger` VALUES ('$sid', False, '', False, '')") or die(mysqli_error());
} 
// $result_fm = $conn->query("drop trigger if exists fmTrigger;
// 							delimiter $$
// 							create trigger fmTrigger after insert on friendMessage 
// 		   					for each row begin
// 		   					if(new.fid='$sid') then
// 						   	update FriendTrigger set fmesTrigger=True,fmesFrom=new.sid where sid='$sid';
// 						   	end if;
// 						   	end$$");
$r_fr = $conn->query("drop trigger if exists frTrigger") or die(mysqli_error());
$result_fr = $conn->query("	create trigger frTrigger after insert on friendRequest 
		    			   	for each row begin
		   				   	if(new.rid='$sid') then
		   					update FriendTrigger set freqTrigger=True,freqFrom=new.sid where sid='$sid';
		   					end if;
		   					end;") or die(mysqli_error());
// $result_trigger = $conn->query("select * from friendTrigger where sid='$sid'");
// $row_trigger = $result_trigger->fetch_assoc();


?>