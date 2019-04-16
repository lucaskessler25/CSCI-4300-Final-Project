<head>
	<title>Field to Farm - Signup</title>
	<meta charset="utf-8" />
</head>

<?php
    //database details
    $dbHost     = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName     = 'fieldtofarm';
    
    //create connection and select DB
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if($db->connect_error){
        die("Unable to connect database: " . $db->connect_error);
    }
	else {
		
		$sql = "SELECT * FROM users WHERE Username = " . strtolower($_POST['username']) . " LIMIT 1";
		$results = $db->query($sql);
		if(!empty($results) && $results->num_rows > 0) {
			echo "<h1> Error: Username already exists. Please try again </h1>";
			echo "<p> <a href='signup.html'> Click here to try again. </a>";
			
		} else {
			$query = $db->prepare("INSERT INTO users (ID, Username, Password) VALUES (?, ?, ?)");
			$query->bind_param("iss", $id, $username, $password);
		
			$id = NULL;
			$username = strtolower($_POST['username']);
			$password = $_POST['password'];
			$query->execute();

			echo "<h1> User has been successfully created! </h1>";
			echo "<p> Congratulations on creating a new account.
			<a href='login.html'> click here </a> to go ahead and log in. </p>";
		}
	}
?>