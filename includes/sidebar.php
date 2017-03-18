<div class="ui sidebar inverted visible vertical menu pushable">
    <li class="item">
        <div class="sixteen">
            <img class="ui tiny circular image profile_img" src="images/default.png"/>
            <div class="profile_info">
                <span class="profile_name"><?= htmlspecialchars($_SESSION['user_info']['first_name']) . ' ' . htmlspecialchars($_SESSION['user_info']['last_name']) ?></span>
                <h3>
                    <?php
                    if ($_SESSION['user_info']['role_id'] == 4) { ?>
                        Админ
                    <?php } elseif ($_SESSION['user_info']['role_id'] == 1) {

                    }
                    ?>
                </h3>
            </div>
        </div>
    </li>
    <?php if ($_SESSION['user_info']['role_id'] == 3) { ?>
    <div class="ui divider"></div>
    <a href="index.php" class="item">
        <i class="users icon"></i>
        Табло
    </a>
    <a href="#" onclick="modal_add()" class="item">
        <i class="add user icon"></i>
        Добави клас
    </a>
</div>
<?php } else if ($_SESSION['user_info']['role_id'] == 2) { ?>
    <div class="ui divider"></div>
    <a href="index.php" class="item">
        <i class="users icon"></i>
        Табло
    </a>
    <a href="schedule.php" class="item">
        <i class="file text outline icon"></i>
        Програма
    </a>
    </div>
<?php } else if ($_SESSION['user_info']['role_id'] == 1) { ?>
    <div class="ui divider"></div>
    <a href="index.php" class="item">
        <i class="users icon"></i>
        Табло
    </a>
    <a href="classmates.php" class="item">
        <i class="users icon"></i>
        Съученици
    </a>
    <a class="item">
        <i class="calendar icon"></i>
        Календар
    </a>
    <a class="item">
        <i class="address book icon"></i>
        Моите оценки
    </a>
    <a class="item">
        <i class="edit icon"></i>
        Домашни
    </a>
    <a href="schedule.php" class="item">
        <i class="file text outline icon"></i>
        Програма
    </a>
<?php } ?>
</div>