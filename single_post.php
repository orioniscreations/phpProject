<?php  include('config.php'); ?>
<?php  include('includes/public_functions.php'); ?>


<?php
?> 

<?php 
	
	$post = getPost($_GET['post_id'] ?? false) ;
	
	$type = getAllTopics();
?>
<?php include('includes/header.php')?>
<title> <?php echo $post['title'] ?> </title>
</head>
<body>
<div class="container">
	<!-- Navbar -->
		<?php include('includes/navbar.php'); ?>
	<!-- // Navbar -->
	
	<div class="content" >
		<!-- Page wrapper -->
		<div class="post-wrapper">
			<!-- full post div -->
			<div class="full-post-div">
			        <?php if ($post['published'] == false): ?>
				        <h2 class="post-title">Sorry... This post has not been published</h2>
			        <?php else: ?>
				        <h2 class="post-title"><?php echo $post['title']; ?></h2>
                                
                                
                                
                                <div class="post-body-row">
                                  <div class="image-body-column">
                                            <div id="post-image-div">
                                                     <img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="post_image_inner" alt="" >
                                                   <br>
                                                  <div class="post-body-rating">
                                                         
                                                         <p style="padding: 10px;">Rating: <?php echo $post['rating'] ?> / 5</p>
                                                       
                                                  </div>
                                               
                                          </div>
                                   </div>
                                  <div class="post-body-column">

                                        <div class="post-descrption-div" style="padding: 20px;">
                                        <p style="padding: 10px"><b>Description:</b></p>       
                                        <?php echo $post['description'] ?>
                                        </div>
                                          <div class="post-body-div">
                                       
					<?php echo html_entity_decode($post['body']); ?>
                                </div>
                        </div>
                </div>
                     
			<?php endif ?>
			</div>
			<!-- // full post div -->
			
			<!-- comments section -->
			
		</div>
		<!-- // Page wrapper -->

		
</div>
</div>
<!-- // content -->

<?php include('includes/footer.php'); ?>