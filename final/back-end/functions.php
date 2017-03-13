<?php 
	function getRole($db, $username) {
		$sql = 'SELECT * FROM users INNER JOIN roles ON users.role_id = roles.id WHERE users.username = "'.$username.'"';
		$query = mysqli_query($db, $sql);
		$row = mysqli_fetch_assoc($query);
		return $row;
	}
?>