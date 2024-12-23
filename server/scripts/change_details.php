<?php
session_start();
include('./db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$user_id = $_SESSION['user_id'];
	$username = $_POST['username'];
	$email = $_POST['email'];

	$stmt = $conn->prepare("UPDATE user SET username=?, email=? WHERE id = ?");
	$stmt->bind_param("sss", $username, $email, $user_id);
	if ($stmt->execute()) {
		$_SESSION['username'] = $username;
		$stmt->close();
		$conn->close();
		header('Location: /profile?status=success');
	}
	echo 'Error while updating details';
	$stmt->close();
	$conn->close();
	header('Location: /profile?status=failed');
}