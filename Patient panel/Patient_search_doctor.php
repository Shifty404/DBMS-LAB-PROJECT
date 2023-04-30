<?php
$name = isset($_POST['name']) ? $_POST['name'] : '';
$specialty = isset($_POST['specialty']) ? $_POST['specialty'] : '';

$db = new mysqli("localhost", "admin", "1234", "umed");

if ($db->connect_error) {
	die("Connection failed: " . $db->connect_error);
}

$sql = "SELECT * FROM doctor WHERE 1=1";
if (!empty($name)) {
	$sql .= " AND Name LIKE '%$name%'";
}
if (!empty($specialty)) {
	$sql .= " AND Specialty LIKE '%$specialty%'";
}

$result =  $db->query($sql);

$results_html = '';
if ($result->num_rows > 0) {
	$results_html .= "<h2>Results:</h2>";
	$results_html .= "<table>";
	$results_html .= "<tr><th>Name</th><th>Email</th><th>Specialty</th><th>Phone</th></tr>";
	while ($row = $result->fetch_assoc()) {
		$results_html .= "<tr><td>" . $row['Name'] . "</td><td>" . $row['Email'] . "</td><td>" . $row['Specialty'] . "</td><td>" . $row['Phone'] . "</td></tr>";
	}
	$results_html .= "</table>";
} else {
	$results_html .= "<h2>Results:</h2>";
	$results_html .= "<p>No results found.</p>";
}

$db->close();
?>

<!DOCTYPE html>
<html>

<head>
	<title>UMED</title>
</head>

<body>
	<button class="back" onclick="window.location.href='Patient_panel.php'">Back</button>

	<h1>Search for a Doctor</h1>
	<form method="post" action="Patient_search_doctor.php">
		<label for="name">Name:</label>
		<input type="text" name="name" id="name"><br>
		<label for="specialty">Specialty:</label>
		<input type="text" name="specialty" id="specialty"><br>
		<input type="submit" value="Search">
	</form>

	<?php echo $results_html; ?>

</body>

</html>