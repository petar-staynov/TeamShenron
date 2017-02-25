<?php
$classArr = [1,2,3,4,5,6,7,8,9,10,11,12];
$classLetterArr = ["А","Б","В","Г"];
?>

<div class="ccfield-prepend">
    <hr>
    <div class="mainselection">
        <select>
            <option disabled selected>Изберете клас</option>
            <?php foreach ($classArr as $class) : ?>
            <option value="<?= $class?>"><?= $class?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <hr>
    <hr>
    <div class="mainselection">
        <select>
            <option disabled selected>Изберете паралелка</option>
            <?php foreach ($classLetterArr as $letter) : ?>
                <option value="<?= $letter?>"><?= $letter?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <hr>
</div>
