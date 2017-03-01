<!DOCTYPE html>
<html>
<head>
	<?php 
	include_once 'includes/head.php';
	?>
</head>
<body>
	<div class="top">
		<div id="wrapper">
			<div id="main">
				<h1 class="front-title">УЧИЛИЩНА СОЦИАЛНА МРЕЖА</h1>
				<h2 class="second-front-title"></h2>
				<div class="ui one column stackable center aligned page grid">
					<div class="column twelve wide">
						<a class="ui  button" tabindex="0">
							Разбери повече
						</a>
            
            <a class="ui positive button" onclick="modal_eval()" tabindex="0">Вход</a>
            
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- LOGIN -->
  <div class="ui eval modal">
    <form id="login" class="ui form" action="login.php" method="post">
     <h1>Вход</h1>
     <div class=" field">
      <label>Потребителско име</label>
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
  <div class="actions">
    <div class="ui black deny button">
      Затвори
    </div>
  </div>
  <!-- END LOGIN -->

  <!-- REGISTER -->
  <div class="ui text modal">
    <i class="close icon"></i>
    <form class="ui form" action="register.php" method="post">
     <h1>Регистрация</h1>
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
      <select name="" required>
        <label>-- Моля изберете --/label>
          <option>Ученик</option>
          <option>Преподавател</option>
          <option>Директор</option>
          <option>Зам. Директор</option>
          <option>Фелдшер</option>
          <option>Заместващ Преподавател</option>
        </select>
      </div>
      <div class="field">
        <input type="submit" name="submit" class="ui inverted green button" value="Регистрирай се">
      </div>
    </form>
  </div>
  <div class="actions">
    <div class="ui black deny button">
      Затвори
    </div>
  </div>
  <!-- END REGISTER -->
</body>
</html>