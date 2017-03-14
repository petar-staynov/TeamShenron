<?php 
	include_once 'check-admin.php';

	if (isset($_GET['id'])) {
		$id = intval($_GET['id']);

		$sql = 'UPDATE users SET approved = 1 WHERE id = "'.$id.'"';
		if (mysqli_query($db, $sql)) {
			$sql = 'SELECT * FROM users WHERE id = "'.$id.'"';
			$query = mysqli_query($db, $sql);
			$user = mysqli_fetch_assoc($query);

			$subject = "Регистрация в school.bg";
       	 	$messsage = "Регистрацията ви в school.bg е одобрена. Вече можете да влезете в профила си";
        	$headers = "From: school.bg";
			
			if (mail($user['email'], $subject, $messsage, $headers);) {
				header("Location: ../index.php?approved=1");
				exit;
			}
			else {
				echo "Email не беше изпратен до $user['email']";
			}
		}
		else {
			echo "Възникна проблем с одобряването на потребителя";
		}
	}
?>