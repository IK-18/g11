<?php
include '../server/scripts/auth.php';
include '../server/scripts/db.php';
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT username, email FROM user WHERE id = ?");
$stmt->bind_param("s", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
?>
<div class="container">
	<div class="status"></div>
	<header class="heading">Profile Info</header>
	<form action="">
		<label class="text-wrapper-17">Username</label>
		<?php echo '<input name="username" value=' . $user['username'] . ' class="info_value input" disabled >' ?>
		<label class="text-wrapper-17">Email</label>
		<?php echo '<input name="email" value=' . $user['email'] . ' class="info_value input" disabled >' ?>
		<div class="button-cont">
			<button class="submit profile_edit">Edit</button>
			<button class="submit profile_submit">Submit</button>
		</div>
	</form>
	<header class="heading">Change Password</header>
	<form action="">
		<label class="text-wrapper-17">Old Password</label>
		<div class="input-cont">
			<input placeholder="Old Password" name="old_password" id="old_password" type="password" class="input" />
			<div onclick="
				let input = document.getElementById('old_password');
				let toggle = document.getElementById('old_toggle');
				if (input.type === 'password') {
					toggle.src = 'http:\/\/localhost/vectors/eye-slash.svg'
					input.type = 'text';
				} else {
					toggle.src = 'http:\/\/localhost/vectors/eye.svg';
					input.type = 'password';
				}" class="pass_toggle"><img id="old_toggle" src="http://localhost/vectors/eye.svg" alt="">
			</div>
		</div>
		<label class="text-wrapper-17">New Password</label>
		<div class="input-cont">
			<input placeholder="New Password" name="password" id="password" type="password" class="input" />
			<div onclick="
				let input = document.getElementById('password');
				let confirm = document.getElementById('confirm_password');
				let toggle = document.getElementById('toggle');
				if (input.type === 'password') {
					toggle.src = 'http:\/\/localhost/vectors/eye-slash.svg'
					input.type = 'text';
					confirm.type = 'text'
				} else {
					toggle.src = 'http:\/\/localhost/vectors/eye.svg';
					input.type = 'password';
					confirm.type = 'password'
				}" class="pass_toggle"><img id="toggle" src="http://localhost/vectors/eye.svg" alt="">
			</div>
		</div>
		<label class="text-wrapper-17">Confirm Password</label>
		<div class="input-cont">
			<input placeholder="Cofirm Password" onchange="
			let new = document.getElementById('password');
			let confirm = document.getElementById('new_password');
			if (old.value !== new.value) {
				document.querySelector('.submit').disabled = true;
			}
			" id="confirm_password" type="password" class="input" />
		</div>
		<button class="submit" type="submit">Submit</button>
	</form>
</div>