<?php session_start() ?>
<div class="section">
	<img src="/images/volunteer-bg-jpg.png" class="bg volunteer-bg-jpg"></img>
</div>
<div class="container-wrapper">
	<div class="container">
		<div class="heading">
			<div class="text-wrapper-1">Can you help us?</div>
		</div>
		<div class="div-cont">
			<div class="component-wrapper">
				<a href="/pages/volunteer.php" onclick='
	event.preventDefault();
	let link = document.querySelector("#dynamic_link");
	link.href = "http:\/\/localhost/styles/volunteer.css"
	document.title = "Volunteer";
	fetch("http:\/\/localhost/pages/volunteer.php").then(res => res.text()).then((res) => {
		let cont = document.querySelector(".div");
		cont.innerHTML = res;
	});
	history.pushState({path: "volunteer"}, "", "volunteer");
	' class="component">
					<div class="component-png">
						<img class="component-img" src="/images/volunteer.png" alt="">
					</div>
					<div class="text">Volunteer/Partner</div>
				</a>
			</div>
			<div class="component-wrapper">
				<a href="/pages/donate.php" onclick='
	event.preventDefault();
	let link = document.querySelector("#dynamic_link");
	link.href = "http:\/\/localhost/styles/donate.css"
	document.title = "Donate";
	fetch("http:\/\/localhost/pages/Donate.php").then(res => res.text()).then((res) => {
		let cont = document.querySelector(".div");
		cont.innerHTML = res;
	});

	history.pushState({path: "Donate"}, "", "Donate");
	' class="component">
					<div class="component-png">
						<img class="component-img" src="/images/donate.png" alt="">
					</div>
					<div class="text">Donate Resources</div>
				</a>
			</div>
		</div>
	</div>
</div>