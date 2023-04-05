<!DOCTYPE html>
<html>

<head>
	<title>UMED</title>
	<link rel="stylesheet" href="CSS files/Log_in.css">
</head>

<body>
	<div class="container">

		<h1>UMED</h1>
		<form action="Log_in.php" method="post">
			
			<label for="ID">ID:</label>
			<input type="text" id="ID" name="ID" required>

			<label for="password">Password:</label>
			<input type="password" id="password" name="password" required>

			<input type="submit" value="Log in">
		</form>
		<div class="form-link">
			New user? <a href="Sign_up.php">Sign up here</a>

		</div>
	</div>
</body>

</html>