<?php 
function addJobMessage($conn,$sid,$fid) {
	$result_forward = $conn->query("select * from Forward
	                where (sid='$sid' and fid='$fid') or (sid='$fid' and fid='$sid')");

	if ($result_forward->num_rows > 0) {
	    while ($row = $result_forward->fetch_assoc()) {
	        $fsid = $row['sid'];
	        $ffid = $row['fid'];
	        $ftime = $row['ftime'];
	        $fjid = $row['jid'];

	        $sql = "INSERT INTO `FriendMessage` 
					VALUES ('$sid', '$fid', '$ftime','Job Message','$fjid');";
			$result = $conn->query($sql);
	    }
	}

	return;
}

?>