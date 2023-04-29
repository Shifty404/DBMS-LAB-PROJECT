<?php

session_start();

$db = new mysqli("localhost", "admin", "1234", "umed");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if (isset($_POST['ID']) && isset($_POST['password'])) {

    $pID = $_SESSION['ID'];
    $doctor_id = $_SESSION['doctor_id'];
    $appointment_date = $_SESSION['appointment_date'];
    $appointment_time = $_SESSION['Appointment_time'];
    $ID = $_POST['ID'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM payment WHERE PaymentID = '$ID'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($password == $user['PASSWORD']) {

            $sql = "INSERT INTO `appointment`(`PatientID`, `DoctorID`, `Date`, `Time`, `STATUS`) 
            VALUES ('$pID','$doctor_id','$appointment_date',' $appointment_time', 'Pending')";

            if ($db->query($sql) == TRUE) {
                echo "<script>alert('Appointment scheduled successfully.'); window.location = 'Patient_panel.php';</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $db->error;
            }

        } else {
            echo "Invalid information";
        }
    } else {
        echo "User not found";
    }
}

$db->close();
?>


<!DOCTYPE html>
<html>

<head>
    <title>UMED</title>
    <link rel="stylesheet" href="../CSS files/Log_in.css">
</head>

<body>
    <div class="container">

        <h1>Payment</h1>
        <form action="Appointment_payment.php" method="post">

            <label for="ID">ID:</label>
            <input type="text" id="ID" name="ID" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Pay">
        </form>
    </div>
</body>

</html>
