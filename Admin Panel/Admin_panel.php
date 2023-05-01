<?php

session_start();

$db = new mysqli("localhost", "admin", "1234", "umed");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$ID = $_SESSION['ID'];

$sql = "SELECT * FROM admin WHERE AdminID = '$ID'";
$result = $db->query($sql);
$user = $result->fetch_assoc();

$AdminID = $user['AdminID'];
$Name = $user['Name'];

$db->close();

?>

<!DOCTYPE html>
<html>

<head>
    <title>UMED</title>
    <link rel="stylesheet" href="../CSS files/Admin.css">
</head>

<body>

    <nav class="navbar">
        <div class="navbar-right">
            <a href="../Index.html">Log Out</a>
        </div>
    </nav>

    <h2>Admin Panel</h2>
    <div class="admin-info">
        <h5>Personal Information</h5>
        <ul>
            <li>ID: <?php echo "$AdminID" ?> </li>
            <li>NAME: <?php echo "$Name" ?></li>
        </ul>
    </div>
    <div class="admin-doctor">
        <h3>Doctor Info</h3>
        <p>Doctor information insert, update and delete.</p>
        <button><a href="Admin_doctor.php">Doctor</a></button>
    </div>
    <div class="admin-pharmacist">
        <h3>Pharmacist Info</h3>
        <p>Pharmacist information insert, update and delete.</p>
        <button><a href="Admin_pharmacist.php">Pharmacist</a></button>
    </div>
    <div class="admin-patient">
        <h3>Patient Info</h3>
        <p>Patient information search.</p>
        <button><a href="Admin_patient.php">Patient</a></button>
    </div>

</body>

</html>