<?php
// login.php - Login script
session_start();

// db.php - Include database connection
include('./db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$stmt->store_result();

	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $hashed_password);
		$stmt->fetch();

		if (password_verify($password, $hashed_password)) {
			// Store user information in session
			$_SESSION['user_id'] = $id;
			$_SESSION['username'] = $username;
			echo "Login successful!";
		} else {
			echo "Invalid password!";
		}
	} else {
		echo "No user found with that username!";
	}
	$stmt->close();
}
$conn->close();
?>