

<!DOCTYPE html>


<?php require_once('config.php'); ?>
<?php require_once( 'includes/public_functions.php'); ?>
<?php require_once( 'includes/registration_login.php') ?>
<?php $posts = getPublishedPosts(); ?>

<?php require_once('includes/header.php'); ?>

	<title>What The Heck Did I Just Read</title>
</head>
<body>
	<!-- container - wraps whole page -->
	<div class="container">
		
		<!-- Nav -->

		<?php include('includes/navbar.php') ?>

		<!--  -->

		<!-- Recomended Box -->

		<?php include( 'includes/recommended.php') ?>

		<!--  -->

		<!-- Page content -->
		<div class="content">
			<h2 class="content-title">Reviews</h2>
			<hr>
			
			
			<?php foreach ($posts as $post): ?>
			<div class="post" style="margin-left: 0px; height: 400px;" >
				<img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="post_image" alt="" style="width: 200px; margin-left: 22%">
        			<!-- Added this if statement... -->
				<?php if (isset($post['type']['name'])): ?>
				<a 
				href="<?php echo BASE_URL . 'filtered_posts.php?type=' . $post['type']['id'] ?>"
				class="btn category">
				<?php echo $post['type']['name'] ?>
				</a>
				<?php endif ?>

				<a href="single_post.php?post_id=<?php echo $post['id']; ?>">
					<div class="post_info">
						<h3><?php echo $post['title'] ?></h3>
						<div class="info">
							<span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
							<span class="read_more">Read more...</span>
						</div>
					</div>
				</a>
			</div>
			<?php endforeach ?>

		</div>

		
		
		<!-- // Page content -->

		<!-- footer -->
		
		<?php include('includes/footer.php') ?>

		<!--  -->

	</div>
	<!-- // container -->
</body>
</html>