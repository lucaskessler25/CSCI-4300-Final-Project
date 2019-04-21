<?php
	session_start();
	unset($_SESSION['id']);
?>
<!DOCTYPE html>
<html>

	<!-- shared page top HTML -->
	
	<head>
		<title>Field to Table - Signup</title>
	</head>

	<body>
		<div>
			<h1> Field to Table </h1>
		</div>
		
		<!-- your HTML output follows -->
		
		<form action="login-submit.php" method="post">
		<fieldset>
		<legend>Sign in:</legend>
			<div style="margin-bottom:10px;">
				<strong>User name:</strong>
				<input type="text" name="username" maxlength="16">
			</div>
			
			<div style="margin-bottom: 10px;">
				<strong>User password:</strong>
				<input type ="password" name="password" maxlength="32">
			</div>
		<input type="submit" value="Sign Up">
		</fieldset>
		</form>

		<p>Not already signed up? <a href="signup.php">Sign up.</a></p>
		<p><a href="index.php">Back to front page</a></p>
		
	</body>
</html>