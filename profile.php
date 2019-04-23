<!DOCTYPE html>

<head>
	<title>Field to Table - Profile</title>
	<meta charset="utf-8" />
</head>
<?php	
	session_start();
	if(isset($_GET['search']))
		$id = $_GET['search'];
	
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
<p><?php echo $row['name'] ?></p>
<p><?php echo $row['description'] ?></p>
<p><?php echo '<img src="/Images/' . $row["piclocation"] . '" alt="Your profile picture here!">'?></p>
<?php
	if(isset($_SESSION['id']) && $_SESSION['id'] == $_GET['search'] )
		echo "<button type='button' onclick='window.location.href=\"editprofile.php\"'>Edit Profile</button>
			<button type='button' onclick='window.location.href=\"editmap.php\"'>Edit Map Information</button>"
?>
<p><a href="index.php">Back to front page</a></p>