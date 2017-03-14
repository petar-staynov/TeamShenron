<?php 
	function getRole($db, $role_id) {
		$sql = 'SELECT * FROM roles WHERE id = "'.$role_id.'"';
		$query = mysqli_query($db, $sql);
		return mysqli_fetch_assoc($query);
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

	function getSchool($db, $school_id) {
		$sql = 'SELECT * FROM schools WHERE id = "'.$school_id.'"';
		$query = mysqli_query($db, $sql);
		return mysqli_fetch_assoc($query);
	}
?>