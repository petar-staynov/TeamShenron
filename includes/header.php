<?php
require_once 'back-end/db.php';
if (!isset($_SESSION['logged'])) {
    header("Location: login-form.php");
}
?>
<header>
    <div class="ui menu">
        <div class="right menu">
            <!-- <div class="ui dropdown item">
                <i class="alarm icon"></i>
                <span class="notification">3</span>
                <div class="menu transition hidden" tabindex="-1">
                    <div class="item">Известие</div>
                    <div class="item">Друго известие</div>
                    <div class="item">Още едно известие</div>
                </div>
            </div>
            <div class="ui dropdown item">
                <i class="mail icon"></i>
                <span class="notification">4</span>
                <div class="menu transition hidden" tabindex="-1">
                    <div class="item">Съобщение</div>
                    <div class="item">Друго съобщение</div>
                    <div class="item">Още едно съобщение</div>
                    <div class="item">Някакво съобщение</div>
                </div>
            </div> -->
            <a href="index.php" class="item">
                <img class="ui mini circular image profile_img" src="images/default.png"/>
                <span class="profile_name"><?= htmlspecialchars($_SESSION['user_info']['first_name']) . ' ' . htmlspecialchars($_SESSION['user_info']['last_name']) ?></span>
            </a>
            <a href="back-end/logout.php" class="item header_signout">Изход</a>
        </div>
    </div>
</header>

<!--MODAL FOR ADD CLASS-->
<?php if ($_SESSION['user_info']['role_id'] == 3) { ?>
    <div class="ui add modal">
        <form id="add_class" class="ui form" action="back-end/add-class.php" method="post">
            <h1>Добави клас</h1>
            <div class="field">
                <label>Училище</label>
                <input type="hidden" name="school_id" value="<?php echo $_SESSION['user_info']['school_id']?>">
                <input disabled type="text" name="school" value="<?php echo htmlspecialchars(getSchool($db, $_SESSION['user_info']['school_id'])['name']); ?>">
            </div>
            <div class="field">
                <label>Клас №</label>
                <input type="text" name="class_num" placeholder="" required>
            </div>
            <div class="field">
                <label>Клас Буква</label>
                <input type="text" name="class_letter" placeholder="" required>
            </div>
            <div class="field">
                <label>Класен ръководител</label>
                <select name="teacher_id">
                    <option selected>Изберете Преподавател</option>
                    <?php
                    $sql = 'SELECT * FROM users WHERE role_id=2 AND approved = 1';
                    $query = mysqli_query($db, $sql);

                    while ($row = mysqli_fetch_assoc($query)) { ?>
                        <option value="<?= $row['id'] ?>"><?= $row['first_name'] ?> <?= $row['last_name'] ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="field">
                <input type="submit" class="ui inverted green button" name="submit" value="Добави">
            </div>
        </form>
    </div>
<?php } ?>
<script>
    function modal_add() {
        $('.ui.add.modal ')
            .modal('show');
    }

</script>
<script>
    $(document).ready(function () {
        $('.ui.menu .ui.dropdown').dropdown({on: 'click'});
    });
</script>