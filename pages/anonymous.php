<?php
include '../server/scripts/auth.php';
?>
<script>
	document.querySelector('.container').style.minHeight = '80vh';
</script>
<div class="section">
	<img src="http://localhost/images/how-it-work-jpg.png" class="bg how-it-work-jpg"></img>
</div>
<div class="cont-wrapper">
	<div class="container">
		<div class="heading">Submit an Anonymous Tip</div>
		<p class="text-wrapper-3">Share crucial details anonymously about missing persons, unidentified bodies, or any
			relevant information</p>
		<form class="form" action="http://localhost/server/scripts/anonymous.php" method="post">
			<label class="text-wrapper-17" for="tip">Your Anonymous Tip:</label>
			<textarea maxlength="255" class="tip" id="tip" name="tip"
				placeholder="Share your confidential information here. Be as detailed and specific as possible."
				required>
			</textarea>
			<button type="submit" class="submit">Submit</button>
		</form>
	</div>
</div>