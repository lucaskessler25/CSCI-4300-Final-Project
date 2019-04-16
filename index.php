<!DOCTYPE html>

<header>
<title>Field to Table</title>
</header>

<?php
	session_start();
	if(isset($_SESSION['id'])) {
		$pdo = new PDO(
			"mysql:host=localhost;dbname=fieldtofarm",
			'root',
			''
		);
		
		$sql = "SELECT Username FROM users WHERE ID = :id";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([
			'id' => $_SESSION['id'],
		]);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		echo "<h1>Welcome, " . $row['Username'] . "!</h1>
		<button type='button' onclick='window.location.href=\"logout.php\"'>Log out</button>";
	} else {
		echo '<h1>Welcome to Field to Table!</h1>
			<p>New User? <a href="signup.php">Sign up.</a> </p>
			<p>Returning User? <a href="login.php">Log in.</a> </p>';
	}
?>
