<!DOCTYPE html>
<html>
<head>
	<title>Jobster</title>
	<link rel="stylesheet" type="text/css" href="..\css\style.css">
</head>

<?php

	@session_start();

	$cid = $_SESSION['cid'];
	$_SESSION['cid'] = $cid;

	include 'connectDB.php';
	$conn = connectDB();

?>

<body>
	<div id='company'>
		<?php 
			$query1 = "SELECT * FROM Company where cid = '".$cid."'";
			$result1 = mysqli_query($conn, $query1);
			$row = mysqli_fetch_assoc($result1);
			echo "<br><h2>Welcome back <strong><i>".$row["cname"]."</i></strong>!</h2>";
			echo "<h3><u>Headquarters</u>: ".$row["ccity"].", ".$row["cstate"]." ; <u>Industry</u>: ".$row["cindustry"]."</h3>";
		?>
	</div>

	<div id='job'>
		<form action = "View.php" method="POST">
		<table align="center" cellpadding="5" cellspacing="5">
			<tr>
				<th> Title </th>
				<th> Location </th>
				<th> Salary </th>
				<th> Description </th>
				<th> Qualification </th>
				<th> Posed Date </th>
				<th> Candidates </th>
			</tr>		
		<?php 
			$query2 = "SELECT * FROM JobInfo where cid='".$cid."' ORDER BY jpostdate DESC";
			$result2 = mysqli_query($conn, $query2);

			while($row = mysqli_fetch_assoc($result2)) {

			echo "
              <tr>
                    <td> ".$row["jtitle"]." </td>
                    <td> ".$row["jcity"].", ".$row["jstate"]." </td>
                    <td> ".$row["jsalary"]." </td>
                    <td> ".$row["jdesc"]." </td>
                    <td> ".$row["jdegree"]." in ".$row["jmajor"]." </td>
                    <td> ".$row["jpostdate"]." </td>
                    <td> <button type='submit' name='view' value='".$row["jid"]."'>View</button>  </td>                    
	          </tr>";
			} 

		if (mysqli_num_rows($result2) > 0) {
			// echo "<strong>Posted jobs.</strong>";
		}
		else {echo "<strong>No posed job.</strong>";}

		?>

		<table>
			<input type = "text" name = "cid" value = "<?php echo $cid; ?>" style = "display: none;" />
		</table>

		<input type="submit" name="add" value="Add more jobs" formaction="JobEdit.php"></input>
		<br></br><p class='change_link'><a href='Company_SignIn.php' class='tosignup'>Sign out</a></p>

	</div>

</body>