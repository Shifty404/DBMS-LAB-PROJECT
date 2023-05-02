<?php

session_start();

$db = new mysqli("localhost", "admin", "1234", "umed");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if (isset($_POST['ID']) && isset($_POST['password'])) {

    $PatientID = $_SESSION['ID'];
    $DoctorID = $_SESSION['doctor_id'];
    $appointment_date = $_SESSION['appointment_date'];
    $appointment_time = $_SESSION['Appointment_time'];
    $diabetes = $_SESSION['diabetes'];
    $cholesterol =  $_SESSION['cholesterol'];
    $blood_pressure = $_SESSION['blood_pressure'];
    $doctorfee = $_SESSION['doctorfee'];

    $ID = $_POST['ID'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM payment WHERE PaymentID = '$ID'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($password == $user['PASSWORD']) {

            $money = $user['Amount'];
            $money -= $doctorfee;

            if ($money > 0) {

                $sql2 = "UPDATE `payment` SET `Amount`='$money' WHERE PaymentID = '$ID'";

                $sql1 = "INSERT INTO `appointment`(`PatientID`, `DoctorID`, `Date`, `Time`, `STATUS`,`diabetes`, `cholesterol`, `blood_pressure`) 
            VALUES ('$PatientID','$DoctorID','$appointment_date',' $appointment_time', 'Pending', '$diabetes', '$cholesterol', '$blood_pressure')";

                if ($db->query($sql1) == TRUE && $db->query($sql2) == TRUE) {
                    echo "<script>alert('Appointment scheduled successfully.'); window.location = 'Patient_panel.php';</script>";
                } else {
                    echo "<script>alert('Error!');</script>";
                }
            } else {
                echo "<script>alert('Insufficient balance!');</script>";
            }
        } else {
            echo "<script>alert('Invalid information!');</script>";
        }
    } else {
        echo "<script>alert('User not found!');</script>";
    }
}

$db->close();
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
            <a href="../Patient panel/Appointment.php" style="margin: 0 auto;">Back</a>
        </div>
        <div style="display: flex; align-items: center;">
            <a href="../Index.html" style="margin: 0 auto;">Log Out</a>
        </div>
    </nav>
    <br>
    <div class="container">

        <h1>Payment</h1>
        <form action="Appointment_payment.php" method="post">

            <label for="ID">ID:</label>
            <input type="text" id="ID" name="ID" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <input type="submit" value="Pay">
        </form>
    </div>
</body>

</html>