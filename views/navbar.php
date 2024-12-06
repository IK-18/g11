<div class="navbar">
	<a href="http://localhost" class="logo">
		<img class="security-shield" src="http://localhost/images/security-shield-2.png" />
		<div class="text-wrapper">ReportTerror</div>
	</a>
	<a href="http://localhost/find_a_victim" class="link-wrapper">Find a Victim</a>
	<div class="dropdown">
		<a href="http://localhost/report" class="link-wrapper">Make A Report</a>
		<div class="subs">
			<a href="http://localhost/report" class="link-wrapper">Report a Missing Person</a>
			<a href="http://localhost/anonymous" class="link-wrapper">Submit an Anonymous Tip</a>
		</div>
	</div>
	<a href="http://localhost/get_help" class="link-wrapper">Get Help
	</a>
	<a href="http://localhost/find_a_station" class="link-wrapper">Find A Station</a>
	<a href="http://localhost/resources" class="link-wrapper">Resources</a>
	<div class="dropdown">
		<a href="http://localhost/support" class="link-wrapper">Support</a>
		<div class="subs">
			<a href="http://localhost/donate" class="link-wrapper">Donate</a>
			<a href="http://localhost/volunteer" class="link-wrapper">Volunteer</a>
		</div>
	</div>
	<div class="dropdown">
		<a href="http://localhost/contact" class="link-wrapper">Contact</a>
		<div class="subs">
			<a href="http://localhost/faq" class="link-wrapper">FAQ</a>
			<a href="http://localhost/contact" class="link-wrapper">Reach Out</a>
		</div>
	</div>
	<a href="http://localhost/about" class="link-wrapper">About Us</a>
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
		<a href="/user" class="get-started">
			<div class="text-wrapper-10">Hi <?php echo $username ?> !</div>
		</a>
	<?php endif; ?>
</div>