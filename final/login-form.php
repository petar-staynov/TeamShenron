<?php include_once 'back-end/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <?php
    include_once 'includes/head.php';
    ?>
    <script>
        function modal_eval() {
            $('.ui.eval.modal ')
                .modal('show');
        }

        function modal_text() {
            $('.ui.text.modal ')
                .modal('show');
        }
    </script>

    <!-- Show inputs for student -->
    <script>
        function showStudentInputs() {
            let role = $('#role').find(":selected").text();
            if (role == 'Ученик') {
                $('#class').fadeIn('400');
            }
            else {
                $('#class').fadeOut('400');
            }
        }
    </script>

    <!-- AJAX request -->
	<script>
		function showSchools() {
			let region = document.getElementById("school-city");
			console.log(region);
			region = region.options[region.selectedIndex].value;
			console.log(region);
		    if (region.length == 0) { 
		        //Selecta e prazen
		         document.getElementById("schools").innerHTML = "";
		        return;
		    } else {
		        var xmlhttp = new XMLHttpRequest();
		        xmlhttp.onreadystatechange = function() {
		            if (this.readyState == 4 && this.status == 200) {
		               	//Napulni selecta s uchilishta
		               	$('#schools').html(this.responseText).selectmenu("refresh");
		            }
		        };
		        xmlhttp.open("GET", "back-end/show-schools.php?region=" + region, true);
		        xmlhttp.send();
		    }

		    $('#schools').selectmenu("refresh");
		}
	</script>

    <!-- Message close -->
    <script>
        $('.message .close')
          .on('click', function() {
            $(this)
              .closest('.message')
              .transition('fade')
            ;
          })
        ;
    </script>

</head>
<body class="login">
<div class="top">
    <div id="wrapper">
        <div id="main">
            <?php 
                if (isset($_GET['error'])) {
                    $error = $_GET['error'];

                    if ($error == 'empty') { ?>
                        <div class="ui centered grid">
                            <div class="four wide column">
                                <div class="ui red message">
                                    <i class="close icon"></i>
                                    <strong>НЕ може празно име или парола</strong>
                                </div>
                            </div>
                        </div>
            <?php    }
                }
            ?>
            <h1 class="front-title">УЧИЛИЩЕН ПРОФИЛ</h1>
            <h2 class="second-front-title"></h2>
            <div class="ui one column stackable center aligned page grid">
                <div class="column twelve wide">
                    <a class="ui positive button" onclick="modal_eval()" tabindex="0">Вход</a>
                    <a href="#" onclick="modal_text()" class="ui button" tabindex="1">
                        Регистрирай се
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- LOGIN -->
<div class="ui eval modal">
    <form id="login" class="ui form" action="back-end/login.php" method="post">
        <h1>Вход</h1>
        <div class=" field">
            <label>Потребителско име или email</label>
            <input type="text" name="username" placeholder="Потребителско име" required>
        </div>
        <div class=" field">
            <label>Парола</label>
            <input type="password" name="password" placeholder="Парола" required>
        </div>
        <p>Все още нямате профил в системата? <a href="#" onclick="modal_text()">Създайте си от тук.</a>
        <div class="field">
            <input type="submit" class="ui inverted green button" name="submit" value="Вход">
        </div>
    </form>
</div>
<!-- END LOGIN -->

<!-- REGISTER -->
<div class="ui text modal">
    <i class="close icon"></i>
    <form class="ui form" action="back-end/register.php" method="post">
        <h1>Регистрация</h1>
        <div class=" field">
            <label>Име</label>
            <input type="text" name="firstname" placeholder="Име" required>
        </div>
        <div class=" field">
            <label>Фамилия</label>
            <input type="text" name="lastname" placeholder="Фамилия" required>
        </div>
        <div class=" field">
            <label>Потребителско име</label>
            <input type="text" name="username" placeholder="Потребителско име" required>
        </div>
        <div class=" field">
            <label>Email</label>
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class=" field">
            <label>Парола</label>
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="field">
            <label>Вие сте?</label>
            <select name="type" class="ui dropdown" required onchange="showStudentInputs()" id="role">
                    <option selected>Моля изберете</option>
                    <?php 
                        $sql = 'SELECT * FROM roles WHERE name != "Админ"';
                        $query = mysqli_query($db, $sql);
                        while ($row = mysqli_fetch_assoc($query)) { ?>
                            <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                <?php    }
                    ?>
            </select>
        </div>
        <div class="field">
        	<label>Ващето училище се намира в град</label>
        	<select id="school-city" name="school-city" class="ui dropdown" required onchange="showSchools()">
                <option selected>Изберете град</option>
        		<?php 
        			$sql = 'SELECT DISTINCT region FROM schools';
        			$query = mysqli_query($db, $sql);
        			while ($row = mysqli_fetch_assoc($query)) { ?>
        				<option value="<?= $row['region'] ?>"><?= $row['region'] ?></option>
    		<?php	}
        		?>
        	</select>
        </div>
        <div class="field">
            <label>Училище</label>
            <select id="schools" class="ui dropdown" required name="school">
            	<option selected>Изберете училище</option>
            	<?php 
            		$sql = 'SELECT * FROM schools';
            		$query = mysqli_query($db, $sql);

            		while ($row = mysqli_fetch_assoc($query)) { ?>
            			<option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
        	<?php	}
            	?>
            </select>
        </div>

        <div class="field" style="display: none;" id="class">
            <label>Паралелка: </label>
            <select class="ui dropdown" name="class-number">
                <option selected>Клас</option>
                <option value="1">1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
            </select>
            <select class="ui dropdown" name="class-letter">
                <option selected>Буква</option>
                <option>А</option>
                <option>Б</option>
                <option>В</option>
                <option>Г</option>
            </select>
        </div>

        <div class="field">
            <input type="submit" name="submit" class="ui inverted green button" value="Регистрирай се">
        </div>

        <!-- Dropdown -->
		<script>
			$('.ui.dropdown')
			  .dropdown()
			;
		</script>

    </form>
</div>
<!-- END REGISTER -->
</body>
</html>