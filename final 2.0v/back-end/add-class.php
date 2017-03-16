<?php
include('db.php');
session_start();

if (isset($_POST['submit'])) {
	$school_id = $_POST['school_id'];
	$class_num = $_POST['class_num'];
	$class_letter = $_POST['class_letter'];
	$teacher_id = $_POST['teacher_id'];

	//Insert class variables
	$sql = 'INSERT INTO classes (school_id, class_num, class_letter, teacher_id) VALUES ("'.$school_id.'", "'.$class_num.'", "'.$class_letter.'", "'.$teacher_id.'")';
	$query = mysqli_query($db, $sql);

	//Update column 'class_id' in users
	$sql2 = 'UPDATE users INNER JOIN classes ON users.id = classes.teacher_id SET users.class_id = classes.id';
	$query2 = mysqli_query($db, $sql2);

	header("Location: ../index.php");

}