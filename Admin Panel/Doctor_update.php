<?php

if (isset($_POST['retrieve'])) {
    $db = new mysqli("localhost", "admin", "1234", "umed");

    $doctor_id = $_POST['doctor_id'];
    $query = "SELECT * FROM doctor WHERE DoctorID='$doctor_id'";

    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['Name'];
        $email = $row['Email'];
        $specialty = $row['Specialty'];
        $phone = $row['Phone'];
        $start_time = $row['Start_time'];
        $end_time = $row['End_time'];
    } else {
        echo "<script>alert('Doctor not found.');</script>";
    }

    mysqli_close($db);
}

if (isset($_POST['update'])) {
    
    $db = new mysqli("localhost", "admin", "1234", "umed");
    $doctor_id = $_POST['doctor_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $specialty = $_POST['specialty'];
    $phone = $_POST['phone'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    $query = "UPDATE doctor SET Name='$name', Email='$email', Specialty='$specialty', Phone='$phone', Start_time='$start_time', End_time='$end_time' WHERE DoctorID='$doctor_id'";
    $result = mysqli_query($db, $query);

    if ($result) {
        echo "<script>alert('Doctor information updated successfully!'); window.location = 'Admin_doctor.php';</script>";
    } else {
        echo "<script>alert('Error updating doctor information.');</script>";
    }

    $db->close();
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
            <a href="../Admin Panel/Admin_doctor.php" style="margin: 0 auto;">Back</a>
        </div>
        <div style="display: flex; align-items: center;">
            <a href="../Index.html" style="margin: 0 auto;">Log Out</a>
        </div>
    </nav>

    <h1>Update Doctor Info</h1>
    <form method="post">
        <label>Doctor ID:</label>
        <input type="text" name="doctor_id" value="<?php if (isset($doctor_id)) echo $doctor_id; ?>">
        <input type="submit" name="retrieve" value="Retrieve">
    </form>

    <?php if (isset($name)) : ?>
        <h2>Doctor Info:</h2>
        <form method="post">
            <input type="hidden" name="doctor_id" value="<?php echo $doctor_id; ?>">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $name; ?>"><br>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $email; ?>"><br>
            <label>Specialty:</label>
            <input type="text" name="specialty" value="<?php echo $specialty; ?>"><br>
            <label>Phone:</label>
            <input type="tel" name="phone" value="<?php echo $phone; ?>"><br>
            <label>Start Time:</label>
            <input type="time" name="start_time" value="<?php echo $start_time; ?>"><br>
            <label>End Time:</label>
            <input type="time" name="end_time" value="<?php echo $end_time; ?>"><br>
            <input type="submit" name="update" value="Update">
        </form>
    <?php endif; ?>
</body>

</html>