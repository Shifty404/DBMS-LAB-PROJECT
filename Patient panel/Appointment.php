<?php

session_start();

$db = new mysqli("localhost", "admin", "1234", "umed");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$ID = $_SESSION['ID'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $diabetes = $_POST["diabetes"];
    $cholesterol = $_POST["cholesterol"];
    $blood_pressure = $_POST["blood_pressure"];
    $doctor_id = $_POST["doctor_id"];
    $appointment_date = $_POST["appointment_date"];
    $appointment_time = $_POST["appointment_time"];
    $doctorfee = $_POST["doctorfee"];

    $_SESSION['diabetes'] = $diabetes;
    $_SESSION['cholesterol'] = $cholesterol;
    $_SESSION['blood_pressure'] = $blood_pressure;
    $_SESSION['doctor_id'] = $doctor_id;
    $_SESSION['appointment_date'] = $appointment_date;
    $_SESSION['Appointment_time'] = $appointment_time;
    $_SESSION['doctorfee'] = $doctorfee;

    header("Location: Appointment_payment.php");
    exit();
}

$sql = "SELECT * FROM doctor";
$result = $db->query($sql);

$db->close();

?>

<!DOCTYPE html>
<html>

<!DOCTYPE html>
<html>

<head>
    <title>UMED</title>
    <link rel="stylesheet" href="../CSS files/Appointment.css">
</head>

<body>

    <nav style="background-color: green; padding: 25px; display: flex; justify-content: space-between;">
        <div style="display: flex; align-items: center;">
            <a href="../Patient panel/Patient_panel.php" style="margin: 0 auto;">Back</a>
        </div>
        <div style="display: flex; align-items: center;">
            <a href="../../Index.html" style="margin: 0 auto;">Log Out</a>
        </div>
    </nav>
    <br>

    <div class="container">
        <form method="POST" action="Appointment.php">


            <br>
            <h1>Appointment</h1>
            <br>
            <label for="diabetes">Diabetes:</label>
            <select name="diabetes" id="diabetes" required>
                <option value="">Select one</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select><br><br>

            <label for="cholesterol">Cholesterol:</label>
            <select name="cholesterol" id="cholesterol" required>
                <option value="">Select one</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select><br><br>

            <label for="blood_pressure">Blood_pressure:</label>
            <select name="blood_pressure" id="blood_pressure" required>
                <option value="">Select one</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select><br><br>

            <label for="doctor_id">Select a Doctor:</label>
            <select name="doctor_id" id="doctor_id" required onchange="showAvailability()">
                <option value="">Select one</option>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["DoctorID"] . "'start='" . $row["Start_time"] . "'end='" . $row["End_time"] ."'fee='" . $row["DoctorFee"] . "'>" . $row["Name"] . "</option>";
                    }
                }
                ?>
            </select><br><br>

            <label for="appointment_date">Appointment Date:</label>
            <input type="date" name="appointment_date" id="appointment_date" required><br><br>

            <label id="availability_label"></label><br><br>
            <label for="appointment_time">Appointment Time:</label>
            <input type="time" name="appointment_time" id="appointment_time" required><br><br>
            
            <input type="hidden" name="doctorfee" value="" id="doctorfee">

            <input type="submit" value="Appoint">

            <script>
                function showAvailability() {
                    var select = document.getElementById("doctor_id");
                    var option = select.options[select.selectedIndex];
                    var start_time = option.getAttribute("start");
                    var end_time = option.getAttribute("end");
                    var doctorfee = option.getAttribute("fee");
                    var availability_label = document.getElementById("availability_label");
                    document.getElementById("doctorfee").value = doctorfee;
                    availability_label.textContent = "Available from " + start_time + " to " + end_time + " and Doctor Fee is " + doctorfee;
                }
            </script>

        </form>
    </div>
</body>

</html>