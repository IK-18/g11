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
						<p class="text-wrapper-1">Volunteer / Partner with us</p>
					</div>
					<div class="figure">
						<div class="div-cont">
							<p class="p">You make a living by what you get. You make a life by what you give</p>
						</div>
						<div class="div-cont">
							<p class="div-2">
								<span class="span">— </span><span class="text-wrapper-2">Winston Churchill</span>
							</p>
						</div>
					</div>
					<div class="as-a-truly-african-wrapper">
						<p class="as-a-truly-african">
							<span class="text-wrapper-3">As a truly African brand, we understand that a tree does not
								make a forest and are constantly looking
								for volunteers and partners, within and outside the country, to help us<br />drive the
								vision of ReportTerror.
							</span>
						</p>
					</div>
					<div class="info-svg">
						<div class="info-svg-fill">
						</div>
					</div>
					<div class="container-2">
						<div class="container-3">
							<div class="div-cont">
								<p class="div-3">
									Join us at the ReportTerror, let's make a difference!
								</p>
							</div>
							<div class="div-cont">
								<p class="div-3">
									Volunteer your time, skill, and or resources, or partner with us to provide
									psychosocial services,
									financial support, or security / technical expertise
								</p>
							</div>
							<div class="div-cont">
								<div class="div-cont">
									<p class="p">
										No work is insignificant. All labor that uplifts humanity has dignity and
										importance and should
										be undertaken with painstaking excellence.
									</p>
								</div>
								<div class="div-cont">
									<p class="div-2">
										<span class="span">— </span> <span class="text-wrapper-2">Martin luther King
											Jr.</span>
									</p>
								</div>
							</div>
						</div>
						<form class="section-wrapper">
							<div class="section-2">
								<div class="container-4">
									<div class="heading-2">
										<div class="text-wrapper-13">Interested?</div>
									</div>
									<div class="container-5">
										<p class="text-wrapper-14">Fill the form below to get started</p>
									</div>
								</div>
								<div class="form">
									<div class="container-6">
										<label for="name" class="text-wrapper-17">Full Name </label>
										<input placeholder="Full Name" name="name" id="name" type="text"
											class="input" />
									</div>
									<div class="container-6">
										<label for="phone" class="text-wrapper-17">Contact Number</label>
										<input class="input" type="tel" name="phone" id="phone"
											placeholder="+234 1234567890">
									</div>
									<div class="container-6">
										<label for="email" class="text-wrapper-17">Contact Email</label>
										<input class="input" type="email" name="email" placeholder="Email" id="email">
									</div>
									<div class="component-3">
										<div class="text-2">Volunteer / Partner</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<?php include '../views/footer.html' ?>
		</div>
	</div>
</body>

</html>