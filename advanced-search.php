<!DOCTYPE html>
<html>
	
	<head>
		<title>Field to Table - Advanced Search</title>
	</head>

	<body>
		<div>
			<h1> Field to Table </h1>
		</div>
		
		<form action="advanced-search-submit.php" method="post">
		<fieldset>
		<legend>Please select what you are looking for:</legend>
			<input type="checkbox" name="cube" value="cube"> Cube<br>
			<input type="checkbox" name="kielbasa" value="kielbasa"> Venison Kielbasa<br>
			<input type="checkbox" name="salami" value="salami"> Venison Salami<br>
			<input type="checkbox" name="sumSausage" value="sumSausage"> Venison Summer Sausage<br>
			<input type="checkbox" name="bologna" value="bologna"> Venison Bologna<br>
			<input type="checkbox" name="slimJims" value="slimJims"> Venison Slim Jims<br>
			<input type="checkbox" name="imiBacon" value="imiBacon"> Venison Imitation Bacon<br>
			<input type="checkbox" name="jerky" value="jerky"> Venison Jerky<br>
			<input type="checkbox" name="hindQuartersWhole" value="HQW"> Venison Smoked Hind Quarters (Whole)<br>
			<input type="checkbox" name="hindQuartersSteaks" value="HQS"> Venison Smoked Hind Quarters (Steaks)<br>
			<input type="checkbox" name="hindQuartersChipped" value="HQC"> Venison Smoked Hind Quarters (Chipped)<br>
		<input type="submit" value="Submit" style="margin-top: 10px">
		</fieldset>
		</form>
		<p><a href="index.php">Back to front page</a></p>
	</body>
</html>