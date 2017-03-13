<?php 
	session_start();

	if (!$_SESSION['logged']) {
		header("Location: login-form.php");
		exit;
	}
?>