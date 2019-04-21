<!DOCTYPE html>

<head>
	<title>Field to Table - Profile</title>
	<meta charset="utf-8" />
</head>
<?php	
	session_start();
	$id = $_SESSION['id'];
	
	$pdo = new PDO(
		"mysql:host=localhost;dbname=fieldtotable",
		'root',
		''
	);
	
	$sql = "SELECT * FROM userinfo WHERE ID = :id";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([
		'id' => $id,
	]);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<h1> YOUR PROFILE </h1>
<p><?php echo 'name = ' . $row['name'] ?></p>
<p><?php echo 'description = ' . $row['description'] ?></p>
<p><?php echo 'image = ' . $row['piclocation'] ?></p>
<button type='button' onclick='window.location.href="editprofile.php"'>Edit Profile</button>
<p><a href="index.php">Back to front page</a></p>