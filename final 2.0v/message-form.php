<!DOCTYPE html>
<html>
<head>
    <?php 
        include_once 'includes/head.php';
    ?>
    <link rel="stylesheet" type="text/css" href="css/message-style.css">
</head>
<body>
<!--Current school-->
<?php $title = "СУ \"Иван Вазов\"" ?>

<header class="ccheader">
    <h1><?=htmlspecialchars($title)?></h1>
</header>
<div class="form-style-5">
  	<?php
		$currentUser = "Мариика";
	?>
<form>
    <fieldset>
        <legend class="title">Изпращане на съобщение</legend>
        <span class="pop">От</span><input type="text" name="field1" value="<?=$currentUser ?>" name="sender" disabled>
        <span class="pop">До</span><input type="text" name="field2" placeholder="Изпрати до *" name="recipient">
        <span><i class="fa fa-comment fa-2x"></i></span>
        <textarea name="field3" placeholder="Съобщение" class="message" name="content"></textarea>
    </fieldset>
    <input type="submit" value="Изпрати" />
</form>
</div>

</body>
</html>