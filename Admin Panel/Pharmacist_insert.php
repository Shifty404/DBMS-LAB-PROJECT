<?php

session_start();

$db = new mysqli("localhost", "admin", "1234", "umed");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$ID = $_SESSION['ID'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    $specialty = $_POST["specialty"];
    $phone = $_POST["phone"];

    if ($password == $password2) {
        $sql = "INSERT INTO `pharmacist`(`AdminID`, `Name`, `Email`, `PASSWORD`, `Phone`) VALUES ('$ID','$name','$email','$password','$phone')";

        if ($db->query($sql) === TRUE) {
            echo "<script>alert('Pharmacist account created successfully!'); window.location = 'Admin_pharmacist.php';</script>";
        } else {
            echo "<script>alert('Error inserting pharmacist information.');</script>";
        }
    }else{
        echo "<script>alert('Check password again.');</script>";
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
            <a href="../Admin Panel/Admin_pharmacist.php" style="margin: 0 auto;">Back</a>
        </div>
        <div style="display: flex; align-items: center;">
            <a href="../Index.html" style="margin: 0 auto;">Log Out</a>
        </div>
    </nav>

    <div class="container">
        <h1>Insert</h1>
        <form method="post" action="Pharmacist_insert.php">
            <label for="name">Name:</label>
            <input type="text" name="name" required>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <label for="password2">Password Again:</label>
            <input type="password" name="password2" required>
            <label for="phone">Phone:</label>
            <input type="tel" name="phone" required>
            <input type="submit" value="Create">
        </form>
    </div>
</body>

</html>