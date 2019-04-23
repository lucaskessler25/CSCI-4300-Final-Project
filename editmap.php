<!DOCTYPE html>
<?php
	session_start();
	$id = $_SESSION['id'];
	
	$pdo = new PDO(
		"mysql:host=localhost;dbname=fieldtotable",
		'root',
		''
	);
	
	$sql = "SELECT * FROM markers WHERE ID = :id";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([
		'id' => $id,
	]);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<head>
	<title>Field to Table - Edit Map</title>
	<meta charset="utf-8" />
</head>
<h1> EDIT MAP INFO </h1>
<form action="editmap-submit.php" method="post" enctype="multipart/form-data" id="editProf">
	<div style="margin-bottom:10px;">
		<strong>Address:</strong>
		<input type="text" name="address" value="<?php echo $row['address'] ?>">
	</div>
	
	<div style="margin-bottom:10px;">
		<strong>City:</strong>
		<input type="text" name="city" value="<?php echo $row['city'] ?>">
	</div>

	<div style="margin-bottom:10px;">
		<strong>State:</strong>
		<input type="text" name="state" value="<?php echo $row['state'] ?>">
	</div>
	
	<div style="margin-bottom:10px;">
		<strong>Zip:</strong>
		<input type="text" name="zip" value="<?php echo $row['zip'] ?>">
	</div>
	
	<div style="margin-bottom:10px;">
		<strong>Latitude:</strong>
		<input type="text" name="lat" value="<?php echo $row['lat'] ?>">
	</div>
	
	<div style="margin-bottom:10px;">
		<strong>Longitude:</strong>
		<input type="text" name="lng" value="<?php echo $row['lng'] ?>">
	</div>
	<input type="submit" value="Submit Edit">
</form>
<p><a href=<?php echo "profile.php?search=" . $_SESSION['id']?>> Return to Profile Page </a></p>