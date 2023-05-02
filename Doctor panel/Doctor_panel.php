<?php

session_start();

$db = new mysqli("localhost", "admin", "1234", "umed");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$ID = $_SESSION['ID'];

$sql = "SELECT * FROM doctor WHERE DoctorID = '$ID'";
$result = $db->query($sql);
$user = $result->fetch_assoc();

$DoctorID = $user['DoctorID'];
$Name = $user['Name'];

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

    <h2>Doctor Panel</h2>
    <div class="patient-info">
        <h5>Personal Information</h5>
        <ul>
            <li>ID: <?php echo "$DoctorID" ?> </li>
            <li>NAME: <?php echo "$Name" ?></li>
        </ul>
    </div>
    <div class="patient-appointments">
        <h3>Appointments</h3>
        <p>View days appointments.</p>
        <button><a href="../Doctor panel/View_appointments.php">View</a></button>
    </div>
    <div class="patient-query">
        <h3>Prescribe patient</h3>
        <p>Prescribing the patient.</p>
        <button><a href="../Doctor panel/Prescribe.php">Prescribe</a></button>
    </div>
    <div class="patient-query">
        <h3>Medical History</h3>
        <p>See patient's previous medical history</p>
        <button><a href="../Doctor panel/Medical_history.php">See</a></button>
    </div>

</body>

</html>