<?php

session_start();

$ID = $_SESSION['ID'];

?>

<!DOCTYPE html>
<html>

<head>
	<title>UMED</title>
	<style>
		a {
			text-decoration: none;
			color: #ffffff;
		}

		body {
			font-family: 'Times New Roman';
			background-color: #ffffff;
		}

		.container {
			margin: auto;
			width: 50%;
			border: 1px solid #ccc;
			background-color: #fff;
			padding: 20px;
			box-shadow: 0px 0px 10px #ccc;
		}

		h1 {
			text-align: center;
			margin-bottom: 30px;
		}

		.buttons-container {
			display: flex;
			flex-direction: row;
			justify-content: center;
			align-items: center;
			margin-top: 50px;
		}

		.buttons-container button {
			margin: 10px;
			padding: 10px 20px;
			border: none;
			border-radius: 4px;
			font-size: 18px;
			cursor: pointer;
			transition: background-color 0.3s ease;
		}

		.buttons-container button {
			background-color: #028a0F;
			color: white;
		}

		.buttons-container button:hover {
			background-color: #000;
		}
	</style>
</head>

<body>
	<div class="container">
		<h1>Query Page</h1>
		<div class="buttons-container">
			<button><a href="Submit_query.php">Submit Query</a></button>
			<button><a href="Show_query.php">Show Query</a></button>
		</div>
	</div>
</body>

</html>