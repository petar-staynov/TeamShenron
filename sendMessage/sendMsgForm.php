<?php
$currentUser = "Мариика"
?>
<form>
    <fieldset>
        <legend>Изпращане на съобщение</legend>
        <span class="number">От</span><input type="text" name="field1" value="<?=$currentUser ?>" name="sender" disabled>
        <span class="number">До</span><input type="email" name="field2" placeholder="Изпрати до *" name="recipient">
        <span><i class="fa fa-comment fa-2x"></i></span>
        <textarea name="field3" placeholder="Съобщение" class="message" name="content"></textarea>
    </fieldset>
    <input type="submit" value="Изпрати" />
</form>