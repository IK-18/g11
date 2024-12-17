<?php
session_start();
include '../server/scripts/db.php';
$stmt = $conn->prepare("SELECT id, name, age, gender, photo, last_seen_date, last_seen_location, status FROM missing_persons LIMIT 3");
$stmt->execute();
$persons = $stmt->get_result();
$stmt->close();
?>
<div class="section">
	<img src="/images/search-jpg.png" class="bg search-jpg"></img>
</div>
<form class="form-section">
	<div class="background">
		<div class="container">
			<div class="options">
				<div class="overlap-group">
					<select class="container-2">
						<option value="location" class="text-wrapper-1">By Location</option>
						<option value="date" class="text-wrapper-1">By Date</option>
					</select>
				</div>
			</div>
			<div class="input">
				<input class="container-3" placeholder="First or Last Name or Listing ID" type="text" />
			</div>
			<div class="component-4">
				<img class="component-4-img" src="/images/component-3.svg" />
			</div>
		</div>
	</div>
	<div class="component">
		<div class="component-5">
			<div class="symbol"></div>
			<div class="filter">Filter</div>
		</div>
		<div class="component-6">
			<div class="text">Clear Filter</div>
		</div>
	</div>
	<div class="heading">
		<p class="click-on-a-poster-to">
			If you have information about anyone listed
			below,<br />Please
			click the poster &amp; fill out the form on the page
		</p>
	</div>
	<div class="heading-search">Search Results</div>
	<div class="results">
		<?php if ($persons->num_rows > 0): ?>
			<?php while ($row = $persons->fetch_assoc()): ?>
				<div class="component-2">
					<div class="div-2">
						<?php echo '<img src="' . $row['photo'] . '" alt="">' ?>
						<?php echo '<p>Name: ' . $row['name'] . '</p>' ?>
						<?php echo '<p>Age: ' . $row['age'] . '</p>' ?>
						<?php echo '<p>Gender: ' . $row['gender'] . '</p>' ?>
						<?php echo '<p>Last Seen Date: ' . $row['last_seen_date'] . '</p>' ?>
						<?php echo '<p>Last Seen Location: ' . $row['last_seen_location'] . '</p>' ?>
						<?php echo '<p>Status: ' . $row['status'] . '</p>' ?>
					</div>
				</div>
			<?php endwhile; ?>
		<?php else: ?>
			echo '<tr>
				<td class="no_record" rowspan="10" colspan="4">No records found</td>
			</tr>';
		<?php endif; ?>
	</div>
</form>
<div class="person-info-jpg-wrapper">
	<div class="person-info-jpg"></div>
</div>