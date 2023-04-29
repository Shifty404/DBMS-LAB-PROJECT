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

    $sql = "INSERT INTO `appointment`(`PatientID`, `DoctorID`, `Date`, `STATUS`) 
            VALUES ('$ID','$doctor_id','$appointment_date','Pending')";

    if ($db->query($sql) === TRUE) {
        echo "Appointment scheduled successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
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
    <input type="datetime-local" name="appointment_date" id="appointment_date"><br><br>
    <input type="submit" value="Appointment">
</form>
