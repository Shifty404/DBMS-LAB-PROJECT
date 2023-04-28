<?php
session_start();

$db = new mysqli("localhost", "admin", "1234", "umed");

if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}

$ID = $_SESSION['ID'];

$sql = "SELECT query.QueryID, query.Question, query.Answer, doctor.Name
        FROM query
        LEFT JOIN doctor ON query.DoctorID = doctor.DoctorID
        WHERE query.PatientID = '$ID'
        ORDER BY query.QueryID DESC";

$result = $db->query($sql);

$db->close();
?>

<!DOCTYPE html>
<html>

<head>
  <title>UMED</title>
  <link rel="stylesheet" href="../../CSS files/Patient_Show_query.css">
</head>

<body>
  <button class="back" onclick="window.location.href='Choose_query.php'">Back</button>
  <h1>My Queries</h1>

  <table>
    <tr>
      <th>Query ID</th>
      <th>Doctor Name</th>
      <th>Question</th>
      <th>Answer</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $row['QueryID']; ?></td>
        <td><?php echo $row['Name']; ?></td>
        <td><?php echo $row['Question']; ?></td>
        <td><?php echo $row['Answer']; ?></td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>