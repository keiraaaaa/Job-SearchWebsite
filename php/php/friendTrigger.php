<?php
function friendTrigger($conn, $sid) {
	$result = $conn->query("select * from FriendTrigger where sid='$sid'");
	if ($result->num_rows == 0) {
		$ans = $conn->query("INSERT INTO `FriendTrigger` VALUES ('$sid', False, '', False, '')");
	} 
	$r_fm = $conn->query("drop trigger if exists fmTrigger") or die(mysqli_error());
	$result_fm = $conn->query(" create trigger fmTrigger after insert on friendMessage 
			   					for each row begin
			   					if(new.fid='$sid') then
							   	update FriendTrigger set fmesTrigger=True,fmesFrom=new.sid where sid='$sid';
							   	end if;
							   	end;");
	$r_fr = $conn->query("drop trigger if exists frTrigger") or die(mysqli_error());
	$result_fr = $conn->query("	create trigger frTrigger after insert on friendRequest 
			    			   	for each row begin
			   				   	if(new.rid='$sid') then
			   					update FriendTrigger set freqTrigger=True,freqFrom=new.sid where sid='$sid';
			   					end if;
			   					end;") or die(mysqli_error());
	$result_trigger = $conn->query("select * from friendTrigger where sid='$sid'");
	$row_trigger = $result_trigger->fetch_assoc();
	return $row_trigger;
}
?>