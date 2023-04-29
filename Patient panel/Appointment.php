<?php

session_start();

$db = new mysqli("localhost", "admin", "1234", "umed");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$ID = $_SESSION['ID'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doctor_id = $_POST["doctor_id"];
    $appointment_date = $_POST["appointment_date"];
    $appointment_time = $_POST["appointment_time"];

    $_SESSION['doctor_id'] = $doctor_id;
    $_SESSION['appointment_date'] = $appointment_date;
    $_SESSION['Appointment_time'] = $appointment_time;

    header("Location: Appointment_payment.php");
	exit();
}

$sql = "SELECT * FROM doctor";
$result = $db->query($sql);

$db->close();

?>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="doctor_id">Select a Doctor:</label>
    <select name="doctor_id" id="doctor_id">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["DoctorID"] . "'>" . $row["Name"] . "</option>";
            }
        }
        ?>
    </select><br><br>
    <label for="appointment_date">Appointment Date:</label>
    <input type="date" name="appointment_date" id="appointment_date" required><br><br>

    <label for="appointment_time">Appointment Time:</label>
    <input type="time" name="appointment_time" id="appointment_time" required><br><br>

    <input type="submit" value="Appoint">
</form>