<!DOCTYPE html>
<html>

<head>
	<title>UMED</title>
	<link rel="stylesheet" href="../CSS files/Admin_doctor_insert.css">
</head>

<body>
	<nav style="background-color: green; padding: 25px; display: flex; justify-content: space-between;">
		<div style="display: flex; align-items: center;">
			<a href="../Doctor panel/Doctor_panel.php" style="margin: 0 auto;">Back</a>
		</div>
		<div style="display: flex; align-items: center;">
			<a href="../Index.html" style="margin: 0 auto;">Log Out</a>
		</div>
	</nav>

	<form method="post">
		<label>Patient ID:</label>
		<input type="text" id="patientID" name="patientID" required><br>
		<input type="submit" value="Search">
	</form>

	<?php

	$db = new mysqli("localhost", "admin", "1234", "umed");

	if ($db->connect_error) {
		die("Connection failed: " . $db->connect_error);
	}

	if (isset($_POST['patientID'])) {
		
		$patientID = $_POST['patientID'];

		$query = "SELECT * FROM `appointment` WHERE `PatientID` = '$patientID' AND `STATUS` = 'Checked'";

		$result = $db->query($query);

		if ($result->num_rows > 0) {
			echo "<table>";
			echo "<tr><th>Appointment ID</th><th>Patient ID</th><th>Date</th><th>Time</th><th>Status</th><th>Diabetes</th><th>Cholesterol</th><th>Blood Pressure</th><th>Prescription</th></tr>";
			while ($row = $result->fetch_assoc()) {
				echo "<tr><td>" . $row["AppointmentID"] . "</td><td>" . $row["PatientID"] . "</td><td>" . $row["Date"] . "</td><td>" . $row["Time"] . "</td><td>" . $row["STATUS"] . "</td><td>" . $row["diabetes"] . "</td><td>" . $row["cholesterol"] . "</td><td>" . $row["blood_pressure"] . "</td><td>" . $row["Prescription"] . "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "No appointments found.";
		}
	}

	$db->close();
	?>

</body>

</html>
