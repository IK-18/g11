<?php
// db.php - Database connection
$host = 'localhost';
$db = 'your_database';
$user = 'your_username';
$pass = 'your_password';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// register.php - Registration script
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Validation
	if (empty($username) || empty($password)) {
		echo "Username and password are required.";
		exit();
	}

	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
	$stmt->bind_param("ss", $username, $hashed_password);

	if ($stmt->execute()) {
		echo "Registration successful!";
	} else {
		echo "Error: " . $stmt->error;
	}
	$stmt->close();
}
$conn->close();
?>