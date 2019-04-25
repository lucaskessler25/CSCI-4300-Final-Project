<!DOCTYPE html>

<head>
	<title>Field to Table - Main Page</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<?php
	session_start();
	if(isset($_SESSION['id'])) {
		$pdo = new PDO(
			"mysql:host=localhost;dbname=fieldtotable",
			'root',
			''
		);
		
		$sql = "SELECT Username FROM users WHERE ID = :id";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([
			'id' => $_SESSION['id'],
		]);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<?php
		echo '<h1>Welcome, ' . $row['Username'] . '!</h1>';
	} else {
		echo '<h1>Welcome to Field to Table!</h1>';
	}
?>
		<form class="example" action="search.php">
			<input type="text" placeholder="Search.." name="search">
			<button type="submit"><i class="fa fa-search"></i></button>
		</form>
		<p><a href="advanced-search.php">Advanced search</a></p>
		<p><a href="displaymap.php">Check out the map!</a></p>

<?php
	if(isset($_SESSION['id'])) {
		echo '<button type=\'button\' onclick=\'window.location.href="logout.php"\'>Log out</button>
			<button type=\'button\' onclick=\'window.location.href="profile.php?search=' . $_SESSION['id'] . '"\'>View Profile</button>';
	} else {
		echo '<p>New User? <a href="signup.php">Sign up.</a> </p>
		<p>Returning User? <a href="login.php">Log in.</a> </p>';
	}
?>
