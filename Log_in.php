<?php

$db = new mysqli("localhost", "admin", "1234", "umed");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if (isset($_POST['ID']) && isset($_POST['password'])) {

	$ID = $_POST['ID'];
	$password = $_POST['password'];

	if ($ID == "211%") {

		$sql = "SELECT * FROM patient WHERE PatientID = '$ID'";
		$result = $db->query($sql);
		
		if ($result->num_rows > 0) {
			$user = $result->fetch_assoc();
			if ($password == $user['PASSWORD']) {
				header("Location: Patient panel/Patient_panel.php");
				exit();
			} else {
				echo "Invalid information";
			}
		}else{
			echo "User not found";
		}

	} else if ($ID == "311%") {

		$sql = "SELECT * FROM doctor WHERE DoctorID = '$ID'";
		$result = $db->query($sql);

		if ($result->num_rows > 0) {
			$user = $result->fetch_assoc();
			if ($password == $user['PASSWORD']) {
				header("Location: Doctor panel/Doctor_panel.php");
				exit();
			} else {
				echo "Invalid information";
			}
		}else{
			echo "User not found";
		}

	} else if ($ID == "411%") {

		$sql = "SELECT * FROM pharmacist WHERE PharmacistID = '$ID'";
		$result = $db->query($sql);

		if ($result->num_rows > 0) {
			$user = $result->fetch_assoc();
			if ($password == $user['PASSWORD']) {
				header("Location: Pharmacist panel/Pharmacist_panel.php");
				exit();
			} else {
				echo "Invalid information";
			}
		}else{
			echo "User not found";
		}

	} else {

		$sql = "SELECT * FROM admin WHERE AdminID = '$ID'";
		$result = $db->query($sql);

		if ($result->num_rows > 0) {
			$user = $result->fetch_assoc();
			if ($password == $user['PASSWORD']) {
				header("Location: Admin panel/Admin_panel.php");
				exit();
			} else {
				echo "Invalid information";
			}
		}else{
			echo "User not found";
		}

	} 

}else {
	echo "User not found";
}

$db->close();
?>