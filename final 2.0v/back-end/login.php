<?php
include("db.php");
session_start();

if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
    if (!$db) {
        die("Connection failed:" . mysqli_connect_error());
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($db, $username);
    $password = mysqli_real_escape_string($db, $password);

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($db, $query);
    $count = mysqli_num_rows($result);

    if (!$count) {
        $error = "Грешно име/парола.";
        header("Location: ../login-form.php?error=$error");
        exit;
    }

    $row = mysqli_fetch_assoc($result);

    $hashedPass = $row['password'];

    $approved = $row['approved'];

    if ($approved == 0) {
        $error = "Профилът ви не е одобрен.";
        header("Location: ../login-form.php?error=$error");
        exit;
    }

    if (password_verify($password, $hashedPass)) {
        $_SESSION['user_info'] = $row;
        $_SESSION['logged'] = true;

        header("Location: ../index.php");
        exit;
    } else {
        $error = "Грешно име/парола.";
        header("Location: ../login-form.php?error=$error");
    }
    mysqli_close($db);
}
else {
    $error = "Нещо се обърка.";
    header("Location: ../login-form.php?error=$error");
    exit;
}