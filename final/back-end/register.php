<?php
include('../back-end/db.php');

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $youAre = $_POST['permissions'];
    $school = $_POST['selectedschool'];
    //TODO map schools to ids
    $permissions = 4;
    $approved = 0; //0 - not approved, 1 - approved

    switch ($youAre) {
        case "Ученик":
            $permissions = 4;
            break;
        case "Учител":
            $permissions = 3;
            break;
        case "Директор":
            $permissions = 2;
            break;
    }
    var_dump($_POST);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if(password_verify($password, $hashed_password)){
        echo "HASH WORKS";
    }

    $conn = $db;
    if (!$conn) {
        die("Database Connection failed : " . mysqli_error());
    }

    $stmt = $conn->prepare("INSERT INTO users
(firstname, lastname, username, email, password, permissions, approved)
 VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssii", $firstname, $lastname, $username, $email, $hashed_password, $permissions, $approved);
    $stmt->execute();
    $stmt->close();
    $conn->close();
} else {
    echo "<h1>You are not supposed to be here. Something went wrong.</h1>";
}