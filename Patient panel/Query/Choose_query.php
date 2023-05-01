<?php

session_start();

$ID = $_SESSION['ID'];

?>

<!DOCTYPE html>
<html>

<head>
	<title>UMED</title>
	<link rel="stylesheet" href="../../CSS files/Patient_Choose_query.css">
</head>

<body>

	<nav style="background-color: green; padding: 25px; display: flex; justify-content: space-between;">
		<div style="display: flex; align-items: center;">
			<a href="../Patient_panel.php" style="margin: 0 auto;">Back</a>
		</div>
		<div style="display: flex; align-items: center;">
			<a href="../../Index.html" style="margin: 0 auto;">Log Out</a>
		</div>
	</nav>
	<div class="container">
		<h1 style="text-align: center;">Query Page</h1>
		<div class="buttons-container">
			<button><a href="Submit_query.php">Submit Query</a></button>
			<button><a href="Show_query.php">Show Query</a></button>
		</div>
	</div>
	
</body>

</html>