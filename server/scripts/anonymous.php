<?php
session_start();
include('../utils/encryption.php');
include('./db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$key = $_ENV['SECRET_KEY'];
	$tip = $_POST['tip'];
	$encryptedText = encryptText($tip, $key);

	$stmt = $conn->prepare('INSERT INTO anonymous (tip) VALUES (?)');
	$stmt->bind_param('s', $encryptedText);
	$stmt->execute();
	$stmt->close();
	$conn->close();
	header('Location: /anonymous');
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	$stmt = $conn->prepare('SELECT tip FROM anonymous');
	$stmt->execute();
	$result = $stmt->get_result();

	$tips = array();
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$tips[] = $row;
		}
	}
	$stmt->close();
	$conn->close();
	header('Content-Type: application/json');
	echo json_encode($tips);
}