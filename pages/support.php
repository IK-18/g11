<?php session_start() ?>
<!DOCTYPE html>
<html>
<?php include '../views/head.php' ?>

<body>
	<div class="desktop">
		<div class="div">
			<?php include '../views/navbar.php' ?>
			<div class="section">
				<div class="volunteer-bg-jpg"></div>
			</div>
			<div class="container-wrapper">
				<div class="container">
					<div class="heading">
						<div class="text-wrapper-1">Can you help us?</div>
					</div>
					<div class="div-cont">
						<div class="component-wrapper">
							<a href="http://localhost/pages/volunteer.php" class="component">
								<div class="component-png"></div>
								<div class="text">Volunteer/Partner</div>
							</a>
						</div>
						<div class="component-wrapper">
							<a href="http://localhost/pages/donate.php" class="component">
								<div class="component-png"></div>
								<div class="text">Donate Resources</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<?php include '../views/footer.html' ?>
		</div>
	</div>
</body>

</html>