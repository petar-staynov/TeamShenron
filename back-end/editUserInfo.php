<?php
include('db.php');
session_start();
if(isset($_POST['editInfo'])){

    $firstName = $_POST["first-name"];
    $lastName = $_POST["last-name"];
    $email = $_POST["email"];
    echo $firstName;

    $result = $db->prepare("UPDATE users
                            SET first_name = ?, last_name = ?, email = ?
                             WHERE id = ?");
    $result->bind_param("sssi", $firstName,$lastName,$email,$_SESSION['user_info']['id']);

    $result = $result->execute();

    if (!$result){
        echo "Try again.";
    } else {
        $_SESSION['user_info']['first_name'] = $firstName;
        $_SESSION['user_info']['last_name'] = $lastName;
        $_SESSION['user_info']['email'] = $email;
        header("Location: ../index.php?success=1");
    }



}
