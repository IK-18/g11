<?php
session_start();
include('./db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$user_id = $_SESSION['user_id'];
	$name = $_POST['name'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	echo isset($_FILES['image']);
	$image = $_FILES['image'];
	$uploadDir = 'uploads/';
	$fileName = uniqid() . '-' . basename($image['name']);
	$uploadFilePath = $uploadDir . $fileName;

	// Validation
	if (move_uploaded_file($image['tmp_name'], $uploadFilePath)) {
		echo "File uploaded sucessflly. Stored at: $uploadFilePath";
	}

	$stmt = $conn->prepare("INSERT INTO missing_persons (name, age, gender, photo, user_id) VALUES (?, ?, ?, ?, ?)");
	$stmt->bind_param("sssss", $name, $age, $gender, $uploadFilePath, $user_id);

	if ($stmt->execute()) {
		echo "Details recorded sucessfully!";
		$stmt->close();
		$conn->close();
		// header('Location: /report');
	} else {
		echo "Error: " . $stmt->error;
		$stmt->close();
		$conn->close();
		// header('Location: /report');
	}
}
?>