<!DOCTYPE html>
<html>

<head>
	<title>UMED</title>
	<link rel="stylesheet" href="../CSS files/Admin_doctor_insert.css">
</head>

<body>

	<nav style="background-color: green; padding: 25px; display: flex; justify-content: space-between;">
		<div style="display: flex; align-items: center;">
			<a href="../Admin Panel/Admin_panel.php" style="margin: 0 auto;">Back</a>
		</div>
		<div style="display: flex; align-items: center;">
			<a href="../Index.html" style="margin: 0 auto;">Log Out</a>
		</div>
	</nav>
</body>

</html>



<?php

$db = new mysqli("localhost", "admin", "1234", "umed");

$query = "SELECT * FROM patient";
$result = mysqli_query($db, $query);

echo "<h1>All Patients:</h1>";
echo "<table>";
echo "<tr><th>Patient ID</th><th>Name</th><th>Email</th><th>DOB</th><th>Gender</th><th>Phone</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>" . $row['PatientID'] . "</td>";
  echo "<td>" . $row['Name'] . "</td>";
  echo "<td>" . $row['Email'] . "</td>";
  echo "<td>" . $row['DOB'] . "</td>";
  if ($row['Gender'] == 'm') {
    echo "<td>Male</td>";
  } elseif ($row['Gender'] == 'f') {
    echo "<td>Female</td>";
  } else {
    echo "<td>Unknown</td>";
  }
  echo "<td>" . $row['Phone'] . "</td>";
  echo "</tr>";
}
echo "</table>";

$db->close();

echo "<h1>Search Patient:</h1>";
echo "<form method='get'>";
echo "<label>Patient ID:</label>";
echo "<input type='text' name='patient_id'>";
echo "<input type='submit' value='Search'>";
echo "</form>";

if (isset($_GET['patient_id'])) {

    $db = new mysqli("localhost", "admin", "1234", "umed");
  $patient_id = $_GET['patient_id'];
  $query = "SELECT * FROM patient WHERE PatientID='$patient_id'";
  $result = mysqli_query($db, $query);


  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['Name'];
    $email = $row['Email'];
    $dob = $row['DOB'];
    if ($row['Gender'] == 'm') {
        $gender = "MALE";
      } elseif ($row['Gender'] == 'f') {
        $gender = "FEMALE";
      } else {
        $gender = "UNKNOWN";
      }

    $phone = $row['Phone'];

    echo "<h2>Patient Info:</h2>";
    echo "<table>";
    echo "<tr><td>Patient ID:</td><td>$patient_id</td></tr>";
    echo "<tr><td>Name:</td><td>$name</td></tr>";
    echo "<tr><td>Email:</td><td>$email</td></tr>";
    echo "<tr><td>DOB:</td><td>$dob</td></tr>";
    echo "<tr><td>Gender:</td><td>$gender</td></tr>";
    echo "<tr><td>Phone:</td><td>$phone</td></tr>";
    echo "</table>";
  } else {
    echo "Patient not found.";
  }
}

?>