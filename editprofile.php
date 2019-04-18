<!DOCTYPE html>

<head>
	<title>Field to Farm - Signup</title>
	<meta charset="utf-8" />
</head>
<h1> EDIT PROFILE </h1>
<form action="editprofile-submit.php" method="post" enctype="multipart/form-data">
	<fieldset>
		<legend>Edit Profile:</legend>
			<div style="margin-bottom:10px;">
				<strong>Name:</strong>
				<input type="text" name="name" maxlength="16">
			</div>
			
			<div style="margin-bottom:10px;">
				<strong>Age:</strong>
				<input type="textarea" name="age" maxlength="2048">
			</div>
			
			<div style="margin-bottom:10px;">
				<strong>Personality type:</strong>
				<input type="text" name="pType" maxlength="4">
			</div>
			
			<div style="margin-bottom:10px;">
				<strong> Upload image:</strong>
				<input type="file" name="fileupload" value="fileupload" id="fileupload">
			</div>
		<input type="submit" value="Sign Up">
	</fieldset>
</form>