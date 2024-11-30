<head>
	<meta charset="utf-8" />
	<!-- <link rel="stylesheet" href="globals.css" /> -->
	<link rel="stylesheet" href="./styles/styleguide.css" />
	<?php echo '<link rel="stylesheet" href="./styles/' . pathinfo(basename($_SERVER['SCRIPT_NAME']), PATHINFO_FILENAME) . '.css" />' ?>
	<?php echo "<title>" . basename($_SERVER['SCRIPT_NAME']) . "</title>" ?>
</head>