<?php 
	include_once 'is-logged.php';
	include_once 'db.php';
	include_once 'functions.php';

	$role = getRole($db, $_SESSION['user_info']['role_id']);

	if ($role['name'] != "Админ") {
		header("Location: ../index.php");
		exit;
	}
?>