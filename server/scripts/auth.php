<?php session_start(); ?>
<?php if (!isset($_SESSION['user_id']) || !isset($_SESSION['username'])): ?>
	<script>
		window.location.href = 'http://localhost/home?modal=login'
	</script>
	<?php exit(); ?>
<?php endif; ?>