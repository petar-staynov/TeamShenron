<?php 
	function getRole($db, $username) {
		$sql = 'SELECT * FROM users INNER JOIN roles ON users.role_id = roles.role_id WHERE users.username = "'.$username.'"';
		$query = mysqli_query($db, $sql);
		$row = mysqli_fetch_assoc($query);
		return $row;
	}

	function getRegistrations($db, $role_id) {
		$rows = array();
		if ($role_id = 4) {
			$sql = 'SELECT * FROM users WHERE role_id = 3 AND approved = 0';
			$query = mysqli_query($db, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$rows[] = $row;
			}
		}

		return $rows;
	}
?>