<?php
include_once 'db.php';
include_once 'functions.php';

function getClassmates($db, $myId)
{
    $stmt = $db->prepare("SELECT id, first_name, last_name, email FROM users WHERE users.class_id = ? AND users.role_id = ?");
    $roleId = 1;
    $stmt->bind_param('ii', $myId, $roleId);
    $stmt->execute();
    $stmt->bind_result($userId, $firstName, $lastName, $email);
    $userInfo = [];
    while($stmt->fetch()){
        $userInfo[] = $userId;
        $userInfo[] = $firstName;
        $userInfo[] = $lastName;
        $userInfo[] = $email;

    }
    $stmt->close();
    return $userInfo;
}
