<?php 
include('db.php');

if (isset($_POST['submit'])) {


	$username = $_POST['username'];
	$password = $_POST['password'];

	$registration_date = date("m.d.y");
	$permissions = 4;
	$email = $_POST['email'];

	$result = $db->prepare("SELECT username FROM users WHERE username=?");
	$result->bind_param("s", $username);
	$result->execute();
	$found = $result->fetch();                        
	$result->close();

	if ($found){        
		echo "User already exists!";                                          
	} else {
		$register = $db->prepare("INSERT INTO users 
			(username, password, registration_date, permissions, email) 
			VALUES (?, ?, ?, ?, ?)");
		$register->bind_param("sssis", $username, $password, $registration_date, $permissions, $email);
		$register->execute();
		$register->close(); 
		header("Location: http://localhost/shenron/success.php");
	}

}
?>