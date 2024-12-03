<head>
	<meta charset="utf-8" />
	<!-- <link rel="stylesheet" href="globals.css" /> -->
	<link rel="stylesheet" href="./styles/styleguide.css" />
	<?php echo '<link rel="stylesheet" href="http://localhost/styles/' . pathinfo(basename($_SERVER['SCRIPT_NAME']), PATHINFO_FILENAME) . '.css" />' ?>
	<?php
	$title = pathinfo(basename($_SERVER['SCRIPT_NAME']), PATHINFO_FILENAME);
	$title = str_replace("_", " ", $title);
	echo "<title>" . ucwords($title) . "</title>";
	?>
</head>