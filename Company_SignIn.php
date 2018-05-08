<!DOCTYPE html>
<html>
<body>

<?php
@session_start();
?>


<?php

 	$s = $_SERVER['HTTP_REFERER'];
	if ($s=="http://localhost/project/Company_SignUp.php"){
		$cname = $_POST['cname'];
		$cemail = $_POST['cemail'];
		$ccity = $_POST['ccity'];
		$cstate = $_POST['cstate'];
		$cindustry = $_POST['cindustry'];
		$cpassword = $_POST['cpassword'];
		
		$host="127.0.0.1";
		$user="root";
		$password="";
		$dbname="jobhunter";

		$conn = mysqli_connect($host, $user, $password, $dbname);
		if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

        if(isset($_POST['cname'])){

        	$query1 = "insert into CompanySign (`cid`, `cemail`,`cpassword`) SELECT      CONCAT('C',             CAST(LPAD(CONVERT( SUBSTR(MAX(cid), 2) , UNSIGNED INTEGER) + 1,                         2,                         '0')                 AS CHAR (5))) AS temp_ind, '".$cemail."', '".$cpassword."' FROM     CompanySign";        

        	$query2 = "insert into Company (`cid`,`cname`,`ccity`,`cstate`,`cindustry`) select max(cid), '".$cname."', '".$ccity."', '".$cstate."', '".$cindustry."' from CompanySign";

        	$result1 = mysqli_query($conn, $query1);        	
        	$result2 = mysqli_query($conn, $query2);

          }		
    mysqli_close($conn);
	}
?>	


	<center><h1>Company</h1></center><br>
	<form action = "Security.php" method = "POST">
	<center>
		ID: <input type="text" name="cid" placeholder="LoginID/Email" size="48">
		<br><br>
		Password: <input type="text" name="cpassword" size="48">
	</center><br>
	<center>
		<button type="submit" name="button1" value="SignIn">Sign in</button>
		<button type="submit" name="button2" value="SignUp" formaction="Company_SignUp.php">Sign up</button>
	</center>
	</form>


	<?php 
		if(isset($_SESSION['message'])){
		   echo $_SESSION['message'];
		   $_SESSION['message'] = null;
		   unset($_SESSION['message']);
		   session_write_close();
		}
	?>


</body>
</html>