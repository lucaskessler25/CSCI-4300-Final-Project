<!DOCTYPE html>

<head>
	<title>Field to Farm - Signup</title>
	<meta charset="utf-8" />
</head>
<?php	
	session_start();
	$id = $_SESSION['id'];
	
	$pdo = new PDO(
		"mysql:host=localhost;dbname=fieldtofarm",
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
<h1> PROFILE </h1>
<button type='button' onclick='window.location.href="editprofile.php"'>Edit Profile</button>
<p><?php echo 'id = ' . $id ?></p>
<p><?php echo 'name = ' . $row['name'] ?></p>