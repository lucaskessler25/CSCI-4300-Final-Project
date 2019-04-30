<?php
	session_start();
	unset($_SESSION['id']);
?>
<!DOCTYPE html>
<html>
<style>
* {
	box-sizing: border-box;
	font-family: Arial;
}

input[type=text], input[type=password] {
	width: 100%;
	padding: 15px;
	margin: 5px 0 22px 0;
	display: inline-block;
	border: none;
	background: #f1f1f1;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity:1;
}

.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

.container {
  padding: 16px;
}

.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
</style>
<body>
<form action="login-submit.php" style="border:1px solid #ccc" method="post">
  <div class="container">
    <h1>Log In</h1>

    <label for="username"><b>Name:</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="password"><b>Password:</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <div class="clearfix">
      <button type="button" onclick="window.location.href ='index.php'" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Log in</button>
    </div>
  </div>
</form>

</body>
</html>