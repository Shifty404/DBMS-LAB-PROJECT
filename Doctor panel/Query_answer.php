<!DOCTYPE html>
<html>

<head>
    <title>UMED</title>
    <link rel="stylesheet" href="../CSS files/Admin_query_insert.css">
</head>

<body>

    <nav style="background-color: green; padding: 25px; display: flex; justify-content: space-between;">
        <div style="display: flex; align-items: center;">
            <a href="../Patient panel/Patient_panel.php" style="margin: 0 auto;">Back</a>
        </div>
        <div style="display: flex; align-items: center;">
            <a href="../Index.html" style="margin: 0 auto;">Log Out</a>
        </div>
    </nav>
</body>

</html>

<?php

$db = new mysqli("localhost", "admin", "1234", "umed");

$sql = "SELECT * FROM query where 'Answer' is NULL";
$result = $db->query($sql);

echo "<h1>All queries:</h1>";
echo "<table>";
echo "<tr><th>Query ID</th><th>Patient ID</th><th>question</th></th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['queryid'] . "</td>";
    echo "<td>" . $row['patientid'] . "</td>";
    echo "<td>" . $row['question'] . "</td>";
    echo "</tr>";
}
echo "</table>";

$db->close();

echo "<h1>Search query:</h1>";
echo "<form method='get'>";
echo "<label>query ID:</label>";
echo "<input type='text' name='queryID'>";
echo "<input type='submit' value='Search'>";
echo "</form>";

if (isset($_GET['queryID'])) {

    $db = new mysqli("localhost", "admin", "1234", "umed");
    $queryID = $_GET['queryID'];
    $query = "SELECT * FROM query WHERE queryID='$queryID'";
    $result = mysqli_query($db, $query);


    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $queryid = $row['QueryID'];
        $patientid = $row['PatientID'];
        $question = $row['Question'];

        echo "<h2>query Info:</h2>";
        echo "<table>";
        echo "<tr><td>Query ID:</td><td>$queryid</td></tr>";
        echo "<tr><td>Patient ID:</td><td>$patientid</td></tr>";
        echo "<tr><td>Question:</td><td>$question</td></tr>";

        echo "</table>";
    } else {
        echo "query not found.";
    }
}

?>