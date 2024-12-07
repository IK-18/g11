<?php session_start() ?>
<div class="overlap">
	<div class="group">
		<div class="overlap-group">
			<img class="reunited" src="http://localhost/images/reunited-2.png" />
			<div class="rectangle"></div>
		</div>
	</div>
	<div class="group-2">
		<div class="text-wrapper-11">Welcome to ReportTerror</div>
		<p class="p">Empowering communities with a safe way to report
			and prevent potential threats.</p>
		<p class="text-wrapper-12">Join us in our mission to combat terrorism and
			ensure safety for all.</p>
	</div>
</div>
<div class="group-3">
	<div class="text-wrapper-20">Submit reports anonymously</div>
	<p class="text-wrapper-21">Learn, report and stay safe with us</p>
	<a href="?modal=signup" onclick="
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
</div>
<div class="overlap-wrapper">
	<div class="form-wrapper">
		<div class="search">
			<div class="find-missing-wrapper">
				<p class="find-missing">
					<span class="span">Find Missing</span>
					<span class="text-wrapper-16">, </span>
					<span class="span">Unidentified</span>
					<span class="text-wrapper-16">, </span>
					<span class="span">Found</span>
					<span class="text-wrapper-16"> &amp; </span>
					<span class="span">Unclaimed</span>
					<span class="text-wrapper-16">
						Persons</span>
				</p>
			</div>
			<div class="overlay-shadow">
				<div class="input-enter-first">
					<div class="div-wrapper">
						<p class="text-wrapper-17">Enter First Name, Last Name, or
							another keyword…</p>
					</div>
				</div>
				<div class="component-2">
					<div class="text"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="section">
	<div class="component">
		<div class="recruitment-png"></div>
		<div class="container">
			<div class="text-wrapper-13">I&#39;m looking for someone</div>
			<p class="search-the-missing">Search the missing Persons Project Database
				for<br />someone</p>
		</div>
	</div>
	<div class="component">
		<div class="skills-png"></div>
		<div class="container">
			<p class="text-wrapper-13">I want to register someone missing</p>
			<p class="upload-information">
				Upload information of a missing loved one or
				friend.<br />Provide details- last know
				whereabouts, Physical<br />Appearance etc.
			</p>
		</div>
	</div>
	<div class="component">
		<div class="find-my-friend-png"></div>
		<div class="container">
			<p class="text-wrapper-13">
				I found someone but don&#39;t know who they are
			</p>
			<p class="upload-information-2">
				Upload information about someone You&#39;ve
				found but<br />unable to ascertain their
				identity. Increase the chances<br />of their
				loved ones finding them.
			</p>
		</div>
	</div>
</div>
<div class="section-2">
	<div class="heading-get">Get Involved</div>
	<div class="paragraph">
		<p class="text-wrapper-18">Nigeria is rated to have the highest incidence of
			missing persons in Africa,<br />worsening cases of insecurity and conflicts.</p>
	</div>
	<div class="component-3">
		<a href="http://localhost/support" target="_blank" rel="noopener noreferrer">
			<div class="text-2">What can you do?</div>
		</a>
	</div>
</div>