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
                    $name = $daysEn[$col] . "-" . $col;
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

<?php
if(isset($_GET['submit-schedule'])){
    $hack = $_GET['mon-0'];
    echo "SUBMIT\n";
    echo $hack;
}