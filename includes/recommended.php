<?php if (isset($_SESSION['user']['username'])) { ?>
	<div class="logged_in_info">
		<span>welcome <?php echo $_SESSION['user']['username'] ?></span>
		|
		<span><a href="logout.php">logout</a></span>
	</div>
<?php }else{ ?>
	<div class="banner">
		<div class="welcome_msg">
			<h1>Want to make your own reviews?</h1>
			<p> 
			   Read something online that made you think 'what did I just read?', or just want to make and save your own reviews? Then join us, and come make your <b>free account</b> today!
			</p>
			<a href="register.php" class="btn">Join us!</a>
		</div>

		<div class="login_div">
			<form action="<?php echo  'index.php'; ?>" method="post" >
				<h2>Login</h2>
				<div style="width: 60%; margin: 0px auto;">
					<?php include( 'includes/errors.php') ?>
				</div>
				<input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">
				<input type="password" name="password"  placeholder="Password"> 
				<button class="btn" type="submit" name="login_btn">Sign in</button>
			</form>
		</div>
	</div>
<?php } ?>