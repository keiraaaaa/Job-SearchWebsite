<!DOCTYPE html>
<html>
<head>
	<title>Student Sign Up</title>
	<link rel="stylesheet" type="text/css" href="..\css\style.css">
</head>
<body>
    <div class="container">
		<h1>Student</h1>
	    <form method="post" action="ssign.php">
	    	<p>
	    		Your name
	    		<input id="sname" name="sname" required="required" type="text" placeholder="Firstname&nbsp;Lastname" />
	    	</p>
	    	<p>
	    		Your username
	    		<input id="sid" name="sid" required="required" type="text" placeholder="username" />
	    	</p>
	    	<p>
	    		Your password
	    		<input id="spassword" name="spassword" required="required" type="password" placeholder="ll123" />
	    	</p>
	    	<p class="signup button">
	    		<input type="submit" name="signup" value="Sign Up" />
	    	</p>
	    	<p class="change_link">Already a member ?
	    		<a href="studentLogin.php" class="tologin">Go and log in</a>
	    	</p>
	    </form>
	</div>


</body>
</html>