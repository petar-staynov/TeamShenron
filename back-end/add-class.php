<?php
include('db.php');
session_start();

if (isset($_POST['submit'])) {
	$school_id = $_POST['school_id'];
	$class_num = $_POST['class_num'];
	$class_letter = $_POST['class_letter'];
	$teacher_id = $_POST['teacher_id'];

	//Check if class exists
	$sql = 'SELECT * FROM clases WHERE school_id = "'.$school_id.'" AND class_num = "'.$class_num.'" AND class_letter = "'.$class_letter.'"';
	$query = mysqli_query($db, $sql);
	if (mysqli_num_rows($query)) {
		header("Location: ../index.php?exists=1");
		exit;
	}

	//Insert class variables
	$sql = 'INSERT INTO classes (school_id, class_num, class_letter, teacher_id, approved) VALUES ("'.$school_id.'", "'.$class_num.'", "'.$class_letter.'", "'.$teacher_id.'", 1)';
	$query1 = mysqli_query($db, $sql);

	//Update column 'class_id' in users
	$sql2 = 'UPDATE users INNER JOIN classes ON users.id = classes.teacher_id SET users.class_id = classes.id';
	$query2 = mysqli_query($db, $sql2);

	if ($query1 && $query2) {
		header("Location: ../index.php?success=1");
		exit;
	}
	else {
		header("Location: ../index.php?error=1");
	}
}