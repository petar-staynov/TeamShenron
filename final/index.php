<?php 
	include_once 'back-end/is-logged.php';
	include_once 'back-end/functions.php';
	include_once 'back-end/db.php';

	if (!$_SESSION['user_info']['approved']) {
		header("Location: not-approved.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<?php 
		include_once 'includes/head.php';
	?>
</head>
<body>
	<?php
		include_once 'includes/sidebar.php';
	?>

  	<div class="pusher">
    	<?php 
    		include_once 'includes/header.php';
    	?>
    	<div class="ui container" style="margin-top: 100px;">
    		<?php 
    			$role = getRole($db, $_SESSION['user_info']['role_id']);
    			include_once 'includes/' . $role['role_index'];
    		?>
    	</div>
  	</div>
</body>
</html>