<?php 
	require_once 'db.php';

	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$sql = 'SELECT * FROM classes WHERE school_id = "'.$id.'"';
		$query = mysqli_query($db, $sql);

		while ($row = mysqli_fetch_assoc($query)) { ?>
			<option value="<?= $row['id'] ?>"><?= $row['class_num'] . $row['class_letter'] ?></option>
<?php	}
	}
?>