<?php
// db.php - Database connection
$host = 'localhost';
$db = 'report_terror';
$user = 'terror_admin';
$pass = 'Ikponmwosa2002*';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
?>