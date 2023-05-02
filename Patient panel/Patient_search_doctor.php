<!DOCTYPE html>
<html>

<head>
	<title>UMED</title>
	<link rel="stylesheet" href="../CSS files/Admin_doctor_insert.css">
</head>

<body>

	<nav style="background-color: green; padding: 25px; display: flex; justify-content: space-between;">
		<div style="display: flex; align-items: center;">
			<a href="../Patient panel/Patient_panel.php" style="margin: 0 auto;">Back</a>
		</div>
		<div style="display: flex; align-items: center;">
			<a href="../Index.html" style="margin: 0 auto;">Log Out</a>
		</div>
	</nav>
</body>

</html>

<?php

$db = new mysqli("localhost", "admin", "1234", "umed");

$query = "SELECT * FROM Doctor";
$result = mysqli_query($db, $query);

echo "<h1>All Doctors:</h1>";
echo "<table>";
echo "<tr><th>Doctor ID</th><th>Name</th><th>Email</th><th>Specialty</th></th><th>Phone</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>" . $row['DoctorID'] . "</td>";
  echo "<td>" . $row['Name'] . "</td>";
  echo "<td>" . $row['Email'] . "</td>";
  echo "<td>" . $row['Specialty'] . "</td>";
  echo "<td>" . $row['Phone'] . "</td>";
  echo "</tr>";
}
echo "</table>";

$db->close();

echo "<h1>Search Doctor:</h1>";
echo "<form method='get'>";
echo "<label>Doctor ID:</label>";
echo "<input type='text' name='DoctorID'>";
echo "<input type='submit' value='Search'>";
echo "</form>";

if (isset($_GET['DoctorID'])) {

    $db = new mysqli("localhost", "admin", "1234", "umed");
  $DoctorID = $_GET['DoctorID'];
  $query = "SELECT * FROM doctor WHERE DoctorID='$DoctorID'";
  $result = mysqli_query($db, $query);


  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['Name'];
    $email = $row['Email'];
	$specialty = $row['Specialty'];
    $phone = $row['Phone'];

    echo "<h2>Doctor Info:</h2>";
    echo "<table>";
    echo "<tr><td>Doctor ID:</td><td>$DoctorID</td></tr>";
    echo "<tr><td>Name:</td><td>$name</td></tr>";
    echo "<tr><td>Email:</td><td>$email</td></tr>";
	echo "<tr><td>Specialty:</td><td>$specialty</td></tr>";
    echo "<tr><td>Phone:</td><td>$phone</td></tr>";
    echo "</table>";
  } else {
    echo "Doctor not found.";
  }
}

?>