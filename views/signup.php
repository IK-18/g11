<form method="post" action="/server/scripts/register.php" class="signup_form form">
	<div class="logo">
		<img class="security-shield" src="/images/security-shield-2.png" />
		<div class="text-wrapper brand">ReportTerror</div>
	</div>
	<div class="container-6">
		<label for="email" class="text-wrapper-17">Email</label>
		<input placeholder="Email" name="email" id="email" type="email" required class="input" />
	</div>
	<div class="container-6">
		<label for="username" class="text-wrapper-17">Username</label>
		<input placeholder="Username" name="username" id="username" required type="text" class="input" />
	</div>
	<div class="container-6 password">
		<label for="name" class="text-wrapper-17">Password</label>
		<div class="input-cont">
			<input placeholder="Password" name="password" id="password" type="password" class="input" />
			<div onclick="
						let input = document.getElementById('password');
						let toggle = document.getElementById('toggle');
						if (input.type === 'password') {
							toggle.src = 'http:\/\/localhost/vectors/eye-slash.svg'
							input.type = 'text';
						} else {
							toggle.src = 'http:\/\/localhost/vectors/eye.svg';
							input.type = 'password';
						}" class="pass_toggle"><img id="toggle" src="/vectors/eye.svg" alt="">
			</div>
		</div>
	</div>
	<input type="hidden" name="role" value="user">
	<button role="submit" class="submit">Register</button>
	<div>Already have an account? <a href="" onclick="
	event.preventDefault();
	let overlay = document.getElementById('overlay');
	fetch('http:\/\/localhost/views/login.php').then(res => res.text()).then((res) => {
		overlay.innerHTML = res;
	})
	overlay.classList.remove('none');
	document.body.style.overflow = 'hidden';
	">Login!</a></div>
</form>