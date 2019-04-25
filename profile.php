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
	
	$sql = "SELECT * FROM markers WHERE ID = :id";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([
		'id' => $id,
	]);
	$row2 = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<h1> PROFILE </h1>
<p><b>Name:</b> <?php echo $row['name'] ?></p>
<p><b>Description:</b> <?php echo $row['description'] ?></p>
<p><?php echo '<img src="/Images/' . $row["piclocation"] . '" alt="Your profile picture here!">'?></p>
<h2>Location Information</h2>
<p><b>Address:</b> <?php echo $row2['address'] ?></p>
<p><b>City:</b> <?php echo $row2['city'] ?></p>
<p><b>State:</b> <?php echo $row2['state'] ?></p>
<p><b>Zip:</b> <?php echo $row2['zip'] ?></p>
<?php
	if(isset($_SESSION['id']) && $_SESSION['id'] == $_GET['search'] )
		echo "<button type='button' onclick='window.location.href=\"editprofile.php\"'>Edit Profile</button>
			<button type='button' onclick='window.location.href=\"editmap.php\"'>Edit Map Information</button>"
?>
<p><a href="index.php">To the front page</a></p>
<p><a href="displaymap.php">To the map</a></p>