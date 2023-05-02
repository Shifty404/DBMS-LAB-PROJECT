<?php

session_start();

$db = new mysqli("localhost", "admin", "1234", "umed");

if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}

$ID = $_SESSION['ID'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $question = $_POST["question"];

  $sql = "INSERT INTO query (PatientID, Question) VALUES ('$ID', '$question')";

  if ($db->query($sql) === TRUE) {
    echo "Query submitted successfully";
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
  <link rel="stylesheet" href="../../CSS files/Patient_Submit_query.css">
</head>

<body>
  <nav style="background-color: green; padding: 25px; display: flex; justify-content: space-between;">
    <div style="display: flex; align-items: center;">
      <a href="./Choose_query.php" style="margin: 0 auto;">Back</a>
    </div>
    <div style="display: flex; align-items: center;">
      <a href="../../Index.html" style="margin: 0 auto;">Log Out</a>
    </div>
  </nav>
  <br>
  <form action="Submit_query.php" method="post" style="text-align: center;">
    <label for="question">Question:</label>
    <textarea name="question" id="question" required></textarea><br><br>
    <input type="submit" value="Submit Query">
  </form>

</body>

</html>