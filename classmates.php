<!DOCTYPE html>
<html>
<head>
    <?php
    include_once 'includes/head.php';
    session_start();
    ?>
</head>
<body>
<?php
include_once 'includes/sidebar.php';
include_once 'back-end/db.php';
include_once 'back-end/classmates-backend.php';

$myClassId = $_SESSION['user_info']['class_id'];
$classmates = getClassmates($db, $myClassId);
?>

<div class="pusher">
    <?php
    include_once 'includes/header.php';
    ?>
    <div class="ui container" style="margin-top: 100px;">
        <table class="ui selectable celled teal table">
            <thead>
            <tr>
                <th>Снимка</th>
                <th>Име/Email</th>
                <th>Съобщение</th>
            </tr>
            </thead>
            <tbody>
            <?php for ($classmate = 0; $classmate < count($classmates); $classmate+=4){
                $classmateId = $classmates[$classmate];
                $classmateName = $classmates[$classmate+1];
                $classmateName2 = $classmates[$classmate+2];
                $classmateEmail = $classmates[$classmate+3];
                ?>
            <tr class="delay-1 animated fadeIn">
                    <td>
                        <img src="images/default.png" class="ui tiny rounded image">
                    </td>
                    <td>
                        <h3><?php echo "$classmateName $classmateName2"?></h3>
                        <div class="ui divider"></div>
                        <h4><?php echo "$classmateEmail" ?></h4>
                    </td>
                    <td>
                        <a href="message-form.php?id=<?php echo $classmateId ?>" class="black"><h2 class="text-center"><i class="mail icon"></i></h2></a>
                    </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>