<?php
session_start();
include('./db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$stmt = $conn->prepare("SELECT id, password, role FROM user WHERE username = ?");
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$stmt->store_result();

	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $hashed_password, $role);
		$stmt->fetch();
		echo gettype($hashed_password) . '<br />';
		echo $id . '<br />';
		echo $password . '<br />';
		echo gettype(password_verify($password, $hashed_password)) . '<br />';
		echo "Here: " . password_verify($password, $hashed_password);

		if (password_verify($password, $hashed_password)) {
			// Store user information in session
			$_SESSION['user_id'] = $id;
			$_SESSION['username'] = $username;
			echo $id;
			echo $username;
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
// header('Location: /user');
?>