<?php
include('db.php');

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
        header("Location: ../login-form.php?error=exists");
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
        header("Location: ../login-form.php?error=type");
        exit;
    }

    if ($roles[$type] == 'Ученик') {
        $classNumber = mysqli_real_escape_string($db, $_POST['class-number']);
        $classLetter = mysqli_real_escape_string($db, $_POST['class-letter']);

        //Trqbva da se napravqt klasovete
    }

    else {
        $sql = 'INSERT INTO users (first_name, last_name, username, password, email, approved, school_id, role_id, registered_at) VALUES ("'.$firstname.'", "'.$lastname.'", "'.$username.'", "'.$password.'", "'.$email.'", 0, "'.$school.'", "'.$type.'", NOW())';
    }
  
    if (mysqli_query($db, $sql)) {
        $_SESSION['logged'] = true;

        $sql = 'SELECT * FROM users WHERE username = "'.$username.'"';
        $query = mysqli_query($db, $sql);
        $_SESSION['user_info'] = mysqli_fetch_assoc($query);
        header("Location: ../index.php");
        exit;
    }
    else {
       header("Location: ../login-form.php");
        exit; 
    }
} 

else {
    echo "<h1>You are not supposed to be here. Something went wrong.</h1>";
}