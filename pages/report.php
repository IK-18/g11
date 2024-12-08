<?php session_start() ?>
<div class="section">
	<img src="http://localhost/images/how-it-work-jpg.png" class="bg how-it-work-jpg"></img>
</div>
<div class="cont-wrapper">
	<div class="container">
		<?php if (!isset($_SESSION['username']) || !isset($_SESSION['user_id'])): ?>
			<div class="heading">
				<div class="text-wrapper-1">How it Works</div>
				<p class="text-wrapper-3">The ReportTerror Site is dedicated to creating awareness and
					increasing
					community engagement as regards Missing, Dead and Unidentified persons.</p>
			</div>
			<div class="heading">
				<div class="text-wrapper-1">How do we hope to achieve this?</div>
				<p class="text-wrapper-3">By providing a platform that allows user list information regarding
					Missing, Found & Unclaimed Persons and Unidentified Bodies.</p>
			</div>
			<div class="div-cont">
				<div class="tag">
					<img src="http://localhost/images/anxiety.png" class="tag-img" alt="">
					<div>
						<div class="text-wrapper-2">Missing Persons</div>
						<p class="text-wrapper-4">A missing person is a person who has disappeared and
							whose status as alive or dead cannot be confirmed as
							their location and condition are not known</p>
					</div>
				</div>
				<div class="tag">
					<img src="http://localhost/images/find-my-friend-png.png" class="tag-img" alt="">
					<div>
						<div class="text-wrapper-2">Found & Unclaimed Persons</div>
						<p class="text-wrapper-4">A Found & Unclaimed Person is a person who has been
							found by someone and whose identity is unknown.</p>
					</div>
				</div>
				<div class="tag">
					<img src="http://localhost/images/face-detection.png" class="tag-img" alt="">
					<div>
						<div class="text-wrapper-2">Unidentified Bodies</div>
						<p class="text-wrapper-4">An Unidentified person is used to describe a corpse of
							a person whose identity cannot be established by
							police, medical examiners or the reporter.</p>
					</div>
				</div>
			</div>
			<img class="flow" src="http://localhost/images/flow.png" alt="">
			<?php include "../views/signup.php" ?>
		<?php else: ?>
			<script>
				document.querySelector('.container').style.minHeight = '80vh';
			</script>
			<form class="form" action="http://localhost/server/scripts/report.php" method="post" >
				<div class="logo">
					<img class="security-shield" src="http://localhost/images/security-shield-2.png" />
					<div class="text-wrapper brand">ReportTerror</div>
				</div>
				<div class="container-6">
					<label for="name" class="text-wrapper-17">Full Name</label>
					<input placeholder="Full Name" type="text" class="input" name="name" id="name">
				</div>
				<div class="container-6">
					<label for="age" class="text-wrapper-17">Age</label>
					<input placeholder="Age" type="number" class="input" name="age" id="age">
				</div>
				<div class="container-6">
					<label for="gender" class="text-wrapper-17">Gender</label>
					<select  class="input" name="gender" id="gender">
						<option value="" disabled selected hidden >Select a gender</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
				</div>
				<div class="container-6 drag-and-drop">
					<label for="image" class="text-wrapper-17">Drag and drop an image of the person here.<br />Or click here to choose a file.</label>
					<input accept="image/*" name="image" type="file" class="input file-input">
					<div class="preview"></div>
					<img src="http://localhost/vectors/profile-circle.svg" alt="">
				</div>
				<button class="submit" role="submit">Submit</button>
				<script>
					const fileUpload = document.querySelector('.drag-and-drop');
					const fileInput = document.querySelector('.file-input');
					const filePreview = document.querySelector('.preview');

					fileUpload.addEventListener('click', () => fileInput.click())
					fileInput.addEventListener('change', (e) => {
						const file = e.target.files[0];
						showFilePreview(file)
					})
					fileUpload.addEventListener('dragover', (e) => {
						e.preventDefault()
						fileUpload.classList.add('dragover')
					})
					fileUpload.addEventListener('dragleave', () => {
						fileUpload.classList.remove('dragover')
					})
					fileUpload.addEventListener('drop', (e) => {
						e.preventDefault();
						fileUpload.classList.remove('dragover')
						const file = e.dataTransfer.files[0]
						fileInput.files = files
						showFilePreview(files)
					})

					const showFilePreview = (file) => {
						filePreview.innerHTML = '';
						if (file) {
							filePreview.innerHTML = `<p>Uploaded: ${file.name}</p>`
						} else {
							filePreview.innerHTML = 'No file selected'
						}
					}
				</script>
			</form>
		<?php endif; ?>
	</div>
</div>