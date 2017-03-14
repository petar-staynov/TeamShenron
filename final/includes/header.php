<header>
	<div class="ui menu">
  		<div class="right menu">
  			<div class="ui dropdown item">
	    		<i class="alarm icon"></i>
	    		<span class="notification">3</span>
	    		<!-- Dropdown -->
	    		<div class="menu transition hidden" tabindex="-1">
			      <div class="item">Известие</div>
			      <div class="item">Друго известие</div>
			      <div class="item">Още едно известие</div>
			    </div>
	    	</div>
	    	<div class="ui dropdown item">
	    		<i class="mail icon"></i>
	    		<span class="notification">4</span>
	    		<!-- Dropdown -->
	    		<div class="menu transition hidden" tabindex="-1">
			      <div class="item">Съобщение</div>
			      <div class="item">Друго съобщение</div>
			      <div class="item">Още едно съобщение</div>
			      <div class="item">Някакво съобщение</div>
			    </div>
	    	</div>
	    	<a href="index.php" class="item">
	    		<img class="ui mini circular image profile_img" src="images/profile_pic.png" />
	    		<span class="profile_name"><?= htmlspecialchars($_SESSION['user_info']['first_name']) . ' ' . htmlspecialchars($_SESSION['user_info']['last_name']) ?></span>
	    	</a>
    		<a href="back-end/logout.php" class="item header_signout">Изход</a>
  		</div>
	</div>
</header>

<script>
  $(document).ready(function() {
      $('.ui.menu .ui.dropdown').dropdown({ on: 'click' });
 	});
</script>