<?php
session_start();
include('./db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$role = $_POST['role'];

	// Validation
	if (empty($email) || empty($username) || empty($password)) {
		echo "Username, password and email are required.";
		exit();
	}

	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	$stmt = $conn->prepare("INSERT INTO user (email, username, password, role) VALUES (?, ?, ?, ?)");
	$stmt->bind_param("ssss", $email, $username, $hashed_password, $role);

	if ($stmt->execute()) {
		echo "Registration successful!";
		$user_id = $conn->insert_id;
		$_SESSION['user_id'] = $user_id;
	} else {
		echo "Error: " . $stmt->error;
	}
	$stmt->close();
}
$conn->close();
$_SESSION['username'] = $username;
header('Location: /user');
?>