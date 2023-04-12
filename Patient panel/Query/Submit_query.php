<?php

session_start();

$db = new mysqli("localhost", "admin", "1234", "umed");

if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}

$ID = $_SESSION['ID'];

if ($_SERVER["REQUEST_METHOD"] == "post") {
  $question = $_POST["question"];

  $sql = "INSERT INTO `query`(`PatientID`,`Question`) VALUES ('$ID', '$question')";

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
  <style>
    input[type="submit"] {
      background-color: #028a0F;
      color: white;
      padding: 12px 24px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color .4s ease;
    }

    input[type="submit"]:hover {
      background-color: #000;
    }
  </style>
</head>

<body>
  <form action="Submit_query.php" method="post">
    <label for="question">Question:</label>
    <textarea name="question" id="question"required></textarea><br><br>
    <input type="submit" value="Submit Query">
  </form>

</body>

</html>