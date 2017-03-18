<div class="ui grid">
	<div class="four column row">
		<div class="column profile-holder">
			<div class="profile-image-holder">
				<img class="ui medium image profile_img" src="images/default.png" />
			</div>

			<div class="profile-info">
				<h2><?= htmlspecialchars($_SESSION['user_info']['first_name']) . ' ' . htmlspecialchars($_SESSION['user_info']['last_name']); ?></h2>
				<div class="ui divider"></div>
				<a href="#" class="user-grade"><h2><?php echo htmlspecialchars(getClass($db, $_SESSION['user_info']['class_id'])['class_num']) . htmlspecialchars(getClass($db, $_SESSION['user_info']['class_id'])['class_letter']); ?> <i class="student icon"></i></h2></a>
				<div class="ui divider"></div>
				<h2><?= htmlspecialchars($_SESSION['user_info']['email']); ?></h2>
			</div>
		</div>
		<div class="twelve wide column">
			<form class="ui form" action="back-end/editUserInfo.php" method="post">
			  <div class="three fields">
			  	<div class="field">
				    <label>Име</label>
				    <input type="text" name="first-name" value="<?php echo $_SESSION['user_info']['first_name']?>">
			  	</div>

			  	<div class="field">
				    <label>Фамилия</label>
				    <input type="text" name="last-name" value="<?php echo $_SESSION['user_info']['last_name']?>">
			  	</div>
			  </div>
			  <div class="two fields">
			  	<div class="field">
				    <label>E-mail</label>
				    <input type="email" name="email" value="<?php echo $_SESSION['user_info']['email']?>">
			  	</div>
			  <button class="ui primary button" type="submit" name="editInfo">Запази</button>
			</form>
		</div>
	</div>
</div>