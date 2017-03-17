<?php
include_once "back-end/functions.php";

//1-student 2-teacher 3-principal 4-admin
$userLevel = $_SESSION['user_info']['role_id'];
$approved = $_SESSION['user_info']['approved'];
$schoolId = $_SESSION['user_info']['school_id'];
$classId = $_SESSION['user_info']['class_id'];

$schoolName = getSchoolName($db, $schoolId);
$classInfo = getClassInfo($db, $classId);
$schedule = getSchedule($db, $classId);

$class = $classInfo['class_num'];
$classLetter = $classInfo['class_letter'];

$days = ['Понеделник', 'Вторник', 'Сряда', 'Четвъртък', 'Петък', 'Събота', 'Неделя'];
$daysEn = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];


if (isset($_POST['submit-schedule']) && $userLevel > 1 && $approved = 1) {
    $scheduleNew =
        [$_POST['mon-0'], $_POST['tue-0'], $_POST['wed-0'], $_POST['thu-0'], $_POST['fri-0'], $_POST['sat-0'], $_POST['sun-0'],
            $_POST['mon-1'], $_POST['tue-1'], $_POST['wed-1'], $_POST['thu-1'], $_POST['fri-1'], $_POST['sat-1'], $_POST['sun-1'],
            $_POST['mon-2'], $_POST['tue-2'], $_POST['wed-2'], $_POST['thu-2'], $_POST['fri-2'], $_POST['sat-2'], $_POST['sun-2'],
            $_POST['mon-3'], $_POST['tue-3'], $_POST['wed-3'], $_POST['thu-3'], $_POST['fri-3'], $_POST['sat-3'], $_POST['sun-3'],
            $_POST['mon-4'], $_POST['tue-4'], $_POST['wed-4'], $_POST['thu-4'], $_POST['fri-4'], $_POST['sat-4'], $_POST['sun-4'],
            $_POST['mon-5'], $_POST['tue-5'], $_POST['wed-5'], $_POST['thu-5'], $_POST['fri-5'], $_POST['sat-5'], $_POST['sun-5'],
            $_POST['mon-6'], $_POST['tue-6'], $_POST['wed-6'], $_POST['thu-6'], $_POST['fri-6'], $_POST['sat-6'], $_POST['sun-6'],
            $_POST['mon-7'], $_POST['tue-7'], $_POST['wed-7'], $_POST['thu-7'], $_POST['fri-7'], $_POST['sat-7'], $_POST['sun-7']];
    $scheduleNew = implode(',', $scheduleNew);

    //DATABASE QUERY
    $stmt = $db->prepare("UPDATE schedules SET schedule = ? WHERE schedules.class_id = ?");
    $stmt->bind_param("ss", $scheduleNew, $classId);
    $stmt->execute();
    $stmt->close();
    $db->close();

    header("Location: schedule.php");
    exit;
}