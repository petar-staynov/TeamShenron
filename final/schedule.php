<!DOCTYPE html>
<html>
<head>
    <?php 
        include_once 'includes/head.php';
    ?>
</head>

<body>

<?php
include_once "includes/sidebar.php";
include_once "includes/header.php";
?>


<?php
session_start();
//these will be pulled from database
$userLevel = 3;
$school = "1во СОУ";
$class = "11";
$classLetter = "А";
$days = ['Понеделник', 'Вторник', 'Сряда', 'Четвъртък', 'Петък', 'Събота', 'Неделя'];
$daysEn = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];

$schedule = [['пон-1', 'пон-2', 'пон-3', '', '', '', '', ''],
    ['вт-1', 'вт-2', 'вт-3', '', '', '', '', ''],
    ['ср-1', 'ср-2', 'ср-3', '', '', '', '', ''],
    ['чт-1', 'чт-2', 'чт-3', '', '', '', '', ''],
    ['пт-1', 'пт-2', 'пт-3', '', '', '', '', ''],
    ['сб-1', 'сб-2', 'сб-3', '', '', '', '', ''],
    ['нд-1', 'нд-2', 'нд-3', '', '', '', '', '']];
?>


<?php
if(isset($_POST['submit-schedule']) && $userLevel <= 3){
    $schedule = [[$_POST['mon-0'], $_POST['mon-1'], $_POST['mon-2'], $_POST['mon-3'], $_POST['mon-4'], $_POST['mon-5'], $_POST['mon-6'], $_POST['mon-7']],
        [$_POST['tue-0'], $_POST['tue-1'], $_POST['tue-2'], $_POST['tue-3'], $_POST['tue-4'], $_POST['tue-5'], $_POST['tue-6'], $_POST['tue-7']],
        [$_POST['wed-0'], $_POST['wed-1'], $_POST['wed-2'], $_POST['wed-3'], $_POST['wed-4'], $_POST['wed-5'], $_POST['wed-6'], $_POST['wed-7']],
        [$_POST['thu-0'], $_POST['thu-1'], $_POST['thu-2'], $_POST['thu-3'], $_POST['thu-4'], $_POST['thu-5'], $_POST['thu-6'], $_POST['thu-7']],
        [$_POST['fri-0'], $_POST['fri-1'], $_POST['fri-2'], $_POST['fri-3'], $_POST['fri-4'], $_POST['fri-5'], $_POST['fri-6'], $_POST['fri-7']],
        [$_POST['sat-0'], $_POST['sat-1'], $_POST['sat-2'], $_POST['sat-3'], $_POST['sat-4'], $_POST['sat-5'], $_POST['sat-6'], $_POST['sat-7']],
        [$_POST['sun-0'], $_POST['sun-1'], $_POST['sun-2'], $_POST['sun-3'], $_POST['sun-4'], $_POST['sun-5'], $_POST['sun-6'], $_POST['sun-7']],];
}
?>
<?php
if(isset($_POST['permissions'])){
    $userLevel++;
}
?>

<div class="ui container">
<div class="schedule-table">
<?php if ($userLevel <= 3) { echo "<form method='post'>"; } ?>
    <table>
        <tr>
            <th class="main-th" colspan="8"><?php echo "$school $class$classLetter"?></th>
        </tr>
        <?php echo "<th class='schedule-day-num'> </th>"; ?>
        <?php for ($day = 0; $day < count($days); $day++) { //Days of week heading row loop
            echo "<th>$days[$day]</th>";
        } ?>
        <?php for ($row = 0; $row < 8; $row++) { //ROW LOOP
            echo "<tr id='schedule-row-$row'>";
            $rowNum = $row+1;
            echo "<td class='schedule-day-num'>$rowNum</td>";
                for ($col = 0; $col < 7; $col++) { //COL LOOP
                    $name = $daysEn[$col] . "-" . $row;
                    if ($userLevel == 4) {
                    echo "<td name='$name'>" . $schedule[$col][$row] . "</td>";
                    } elseif ($userLevel <=3) {
                        $value = $schedule[$col][$row];
                        echo "<td><input name='$name' value='$value'></td>";
                    }
                }
            echo "</tr>"; }  ?>
        <?php if ($userLevel <= 3) {
            echo "<tr> <td colspan='8'>";
            echo "<input type='submit' name='submit-schedule' value='Submit'>";
            echo "</td> </tr>";
        } ?>
    </table>
<?php if ($userLevel <= 3) { echo "</form>"; } ?>

    <form method="post">
        <input type="submit" name="permissions" value="Become a Student">
    </form>

<?php var_dump($schedule) ?>
</div>
</div>
</body>
</html>