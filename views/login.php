<form method="post" action="/server/scripts/login.php" class="login_form form">
	<div class="logo">
		<img class="security-shield" src="/images/security-shield-2.png" />
		<div class="text-wrapper">ReportTerror</div>
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
	<button role="submit" class="submit">Login</button>
	<div>Don't have an account yet? <a href="" onclick="
	event.preventDefault();
	let overlay = document.getElementById('overlay');
	fetch('http:\/\/localhost/views/signup.php').then(res => res.text()).then((res) => {
		overlay.innerHTML = res;
	})
	overlay.classList.remove('none');
	document.body.style.overflow = 'hidden';
	">Sign Up!</a></div>
</form>