<head>
	<title>Field to Farm - Signup</title>
	<meta charset="utf-8" />
</head>

<?php
	session_start();
	$pdo = new PDO(
		"mysql:host=localhost;dbname=fieldtotable",
		'root',
		''
	);
	
	$sql = "UPDATE userinfo SET description = :description, name = :name, piclocation = :piclocation WHERE ID = :id";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([
		'id' => $_SESSION['id'],
		'name' => $_POST['name'],
		'description' => $_POST['description'],
		'piclocation' => $_FILES['fileupload']['name'],
	]);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	$fileToMove = $_FILES['fileupload']['tmp_name'];
	$destination = "./Images/" . $_FILES['fileupload']['name'];
	move_uploaded_file($fileToMove, $destination);
	
	echo '<h1> Profile updated! </h1>';
	echo "<p> Congratulations on updating your profile information.
		<a href='profile.php'> click here </a> to go ahead and see your changes. </p>";	
?>