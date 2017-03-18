
<!DOCTYPE html>
<html>
<head>
    <script src="js/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/semantic.min.css">
    <script src="js/semantic.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<header class="ccheader">
    <h1>СУ Иван Вазов</h1>
    <h2>Добави събитие</h2>
</header>

<div class="wrapper">

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


    <div class="ccfield-prepend">
        <input class="ccbtn" type="submit" value="Добави задача">
    </div>
</form>

</div>
</body>
</html>