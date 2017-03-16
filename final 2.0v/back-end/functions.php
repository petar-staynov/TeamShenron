<?php 
function getRole($db, $role_id) {
	$sql = 'SELECT * FROM roles WHERE id = "'.$role_id.'"';
	$query = mysqli_query($db, $sql);
	return mysqli_fetch_assoc($query);
}

function getRegistrations($db, $role_id) {
	$rows = array();
	switch ($role_id) {
		case 4:
		$sql = 'SELECT * FROM users WHERE role_id = 3  AND approved = 0';
		$query = mysqli_query($db, $sql);
		while ($row = mysqli_fetch_assoc($query)) {
			$rows[] = $row;
		}
		return $rows;
		break;
		case 3:
		$sql = 'SELECT * FROM users WHERE role_id = 2 AND approved = 0';
		$query = mysqli_query($db, $sql);
		while ($row = mysqli_fetch_assoc($query)) {
			$rows[] = $row;
		}
		return $rows;
		break;
		case 2:
		$sql = 'SELECT * FROM users WHERE role_id = 1 AND approved = 0';
		$query = mysqli_query($db, $sql);
		while ($row = mysqli_fetch_assoc($query)) {
			$rows[] = $row;
		}
		return $rows;
		break;
	}

}

function getSchool($db, $school_id) {
	$sql = 'SELECT * FROM schools WHERE id = "'.$school_id.'"';
	$query = mysqli_query($db, $sql);
	return mysqli_fetch_assoc($query);
}

function getClass($db, $class_id) {
	$sql = 'SELECT * FROM classes WHERE id = "'.$class_id.'"';
	$query = mysqli_query($db, $sql);
	return mysqli_fetch_assoc($query);
}

function getClasses($db, $school_id) {
	$rows = [];
	$sql = 'SELECT * FROM classes WHERE approved = 0';
	$query = mysqli_query($db, $sql);
	while ($row = mysqli_fetch_assoc($query)) {
			$rows[] = $row;
		}
		return $rows;
}

function getTeacher($db, $teacher_id) {
	$sql = 'SELECT * FROM users WHERE id= "'.$teacher_id.'"';
	$query = mysqli_query($db, $sql);
	return mysqli_fetch_assoc($query);
}



?>