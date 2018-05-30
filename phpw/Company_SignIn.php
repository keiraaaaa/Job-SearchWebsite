<?php
	@session_start();

 	$s = $_SERVER['HTTP_REFERER'];
	if ($s=="http://localhost/Jobster-WebDevelop/phpw/Company_SignUp.php"){
		$cname = $_POST['cname'];
		$cemail = $_POST['cemail'];
		$ccity = $_POST['ccity'];
		$cstate = $_POST['cstate'];
		$cindustry = $_POST['cindustry'];
		$cpassword = $_POST['cpassword'];
		
		include 'connectDB.php';
		$conn = connectDB();

        if(isset($_POST['cname'])){

        	$query1 = "insert into CompanySign (`cid`, `cemail`,`cpassword`) SELECT      CONCAT('C',             CAST(LPAD(CONVERT( SUBSTR(MAX(cid), 2) , UNSIGNED INTEGER) + 1,                         2,                         '0')                 AS CHAR (5))) AS temp_ind, '".$cemail."', '".$cpassword."' FROM     CompanySign";        

        	$query2 = "insert into Company (`cid`,`cname`,`ccity`,`cstate`,`cindustry`) select max(cid), '".$cname."', '".$ccity."', '".$cstate."', '".$cindustry."' from CompanySign";

        	$result1 = mysqli_query($conn, $query1);        	
        	$result2 = mysqli_query($conn, $query2);

          }		
    mysqli_close($conn);
	}
?>	

<!DOCTYPE html>
<html>
<head>
	<title>Jobster</title>
	<link rel="stylesheet" type="text/css" href="..\css\style.css">
</head>

<body>
	<div class="container">
	<center><h1>Company</h1></center><br>
	<form action = "Security.php" method = "POST">
	<center>
		ID:       <input type="text" name="cid" placeholder="LoginID/Email" size="40" required="required">
		<br><br>
		Password: <input type="Password" name="cpassword" size="40" required="required">
	</center><br>
	<center>
		<input type="submit" name="button1" value="LogIn"></input>
		<p class="change_link">Not a member yet ?
	    		<a href="Company_SignUp.php" class="tosignup">Join us</a>
    	</p>
		<br></br><a href='..\index.html'>Return to Start Page</a>
	</center>
	</form>
	</div>


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