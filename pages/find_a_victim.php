<?php session_start() ?>
<!DOCTYPE html>
<html>
<?php include '../views/head.php' ?>

<body>
	<div class="desktop">
		<div class="div"><?php include '../views/navbar.php' ?>
			<div class="section">
				<div class="search-jpg"></div>
			</div>
			<form class="form-section">
				<div class="background">
					<div class="container">
						<div class="options">
							<div class="overlap-group">
								<select class="container-2">
									<option value="location" class="text-wrapper">By Location</option>
									<option value="date" class="text-wrapper">By Date</option>
								</select>
							</div>
						</div>
						<div class="input">
							<input class="container-3" placeholder="First or Last Name or Listing ID" type="text" />
						</div>
						<div class="component-4">
							<img class="component-4-img" src="img/component-3.svg" />
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
						Click on a Poster to get more information.<br />If you have information about anyone listed
						below,<br />Please
						click the poster &amp; fill out the form on the page
					</p>
				</div>
				<div class="heading-search">Search Results</div>
				<div class="results">
					<div class="component-2">
						<div class="div-2"></div>
					</div>
					<div class="component-2">
						<div class="div-2"></div>
					</div>
					<div class="component-3">
						<div class="div-3"></div>
					</div>
				</div>
			</form>
			<div class="person-info-jpg-wrapper">
				<div class="person-info-jpg"></div>
			</div>
			<?php include '../views/footer.html' ?>
		</div>
	</div>
</body>

</html>