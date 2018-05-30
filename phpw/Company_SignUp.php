<!DOCTYPE html>
<html>
<head>
	<title>Jobster</title>
	<link rel="stylesheet" type="text/css" href="..\css\style.css">
</head>
<body>


	<form action = "Company_SignIn.php" method = "POST">

	<div id="Page1">
		<center><h1>Welcome</h1></center>

		<center>
			<p>Company Name: <input type="text" name="cname" size="48" required="required"></p>
			<p>Email: <input type="text" name="cemail" size="48" required="required"></p>
			<p>City: <input type="text" name="ccity" size="48" required="required"></p>
			<p>State: <input type="text" name="cstate" size="48" required="required"></p>
			<p>Industry: <input type="text" name="cindustry" size="48" required="required"></p>
			<p>Password: <input type="Password" name="cpassword" size="48" required="required"></p>
		</center><br>
		<center>
			<input type="submit" name="button1" value="SignUp"></input>
		</center>

	</div>

<!-- 	<div id="Page2">
		<center><h1>Try To Post some jobs!</h1></center>
		
		<center>
			<p>Job Title: <input type="text" name="jtitle" size="48"></p>
			<p>City: <input type="text" name="jcity" size="48"></p>
			<p>State: <input type="text" name="jstate" size="48"></p>
			<p>Estimate Salary: <input type="text" name="jsalary" size="48"></p>
			<p>Desired Degree: <input type="text" name="jdegree" size="48"></p>
			<p>Desired Major: <input type="text" name="jmajor" size="48"></p>
			<p>Description: <input type="text" name="desc" size="48"></p>

		</center><br>

		<center>
			<button type="submit" name="button2" value="finalsubmit">Looks Good, Submit!</button>
		</center>
	</div> -->

	</form>

</body>
</html>