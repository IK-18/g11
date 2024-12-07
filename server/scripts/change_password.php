<?php
session_start();
include('./db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$user_id = $_SESSION['user_id'];
	$old_password = $_POST['old_password'];
	$password = $_POST['password'];
	$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

	$stmt = $conn->prepare("UPDATE user SET password=? WHERE id = ?");
	$stmt->bind_param("ss", $hashed_password, $user_id);
	if ($stmt->execute()) {
		$stmt->close();
		$conn->close();
		header('Location: /profile');
	}
	;
	echo 'Error while updating details';
	$stmt->close();
	$conn->close();
}