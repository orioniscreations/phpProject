
<div class="navbar">
			<div class="logo_div">
				<a href="index.php"><h1>What The Heck Did I Just Read?!</h1></a>
			</div>
			<ul>
			  <li><a class="active" href="index.php">Home</a></li>
			  <!-- <li><a href="#myReviews">My Reviews</a></li> -->


			  <?php if (isset($_SESSION['user']['username'])) { ?>
	<div >
		
		
	</div>
<?php }else{ ?>
	 <li><a href="login.php">Log In</a></li>
			  <li><a href="register.php">Register</a></li>
<?php } ?>
			 
			  
			</ul>

                        
		</div>
		