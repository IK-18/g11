<div class="navbar">
	<a href="" class="logo">
		<img class="security-shield" src="/images/security-shield-2.png" />
		<div class="text-wrapper">ReportTerror</div>
	</a>
	<a href="/find_a_victim" class="link-wrapper">Find a Victim</a>
	<div class="dropdown">
		<a href="/report" class="link-wrapper">Make A Report</a>
		<div class="subs">
			<a href="/report" class="link-wrapper">Report a Missing Person</a>
			<a href="/anonymous" class="link-wrapper">Submit an Anonymous Tip</a>
		</div>
	</div>
	<a href="/get_help" class="link-wrapper">Get Help
	</a>
	<a href="/find_a_station" class="link-wrapper">Find A Station</a>
	<a href="/resources" class="link-wrapper">Resources</a>
	<div class="dropdown">
		<a href="/support" class="link-wrapper">Support</a>
		<div class="subs">
			<a href="/donate" class="link-wrapper">Donate</a>
			<a href="/volunteer" class="link-wrapper">Volunteer</a>
		</div>
	</div>
	<div class="dropdown">
		<a href="/contact" class="link-wrapper">Contact</a>
		<div class="subs">
			<a href="/faq" class="link-wrapper">FAQ</a>
			<a href="/contact" class="link-wrapper">Reach Out</a>
		</div>
	</div>
	<a href="/about" class="link-wrapper">About Us</a>
	<?php if (!isset($_SESSION['user_id']) || !isset($_SESSION['username'])): ?>
		<a href="" onclick="
		event.preventDefault();
		let overlay = document.getElementById('overlay');
		fetch('http:\/\/localhost/views/signup.php').then(res => res.text()).then((res) => {
			overlay.innerHTML = res;
		})
		overlay.classList.remove('none');
		document.body.style.overflow = 'hidden';
		" class="get-started">
			<div class="text-wrapper-10">Get Started</div>
		</a>
	<?php else: ?>
		<?php $username = $_SESSION['username']; ?>
		<div class="user_dropdown get-started">
			<div class="user-get-started">
				<div class="text-wrapper-10">Hi <?php echo $username ?>!</div>
			</div>
			<div class="subs">
				<a href="/user" class="link-wrapper">Reports and Data</a>
				<a href="/profile" class="link-wrapper">Profile</a>
				<a href="/server/scripts/logout.php" class="link-wrapper">Logout</a>
			</div>
		</div>
	<?php endif; ?>
</div>