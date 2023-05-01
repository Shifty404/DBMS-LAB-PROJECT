<?php

if (isset($_POST['delete'])) {

    $db = new mysqli("localhost", "admin", "1234", "umed");

    $doctor_id = $_POST['doctor_id'];

    $query = "DELETE FROM doctor WHERE DoctorID='$doctor_id'";
    $result = mysqli_query($db, $query);

    if ($result) {
        echo "<script>alert('Doctor information deleted successfully.'); window.location = 'Admin_doctor.php';</script>";
    } else {
        echo "<script>alert('Error deleting doctor information.');</script>";
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
    <h1>Delete Doctor Info</h1>
    <form method="post">
        <label>Doctor ID:</label>
        <input type="text" name="doctor_id">
        <input type="submit" name="delete" value="Delete">
    </form>
</body>

</html>