<?php 
	include_once 'check-director.php';

	if (isset($_GET['id'])) {
		$id = intval($_GET['id']);

		$sql = 'UPDATE classes SET approved = 2 WHERE id = "'.$id.'"';
		if (mysqli_query($db, $sql)) {
			header("Location: ../index.php?approved=2");
			exit;
		}
		else {
			echo "Възникна проблем с одобряването на класа";
		}
	}
?>