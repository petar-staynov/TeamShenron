<?php 
	if (!$_SESSION['logged']) {
		header("Location: login-form.php");
		exit;
	}
?>