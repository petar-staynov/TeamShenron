<?php 
	session_start();

	if (!$_SESSION['logged'] && !$_SESSION['user_info']['approved']) {
		header("Location: login-form.php");
		exit;
	}
?>