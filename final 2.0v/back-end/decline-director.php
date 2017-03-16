<?php 
	include_once 'check-admin.php';

	if (isset($_GET['id'])) {
		$id = intval($_GET['id']);

		$sql = 'SELECT * FROM users WHERE id = "'.$id.'" AND approved = 0';
		if (mysqli_query($db, $sql)) {
			$sql = 'DELETE FROM users WHERE id = "'.$id.'"';
			if (mysqli_query($db, $sql)) {
				header("Location: ../index.php?declined=1");
				exit;
			}
			else {
				echo "Възникна проблем с премахването на потребителя";
			}
		}
		else {
			echo "Възникна проблем с премахването на потребителя";
		}
	}
?>