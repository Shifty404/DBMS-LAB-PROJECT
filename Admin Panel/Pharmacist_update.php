<?php

if (isset($_POST['retrieve'])) {
    $db = new mysqli("localhost", "admin", "1234", "umed");

    $pharmacist_id = $_POST['pharmacist_id'];
    $query = "SELECT * FROM pharmacist WHERE PharmacistID='$pharmacist_id'";

    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        $name = $row['Name'];
        $email = $row['Email'];
        $phone = $row['Phone'];

    } else {
        echo "pharmacist not found.";
    }

    mysqli_close($db);
}

if (isset($_POST['update'])) {
    
    $db = new mysqli("localhost", "admin", "1234", "umed");
    $pharmacist_id = $_POST['pharmacist_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $query = "UPDATE pharmacist SET Name='$name', Email='$email', Phone='$phone' WHERE pharmacistID='$pharmacist_id'";
    $result = mysqli_query($db, $query);

    if ($result) {
        echo "<script>alert('Pharmacist information updated successfully!'); window.location = 'Admin_pharmacist.php';</script>";
    } else {
        echo "<script>alert('Error updating pharmacist information.');</script>";
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

    <h1>Update Pharmacist Info</h1>
    <form method="post">
        <label>Pharmacist ID:</label>
        <input type="text" name="pharmacist_id" value="<?php if (isset($pharmacist_id)) echo $pharmacist_id; ?>">
        <input type="submit" name="retrieve" value="Retrieve">
    </form>

    <?php if (isset($name)) : ?>
        <h2>Pharmacist Info:</h2>
        <form method="post">
            <input type="hidden" name="pharmacist_id" value="<?php echo $pharmacist_id; ?>">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $name; ?>"><br>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $email; ?>"><br>
            <label>Phone:</label>
            <input type="tel" name="phone" value="<?php echo $phone; ?>"><br>
            <input type="submit" name="update" value="Update">
        </form>
    <?php endif; ?>
</body>

</html>