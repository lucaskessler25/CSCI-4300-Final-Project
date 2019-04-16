<head>
	<title>Field to Farm - Signup</title>
	<meta charset="utf-8" />
</head>

<?php
    //database details
	$pdo = new PDO(
		"mysql:host=localhost;dbname=fieldtofarm",
		'root',
		''
	);
	
	$sql = "SELECT COUNT(*) AS num FROM users WHERE Username = :username";
	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(':username',strtolower($_POST['username']));
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($row['num'] > 0) {
		echo "<h1> Error: Username already exists. Please try again </h1>";
		echo "<p> <a href='signup.html'> Click here to try again. </a>";
	} else {
		$sql = "INSERT INTO users (ID, Username, Password) VALUES (:id, :username, :password)";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([
			'id' => NULL,
			'username' => $_POST['username'],
			'password' => $_POST['password'],
		]);

		echo "<h1> User has been successfully created! </h1>";
		echo "<p> Congratulations on creating a new account.
		<a href='login.html'> click here </a> to go ahead and log in. </p>";		
	}		
?>