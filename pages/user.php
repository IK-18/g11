<?php
include '../server/scripts/auth.php';
include '../server/scripts/db.php';
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT id, name, age, gender FROM missing_persons WHERE user_id = ?");
$stmt->bind_param("s", $user_id);
$stmt->execute();
$reports = $stmt->get_result();
$stmt->close();
$stmt = $conn->prepare("SELECT id, amount, tran_reference, tran_date FROM donations WHERE user_id = ?");
$stmt->bind_param("s", $user_id);
$stmt->execute();
$donations = $stmt->get_result();
$stmt->close();
?>
<div class="container">
	<header class="heading">Reports</header>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Age</th>
				<th>Gender</th>
			</tr>
		</thead>
		<tbody>
			<?php if ($reports->num_rows > 0) {
				while ($row = $reports->fetch_assoc()) {
					echo '<tr>';
					echo '<td>' . $row['id'] . '</td>';
					echo '<td>' . $row['name'] . '</td>';
					echo '<td>' . $row['age'] . '</td>';
					echo '<td>' . $row['gender'] . '</td>';
					echo '</tr>';
				}
			} else {
				echo '<tr><td class="no_record" rowspan="10" colspan="4">No records found</td></tr>';
			} ?>
		</tbody>
	</table>
	<header class="heading">Donations</header>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Amount</th>
				<th>Transaction Reference</th>
				<th>Transaction Date</th>
			</tr>
		</thead>
		<tbody>
			<?php if ($donations->num_rows > 0) {
				while ($row = $donations->fetch_assoc()) {
					echo '<tr>';
					echo '<td>' . $row['id'] . '</td>';
					echo '<td>' . $row['amount'] . '</td>';
					echo '<td>' . $row['tran_reference'] . '</td>';
					echo '<td>' . $row['tran_date'] . '</td>';
					echo '</tr>';
				}
			} else {
				echo '<tr><td class="no_record" rowspan="10" colspan="4">No records found</td></tr>';
			} ?>
		</tbody>
	</table>
</div>