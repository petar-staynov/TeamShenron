<!--Current teacher who add task for class-->
<?php $teacher = "г-жа Иванова"?>

<form method="get" action="" class="ccform">
    <div class="ccfield-prepend">
        <span class="ccform-addon"><i class="fa fa-user fa-2x"></i></span>
        <input class="ccformfield" type="text" value="<?=$teacher?>" disabled>
    </div>
    <div class="ccfield-prepend">
        <span class="ccform-addon"><i class="fa fa-info fa-2x"></i></span>
        <input class="ccformfield" type="text" placeholder="Събитие" required>
    </div>
    <div class="ccfield-prepend">
        <span class="ccform-addon"><i class="fa fa-book fa-2x"></i></span>
        <input class="ccformfield" type="text" placeholder="Предмет" required>
    </div>
    <div class="ccfield-prepend">
        <span class="ccform-addon"><i class="fa fa-calendar fa-2x"></i></span>
        <input class="ccformfield" type="text" placeholder="Краен срок" onfocus="(this.type='date')" required/>
    </div>
    <div class="ccfield-prepend">
        <span class="ccform-addon"><i class="fa fa-comment fa-2x"></i></span>
        <textarea class="ccformfield" name="comments" rows="8" placeholder="Коментар" required></textarea>
    </div>

    <?php include_once "selectClass.php"?>

    <div class="ccfield-prepend">
        <input class="ccbtn" type="submit" value="Добави задача">
    </div>
</form>