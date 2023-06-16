<!DOCTYPE html>
<html>

<head>
    <title>UMED</title>
    <link rel="stylesheet" href="../CSS files/Admin_doctor_insert.css">
</head>

<body>
    <nav style="background-color: green; padding: 25px; display: flex; justify-content: space-between;">
        <div style="display: flex; align-items: center;">
            <a href="../Doctor panel/Doctor_panel.php" style="margin: 0 auto;">Back</a>
        </div>
        <div style="display: flex; align-items: center;">
            <a href="../Index.html" style="margin: 0 auto;">Log Out</a>
        </div>
    </nav>
    <br>
    <h2>Answer Patient Query</h2>
    <form action="Query_answer.php" method="POST">
        <label for="query-id">Query ID:</label>
        <input type="text" id="query-id" name="query-id"><br><br>
        <label for="answer">Answer:</label>
        <textarea id="answer" name="answer"></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>

<?php
session_start();

$db = new mysqli("localhost", "admin", "1234", "umed");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "SELECT * FROM query WHERE Answer IS NULL";
$result = $db->query($sql);

echo "<table>";
echo "<tr><th>Query ID</th><th>Patient ID</th><th>Question</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['QueryID'] . "</td>";
    echo "<td>" . $row['PatientID'] . "</td>";
    echo "<td>" . $row['Question'] . "</td>";
    echo "<td><a href='Query_answer.php?query-id=" . $row['QueryID'] . "'>Answer</a></td>";
    echo "</tr>";
}
echo "</table>";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query_id = $_POST['query-id'];
    $answer = $_POST['answer'];
    $doctor_id = $_SESSION['ID'];

    $sql = "UPDATE `query` SET `DoctorID`='$doctor_id', `Answer`='$answer' WHERE `QueryID`='$query_id'";
    if ($db->query($sql) === TRUE) {
        echo "<script>alert('Answer submitted successfully!'); window.location = 'Doctor_panel.php';</script>";
    } else {
        echo "<script>alert('Error!');</script>";
    }
}

$db->close();

?>