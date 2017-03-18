<?php 
	require_once 'db.php';

	if (isset($_GET['region'])) {
		$region = $_GET['region'];

		$sql = 'SELECT * FROM schools WHERE region = "'.$region.'"';
		$query = mysqli_query($db, $sql);

		$temp = 0;
		while ($row = mysqli_fetch_assoc($query)) { ?> 
			<option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
	<?php	$temp++;
		}
	}
?>