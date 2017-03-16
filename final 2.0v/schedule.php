<?php
session_start();
include_once 'includes/head.php';
include_once 'back-end/db.php';
include_once "includes/sidebar.php";
include_once "includes/header.php";

//TODO move backend to separate file

//1-student 2-teacher 3-principal 4-admin
$userLevel = $_SESSION['user_info']['role_id'];
$approved = $_SESSION['user_info']['approved'];
$schoolId = $_SESSION['user_info']['school_id'];
$classId = $_SESSION['user_info']['class_id'];
$schoolName = getSchoolName($db, $schoolId);
$classInfo = getClassInfo($db, $classId);

function getSchoolName($db, $schoolId)
{
    $sql = "SELECT name FROM schools WHERE schools.id = '$schoolId'";
    $query = mysqli_query($db, $sql);
    $schoolInfo = mysqli_fetch_assoc($query);
    return $schoolInfo['name'];
}

function getClassInfo($db, $classId)
{
    $sql = "SELECT * FROM classes WHERE classes.id = '$classId'";
    $query = mysqli_query($db, $sql);
    $classInfo = mysqli_fetch_assoc($query);
    return $classInfo;
}

function getSchedule($db, $classId)
{
    $sql = "SELECT schedule FROM schedules WHERE class_id = '$classId'";
    $query = mysqli_query($db, $sql);
    $scheduleInfo = mysqli_fetch_row($query);
    $scheduleInfo = $scheduleInfo[0];
    $scheduleInfo = explode(',', $scheduleInfo);
    return $scheduleInfo;
}

$schedule = getSchedule($db, $classId);
$class = $classInfo['class_num'];
$classLetter = $classInfo['class_letter'];

$days = ['Понеделник', 'Вторник', 'Сряда', 'Четвъртък', 'Петък', 'Събота', 'Неделя'];
$daysEn = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];

if (isset($_POST['submit-schedule']) && $userLevel < 3 && $approved = 1) {
    $scheduleNew =
        [$_POST['mon-0'], $_POST['tue-0'], $_POST['wed-0'], $_POST['thu-0'], $_POST['fri-0'], $_POST['sat-0'], $_POST['sun-0'],
            $_POST['mon-1'], $_POST['tue-1'], $_POST['wed-1'], $_POST['thu-1'], $_POST['fri-1'], $_POST['sat-1'], $_POST['sun-1'],
            $_POST['mon-2'], $_POST['tue-2'], $_POST['wed-2'], $_POST['thu-2'], $_POST['fri-2'], $_POST['sat-2'], $_POST['sun-2'],
            $_POST['mon-3'], $_POST['tue-3'], $_POST['wed-3'], $_POST['thu-3'], $_POST['fri-3'], $_POST['sat-3'], $_POST['sun-3'],
            $_POST['mon-4'], $_POST['tue-4'], $_POST['wed-4'], $_POST['thu-4'], $_POST['fri-4'], $_POST['sat-4'], $_POST['sun-4'],
            $_POST['mon-5'], $_POST['tue-5'], $_POST['wed-5'], $_POST['thu-5'], $_POST['fri-5'], $_POST['sat-5'], $_POST['sun-5'],
            $_POST['mon-6'], $_POST['tue-6'], $_POST['wed-6'], $_POST['thu-6'], $_POST['fri-6'], $_POST['sat-6'], $_POST['sun-6'],
            $_POST['mon-7'], $_POST['tue-7'], $_POST['wed-7'], $_POST['thu-7'], $_POST['fri-7'], $_POST['sat-7'], $_POST['sun-7']];
    echo '<br>';
    $scheduleNew = implode(',', $scheduleNew);
    $sql = "UPDATE schedules SET schedule = '$scheduleNew'";
    $query = mysqli_query($db, $sql);
    header("Location: schedule.php");
}
?>
<div class="ui container">
    <div class="schedule-table">
        <?php if ($userLevel > 1 && $approved = 1) {
            echo "<form method='post'>";
        } ?>
        <table>
            <tr>
                <th class="main-th" colspan="8"><?php echo "$schoolName $class$classLetter" ?></th>
            </tr>
            <?php echo "<th class='schedule-day-num'> </th>"; ?>
            <?php for ($day = 0; $day < count($days); $day++) { //Days of week heading row loop
                echo "<th>$days[$day]</th>";
            } ?>
            <?php $day = 0;
            for ($row = 0; $row < 8; $row++) { //ROW LOOP
                echo "<tr id='schedule-row-$row'>";
                $rowNum = $row + 1;
                echo "<td class='schedule-day-num'>$rowNum</td>";
                for ($col = 0; $col < 7; $col++) { //COL LOOP
                    $name = $daysEn[$col] . "-" . $row;
                    if ($userLevel == 1) {
                        echo "<td name='$name'>" . $schedule[$day] . "</td>";
                    } elseif ($userLevel > 1 && $approved = 1) {
                        $value = $schedule[$day];
                        echo "<td><input name='$name' value='$value'></td>";
                    }
                    $day++;
                }
                echo "</tr>";
            } ?>
            <?php if ($userLevel > 1 && $approved = 1) {
                echo "<tr> <td colspan='8'>";
                echo "<input type='submit' name='submit-schedule' value='Submit'>";
                echo "</td> </tr>";
            } ?>
        </table>
        <?php if ($userLevel > 1 && $approved = 1) {
            echo "</form>";
        } ?>
    </div>
</div>