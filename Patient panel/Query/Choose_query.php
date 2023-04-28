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
	<button class="back" onclick="window.location.href='../Patient_panel.php'">Back</button>
	<div class="container">
		<h1>Query Page</h1>
		<div class="buttons-container">
			<button><a href="Submit_query.php">Submit Query</a></button>
			<button><a href="Show_query.php">Show Query</a></button>
		</div>
	</div>
</body>

</html>