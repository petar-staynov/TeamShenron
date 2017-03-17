<?php
session_start();
include_once 'includes/head.php';
include_once 'back-end/db.php';
include_once "includes/sidebar.php";
include_once "includes/header.php";
include_once "back-end/schedule-backend.php";
?>
<div class="ui container">
    <div class="schedule-table">
        <?php if ($userLevel > 1 && $approved = 1) {
            echo "<form method='post' >";
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