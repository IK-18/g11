<?php
session_start();
include('./db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$user_id = $_SESSION['user_id'];
	$name = $_POST['name'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$last_seen_date = $_POST['last_seen_date'];
	$last_seen_location = $_POST['last_seen_location'];
	$image = $_FILES['file'];
	$status = $_POST['status'];
	$uploadDir = __DIR__ . '/../../uploads/';
	$fileName = uniqid() . '-' . basename($image['name']);
	$uploadFilePath = $uploadDir . $fileName;
	$safePath = 'uploads/' . $fileName;

	// Validation
	if (move_uploaded_file($image['tmp_name'], $uploadFilePath)) {
		echo "File uploaded sucessflly. Stored at: $uploadFilePath";
	}

	$stmt = $conn->prepare("INSERT INTO missing_persons (name, age, gender, last_seen_date, last_seen_location, status, photo, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("ssssssss", $name, $age, $gender, $last_seen_date, $last_seen_location, $status, $safePath, $user_id);

	if ($stmt->execute()) {
		echo "Details recorded sucessfully!";
		$stmt->close();
		$conn->close();
		header('Location: /report');
	} else {
		echo "Error: " . $stmt->error;
		$stmt->close();
		$conn->close();
		header('Location: /report');
	}
}
?>