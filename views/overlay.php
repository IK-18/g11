<?php
@session_start();
if (isset($_GET['modal'])) {
	$modal = $_GET['modal'];
}
?>
<div id="overlay" onclick="
let overlay = document.getElementById('overlay');
if (event.target === overlay) {
overlay.classList.add('none');
document.body.style.overflow = '';
}
" class="modal none">
</div>