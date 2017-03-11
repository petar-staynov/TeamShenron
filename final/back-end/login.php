<?php
include("db.php");
session_start();

if (isset($_POST['submit'])) {
    $conn = $db;
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $names = $firstname . " " . $lastname;

    $hashedPass = $row['password'];

    $permission = $row['password'];
    $approved = $row['approved'];

    //TODO approve the integration of 5th level permissions for non verified users
    if ($approved != 1){
        $permission = 5;
    }
    if (password_verify($password, $hashedPass)) {
        echo "SUCCESS<br>";
        echo "your username is $username, you real name is $names\n";

        $_SESSION['username'] = $username;
        $_SESSION['names'] = $names;
    } else {
        echo "Wrong username/password";
    }
    mysqli_close($conn);
}