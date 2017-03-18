<?php 
	include_once 'check-director.php';

	if (isset($_GET['id'])) {
		$id = intval($_GET['id']);

		$sql = 'UPDATE users SET approved = 1 WHERE id = "'.$id.'"';
		if (mysqli_query($db, $sql)) {
			header("Location: ../index.php?approved=1");
			exit;
		}
		else {
			echo "Възникна проблем с одобряването на потребителя";
		}
	}
?>