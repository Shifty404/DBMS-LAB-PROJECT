<?php

if (isset($_POST['retrieve'])) {
    $db = new mysqli("localhost", "admin", "1234", "umed");

    $appointment_id = $_POST['appointment_id'];
    $patient_id = $_POST['patient_id'];

    $query = "SELECT `AppointmentID`, `PatientID`, `DoctorID`, `Date`, `STATUS`, `Feedback`, `Time`, `diabetes`, `cholesterol`, `blood_pressure`, `Prescription` FROM `appointment` WHERE `AppointmentID` = '$appointment_id' AND `PatientID` = '$patient_id' AND `STATUS` = 'Checked'";
    $result = $db->query($query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $status = $row['STATUS'];
        $time = $row['Time'];
        $diabetes = $row['diabetes'];
        $cholesterol = $row['cholesterol'];
        $blood_pressure = $row['blood_pressure'];
        $prescription = $row['Prescription'];
    } else {
        echo "<script>alert('Appointment not found.');window.location = 'Pharmacist_panel.php';</script>";
    }

    mysqli_close($db);
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
            <a href="../Pharmacist panel/Pharmacist_panel.php" style="margin: 0 auto;">Back</a>
        </div>
        <div style="display: flex; align-items: center;">
            <a href="../Index.html" style="margin: 0 auto;">Log Out</a>
        </div>
    </nav>

    <h1>Prescription</h1>
    <form method="post">
        <label>Appointment ID:</label>
        <input type="text" name="appointment_id" value="<?php if (isset($appointment_id)) echo $appointment_id; ?>">
        <label>Patient ID:</label>
        <input type="text" name="patient_id" value="<?php if (isset($patient_id)) echo $patient_id; ?>">
        <input type="submit" name="retrieve" value="Retrieve">
    </form>

    <?php if (isset($patient_id)) : ?>
            <?php
            echo "<h2>Appointment Info:</h2>";
            echo "<table>";
            echo "<tr><td>Patient Name: </td><td>$patient_id</td></tr>";
            echo "<tr><td>Appointment ID: </td><td>$appointment_id</td></tr>";
            echo "<tr><td>Status: </td><td>$status</td></tr>";
            echo "<tr><td>Time: </td><td>$time</td></tr>";
            echo "<tr><td>Diabetes: </td><td> $diabetes</td></tr>";
            echo "<tr><td>Cholesterol: </td><td> $cholesterol</td></tr>";
            echo "<tr><td>Blood Pressure: </td><td> $blood_pressure</td></tr>";
            echo "<tr><td>Prescription: </td><td> $prescription</td></tr>";
            echo "</table>";
            ?>
            <br>
        </form>
    <?php endif; ?>
</body>

</html>