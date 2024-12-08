<?php
session_start();
include './db.php';
$rows_per_page = isset($_GET["rows"]) ? intval($_GET["rows"]) : 10;
$page = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
$offset = ($page - 1) * $rows_per_page;

if (!isset($_GET['search']) || $_GET['search'] === '') {
	$total_rows_result = $conn->query("SELECT COUNT(*) AS total_rows FROM stations");
	$total_rows = $total_rows_result->fetch_assoc()['total_rows'];
	$stmt = $conn->prepare('SELECT * FROM stations LIMIT ? OFFSET ?');
	$stmt->bind_param('ii', $rows_per_page, $offset);
	$stmt->execute();
	$result = $stmt->get_result();

	$rows = [];
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
	}

	$total_pages = ceil($total_rows / $rows_per_page);

	header('Content-Type: application/json');
	echo json_encode([
		'rows' => $rows,
		'total_pages' => $total_pages,
		'current_page' => $page,
		'rows_per_page' => $rows_per_page
	]);
} else {
	$search = '%' . $_GET['search'] . '%';
	$stmt = $conn->prepare('SELECT COUNT(*) AS total_rows FROM stations WHERE address LIKE ?');
	$stmt->bind_param('s', $search);
	$stmt->execute();
	$stmt->bind_result($total_rows);
	$stmt->fetch();
	$stmt->close();
	$stmt = $conn->prepare("SELECT * FROM stations WHERE address LIKE ? LIMIT ? OFFSET ?");
	$stmt->bind_param('sii', $search, $rows_per_page, $offset);
	$stmt->execute();
	$result = $stmt->get_result();

	$rows = [];
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
	}

	$total_pages = ceil($total_rows / $rows_per_page);

	header('Content-Type: application/json');
	echo json_encode([
		'rows' => $rows,
		'total_pages' => $total_pages,
		'current_page' => $page,
		'rows_per_page' => $rows_per_page
	]);
}

$conn->close();
?>