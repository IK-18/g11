<?php session_start() ?>
<!DOCTYPE html>
<html>
<?php include '../views/head.php' ?>

<body>
	<div class="desktop">
		<div class="div">
			<?php include '../views/navbar.php' ?>
			<div class="section">
				<div class="contact-jpg"></div>
			</div>
			<div class="container-wrapper">
				<form class="background-shadow-3">
					<div class="heading">
						<div class="text-wrapper-4">Contact Us</div>
					</div>
					<div class="form">
						<div class="container-6">
							<label for="name" class="text-wrapper-17">Full Name </label>
							<input placeholder="Full Name" name="name" id="name" type="text" class="input" />
						</div>
						<div class="container-6">
							<label for="email" class="text-wrapper-17">Email </label>
							<input placeholder="Email" name="email" id="email" type="email" class="input" />
						</div>
						<div class="container-6">
							<label for="name" class="text-wrapper-17">Message </label>
							<input placeholder="Message" name="message" id="message" type="textarea" class="input" />
						</div>
						<div class="component-4">
							<div class="text-3">Submit</div>
						</div>
					</div>
				</form>
			</div>
			<?php include '../views/footer.html' ?>
		</div>
	</div>
</body>

</html>