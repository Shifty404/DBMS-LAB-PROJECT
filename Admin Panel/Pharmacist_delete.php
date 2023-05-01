<?php

if (isset($_POST['delete'])) {

    $db = new mysqli("localhost", "admin", "1234", "umed");

    $pharmacist_id = $_POST['pharmacist_id'];

    $query = "DELETE FROM pharmacist WHERE PharmacistID='$pharmacist_id'";
    $result = mysqli_query($db, $query);

    if ($result) {
        echo "<script>alert('Pharmacist information deleted successfully.'); window.location = 'Admin_pharmacist.php';</script>";
    } else {
        echo "<script>alert('Error deleting pharmacist information.');</script>";
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
            <a href="../Admin Panel/Admin_pharmacist.php" style="margin: 0 auto;">Back</a>
        </div>
        <div style="display: flex; align-items: center;">
            <a href="../Index.html" style="margin: 0 auto;">Log Out</a>
        </div>
    </nav>
    <h1>Delete Pharmacist Info</h1>
    <form method="post">
        <label>Pharmacist ID:</label>
        <input type="text" name="pharmacist_id">
        <input type="submit" name="delete" value="Delete">
    </form>
</body>

</html>