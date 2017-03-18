<?php
include('db.php');
session_start();

if (isset($_POST['submit'])) {
    $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $type = mysqli_real_escape_string($db, $_POST['type']);
    $school = mysqli_real_escape_string($db, $_POST['school']);

    //Provervka dali takuv username ili email sushtestvuva
    $sql = 'SELECT * FROM users WHERE username = "'.$username.'" OR email = "'.$email.'"';
    $query = mysqli_query($db, $sql);
    if (mysqli_num_rows($query)) {
        $error = "Вече същесвува такъв потребител";
        header("Location: ../login-form.php?error=$error");
        exit;
    }

    $password = password_hash($password, PASSWORD_BCRYPT);

    //Masiv za rolite
    $roles = array();

    //Pulni roles masiva s indexite na sushtestvuvashtite roli
    $sql = 'SELECT * FROM roles';
    $query = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $roles[$row['id']] = $row['name'];
    }

    //Proverqva dali vuvedenata stoinost za rolq se namira v masiva s vsichki roli
    if (!array_key_exists($type, $roles)) {
        $error = "Грешка, моля опитайте отново.";
        header("Location: ../login-form.php?error=$error");
        exit;
    }

    if ($roles[$type] == 'Ученик') {
        $class = $_POST['class'];

        //Trqbva da se napravqt klasovete
        $sql = 'INSERT INTO users (first_name, last_name, username, password, email, approved, school_id,
        class_id, role_id, registered_at) VALUES ("'.$firstname.'", "'.$lastname.'", "'.$username.'", "'.$password.'", "'.$email.'", 0, "'.$school.'", "'.$class.'", "'.$type.'", NOW())';
    }

    else {
        $sql = 'INSERT INTO users (first_name, last_name, username, password, email, approved, school_id, role_id, registered_at) VALUES ("'.$firstname.'", "'.$lastname.'", "'.$username.'", "'.$password.'", "'.$email.'", 0, "'.$school.'", "'.$type.'", NOW())';
    }
  
    if (mysqli_query($db, $sql)) {
        $sql = 'SELECT * FROM users WHERE username = "'.$username.'"';
        $query = mysqli_query($db, $sql);
        $message = "Регистрацията бе успешна. Моля изчакайте одобрение.";

        header("Location: ../login-form.php?msg=$message");
        exit;
    }
}
else {
    $error = "Нещо се обърка.";
    header("Location: ../login-form.php?error=$error");
    exit;
}