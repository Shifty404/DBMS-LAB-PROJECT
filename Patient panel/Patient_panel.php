<?php

session_start();

$db = new mysqli("localhost", "admin", "1234", "umed");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$ID = $_SESSION['ID'];

$sql = "SELECT * FROM patient WHERE PatientID = '$ID'";
$result = $db->query($sql);
$user = $result->fetch_assoc();

$PatientID = $user['PatientID'];
$Name = $user['Name'];
$DOB = $user['DOB'];
$user['Gender'];
if ($user['Gender'] == "m") {
    $Gender = "MALE";
} else {
    $Gender = "FEMALE";
}

$db->close();

?>

<!DOCTYPE html>
<html>

<head>
    <title>UMED</title>
    <link rel="stylesheet" href="../CSS files/Patient.css">
</head>

<body>

    <nav style="background-color: green; padding: 25px; display: flex; justify-content: space-between;">

        <div style="display: flex; align-items: center; margin-left: auto;">
            <a href="../Index.html">Log Out</a>
        </div>
    </nav>

    <h2>Patient Panel</h2>
    <div class="patient-info">
        <h5>Personal Information</h5>
        <ul>
            <li>ID: <?php echo "$PatientID" ?> </li>
            <li>NAME: <?php echo "$Name" ?></li>
            <li>DOB: <?php echo "$DOB" ?></li>
            <li>GENDER: <?php echo "$Gender" ?></li>
        </ul>
    </div>
    <div class="patient-appointments">
        <h3>Appointment Scheduling</h3>
        <p>View available doctors and schedule appointments online.</p>
        <button><a href="Appointment.php">View Appointments</a></button>
    </div>
    <div class="patient-query">
        <h3>Query</h3>
        <p>Ask questions to the doctors.</p>
        <button><a href="Query/Choose_query.php">Ask Questions</a></button>
    </div>
    <div class="patient-doctor-search">
        <h3>Doctor Search</h3>
        <p>Searching doctor</p>
        <button><a href="Patient_search_doctor.php">Search</a></button>
    </div>

</body>

</html>