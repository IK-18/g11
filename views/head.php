<head>
	<meta charset="utf-8" />
	<link rel="icon" href="http://localhost/security-shield-2.png" type="image/png">
	<link rel="stylesheet" href="http://localhost/styles/styleguide.css" />
	<link rel="stylesheet" href="http://localhost/styles/global.css">
	<link rel="stylesheet" id="dynamic_link" >
	<meta
		name='viewport'
		content='width=device-width, initial-scale=1.0'
	/>
	<script>
		window.addEventListener('popstate', (e) => {
			if (e.state && e.state.path) {
				fetch(e.state.path).then(res => res.text()).then((res) => {
					document.querySelector(".div").innerHTML = res;
				});
			}
		})

		document.addEventListener('DOMContentLoaded', () => {
			let cont = document.querySelector(".div");
			let page = window.location.pathname.split('/').pop()
			if (!page || page === '' || page.length === 0) {
				page = 'home'
			}
			let link = document.querySelector("#dynamic_link");
			if (page === "home") {
				link.href = `http:\/\/localhost/styles/index.css`
				document.title = "ReportTerror";
			} else {
				link.href = `http:\/\/localhost/styles/${page}.css`
				let title = page
				title = title.split('_')
				title.forEach((word, index) => {
					title[index] = word[0].toUpperCase() + word.slice(1)
				})
				title = title.join(' ')
				document.title = title;
			}
			fetch(`http://localhost/pages/${page}.php`).then(res => res.text()).then((res) => {
				cont.innerHTML = res;
				let tempDiv = document.createElement('div')
				tempDiv.innerHTML = res;
				let scripts = tempDiv.querySelectorAll('script')
				console.log(scripts)
				scripts.forEach(script => eval(script.innerHTML))
			});
			<?php if (!isset($_SESSION['user_id']) || !isset($_SESSION['username'])): ?>
				<?php if (isset($_GET['modal'])): ?>
					<?php if ($_GET['modal'] === 'signup'): ?>
						let overlay = document.getElementById('overlay');
						fetch('http:\/\/localhost/views/signup.php').then(res => res.text()).then((res) => {
							overlay.innerHTML = res;
						})
						overlay.classList.remove('none');
						document.body.style.overflow = 'hidden';
					<?php elseif ($_GET['modal'] === 'login'): ?>
						let overlay = document.getElementById('overlay');
						fetch('http:\/\/localhost/views/login.php').then(res => res.text()).then((res) => {
							overlay.innerHTML = res;
						})
						overlay.classList.remove('none');
						document.body.style.overflow = 'hidden';
					<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>
		})
	</script>
</head>