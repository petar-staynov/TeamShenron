<title>Profile</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="schedule.css">

<script src="../profile/js/jquery-3.1.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="../profile/css/semantic.min.css">
<script src="../profile/js/semantic.min.js"></script>
<link rel="stylesheet" type="text/css" href="../profile/css/style.css">
<link rel="stylesheet" type="text/css" href="../profile/css/animate.css">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">



<?php
include_once "../profile/head.php";
include_once "../profile/sidebar.php";
include_once "../profile/header.php";
?>


<?php
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
if(isset($_GET['submit-schedule']) && $userLevel <= 3){
    $schedule = [[$_GET['mon-0'], $_GET['mon-1'], $_GET['mon-2'], $_GET['mon-3'], $_GET['mon-4'], $_GET['mon-5'], $_GET['mon-6'], $_GET['mon-7']],
        [$_GET['tue-0'], $_GET['tue-1'], $_GET['tue-2'], $_GET['tue-3'], $_GET['tue-4'], $_GET['tue-5'], $_GET['tue-6'], $_GET['tue-7']],
        [$_GET['wed-0'], $_GET['wed-1'], $_GET['wed-2'], $_GET['wed-3'], $_GET['wed-4'], $_GET['wed-5'], $_GET['wed-6'], $_GET['wed-7']],
        [$_GET['thu-0'], $_GET['thu-1'], $_GET['thu-2'], $_GET['thu-3'], $_GET['thu-4'], $_GET['thu-5'], $_GET['thu-6'], $_GET['thu-7']],
        [$_GET['fri-0'], $_GET['fri-1'], $_GET['fri-2'], $_GET['fri-3'], $_GET['fri-4'], $_GET['fri-5'], $_GET['fri-6'], $_GET['fri-7']],
        [$_GET['sat-0'], $_GET['sat-1'], $_GET['sat-2'], $_GET['sat-3'], $_GET['sat-4'], $_GET['sat-5'], $_GET['sat-6'], $_GET['sat-7']],
        [$_GET['sun-0'], $_GET['sun-1'], $_GET['sun-2'], $_GET['sun-3'], $_GET['sun-4'], $_GET['sun-5'], $_GET['sun-6'], $_GET['sun-7']],];
}
?>
<?php
if(isset($_GET['permissions'])){
    $userLevel++;
}
?>


<div class="schedule-table">
<?php if ($userLevel <= 3) { echo "<form method='get'>"; } ?>
    <table border="thick">
        <tr>
            <th colspan='7'><?php echo "$school $class$classLetter"?></th>
        </tr>
        <?php for ($day = 0; $day < count($days); $day++) {
            echo "<th>$days[$day]</th>";
        } ?>
        <?php for ($row = 0; $row < 8; $row++) {
            echo "<tr id='schedule-row-$row'>";
                for ($col = 0; $col < 7; $col++) {
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
            echo "<tr> <td colspan='7'>";
            echo "<input type='submit' name='submit-schedule' value='Submit'>";
            echo "</td> </tr>";
        } ?>
    </table>
<?php if ($userLevel <= 3) { echo "</form>"; } ?>

    <form method="get">
        <input type="submit" name="permissions" value="Become a Student">
    </form>

<?php var_dump($schedule) ?>
</div>

