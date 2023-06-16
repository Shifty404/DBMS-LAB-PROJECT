<?php

session_start();

$db = new mysqli("localhost", "admin", "1234", "umed");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$ID = $_SESSION['ID'];

if (isset($_POST['search'])) {
    $date = $_POST['date'];

    $sql = "SELECT `AppointmentID`, `PatientID`, `DoctorID`, `Date`, `STATUS`, `Time`, `diabetes`, `cholesterol`, `blood_pressure`, `Prescription` FROM `appointment` WHERE 'DoctorID'= '$ID' AND `Date` = '$date'";

    $result = $db->query($sql);
}

?>

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

    <h1>Search Appointments by Date</h1>
    <form method="post">
        <label for="date">Date:</label>
        <input type="date" name="date" required>
        <input type="submit" name="search">
    </form>
    <?php if (isset($result) && $result->num_rows > 0) : ?>
        <h2>Appointments on <?php echo $date; ?>:</h2>
        <table>
            <tr>
                <th>Appointment ID</th>
                <th>Patient ID</th>
                <th>Doctor ID</th>
                <th>Date</th>
                <th>Status</th>
                <th>Time</th>
                <th>Diabetes</th>
                <th>Cholesterol</th>
                <th>Blood Pressure</th>
                <th>Prescription</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $row['AppointmentID']; ?></td>
                    <td><?php echo $row['PatientID']; ?></td>
                    <td><?php echo $row['DoctorID']; ?></td>
                    <td><?php echo $row['Date']; ?></td>
                    <td><?php echo $row['STATUS']; ?></td>
                    <td><?php echo $row['Time']; ?></td>
                    <td><?php echo $row['diabetes']; ?></td>
                    <td><?php echo $row['cholesterol']; ?></td>
                    <td><?php echo $row['blood_pressure']; ?></td>
                    <td><?php echo $row['Prescription']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php elseif (isset($result) && $result->num_rows == 0) : ?>
        <p>No appointments found for <?php echo $date; ?>.</p>
    <?php endif; ?>
</body>

</html>