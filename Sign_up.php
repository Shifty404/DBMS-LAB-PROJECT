<?php

$db = new mysqli("localhost", "admin", "1234", "umed");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $phone = $_POST["phone"];

    $sql = "INSERT INTO `patient`(`AdminID`, `Name`, `Email`, `PASSWORD`, `DOB`, `Gender`, `Phone`) VALUES ('1','$name','$email','$password','$dob','$gender','$phone')";

    if ($db->query($sql) === TRUE) {
        header("Location: Index.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}

$db->close();

?>


<!DOCTYPE html>
<html>

<head>
    <title>UMED</title>
    <link rel="stylesheet" href="CSS files/Sign_up.css">
</head>

<body>
    <div class="container">
        <h1>Sign Up</h1>
        <form method="post" action="Sign_up.php">
            <label for="name">Name:</label>
            <input type="text" name="name" required>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <label for="password2">Password Again:</label>
            <input type="password" name="password2" required>
            <label for="gender">Gender:</label>
            <select name="gender" required>
                <option value="">Select</option>
                <option value="male">M</option>
                <option value="female">F</option>
            </select>
            <label for="dob">DOB:</label>
            <input type="date" name="dob" required>
            <label for="phone">Phone:</label>
            <input type="tel" name="phone" required>
            <input type="submit" value="Sign up">
        </form>
    </div>
</body>

</html>