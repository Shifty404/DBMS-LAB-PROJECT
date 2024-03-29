<?php

session_start();

$db = new mysqli("localhost", "admin", "1234", "umed");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$ID = $_SESSION['ID'];

$sql = "SELECT * FROM Pharmacist WHERE PharmacistID = '$ID'";
$result = $db->query($sql);
$user = $result->fetch_assoc();

$PharmacistID = $user['PharmacistID'];
$Name = $user['Name'];

$db->close();

?>

<!DOCTYPE html>
<html>

<head>
    <title>UMED</title>
    <link rel="stylesheet" href="../CSS files/Pharmacist.css">
</head>

<body>

    <nav style="background-color: green; padding: 25px; display: flex; justify-content: space-between;">
        <div style="display: flex; align-items: center; margin-left: auto;">
            <a href="../Index.html">Log Out</a>
        </div>
    </nav>
    <h2>Pharmacist Panel</h2>
    <div class="pharmacist-info">
        <h5>Personal Information</h5>
        <ul>
            <li>ID: <?php echo "$PharmacistID" ?> </li>
            <li>NAME: <?php echo "$Name" ?></li>
        </ul>
    </div>
    <div class="pharmacist-doctor">
        <h3>Prescription Search</h3>
        <p>Can see patients prescription.</p>
        <button><a href="../Pharmacist panel/Prescription_search.php">Search</a></button>
    </div>

</body>

</html>