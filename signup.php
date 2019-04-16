<!DOCTYPE html>
<html>
	
	<head>
		<title>Field to Farm - Signup</title>
	</head>

	<body>
		<div>
			<h1> Field to Farm </h1>
		</div>
		
		<form action="signup-submit.php" method="post">
		<fieldset>
		<legend>New User Signup:</legend>
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

		<p>Already signed up? <a href="login.php">Log in.</a></p>
		<p><a href="index.php">Back to front page</a></p>
	</body>
</html>