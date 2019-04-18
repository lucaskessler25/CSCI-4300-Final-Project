<!DOCTYPE html>
<?php
	session_start();
	$id = $_SESSION['id'];
	
	$pdo = new PDO(
		"mysql:host=localhost;dbname=fieldtofarm",
		'root',
		''
	);
	
	$sql = "SELECT description FROM userinfo WHERE ID = :id";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([
		'id' => $id,
	]);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<head>
	<title>Field to Farm - Signup</title>
	<meta charset="utf-8" />
</head>
<h1> EDIT PROFILE </h1>
<form action="editprofile-submit.php" method="post" enctype="multipart/form-data" id="editProf">
	<div style="margin-bottom:10px;">
		<strong>Name:</strong>
		<input type="text" name="name" maxlength="32">
	</div>
	
	<div style ="margin-bottom:10px;">
		<textarea name="description" rows="5" cols="50" maxlength="2048" form="editProf"><?php echo $row['description'] ?></textarea>
	</div>
	
	<div style="margin-bottom:10px;">
		<strong> Upload image:</strong>
		<input type="file" name="fileupload" value="fileupload" id="fileupload">
	</div>
	<input type="submit" value="Sign Up">
</form>
