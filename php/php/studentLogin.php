<!DOCTYPE html>
<html>
<head>
	<title>Jobster</title>
	<link rel="stylesheet" type="text/css" href="..\css\style.css">
	<!-- <link rel="stylesheet" type="text/css" href="../css/styleLogSign.css"> -->
</head>
<body>
    <div class="container">
		<h1>Student</h1>
	    <form method="post" action="slog.php">
	    	<p>Your username
	    		<input id="username" name="username" required="required" type="text" placeholder="username" />
	    	</p>
	    	<p>Your password
	    		<input id="password" name="password" required="required" type="password" placeholder="ll123" />
	    	</p>
	    	<p>
	    		<input class="logbutton" type="submit" name="login" value="Login" />
	    	</p>
	    	<p class="change_link">Not a member yet ?
	    		<a href="studentSignup.php" class="tosignup">Join us</a>
	    	</p>
	    </form>
	    <br></br><a href='..\index.html'>Return to Start Page</a>
	</div>


</body>
</html>