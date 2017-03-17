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
        header("Location: http://localhost/shenron/success.php");
    }



}
