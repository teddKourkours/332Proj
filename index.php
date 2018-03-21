<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/public_functions.php') ?>


<!-- Retrieve all posts from database  -->
<!-- 
?php $posts = getMoviesAvailable(); ?> -->

<!DOCTYPE html>
<html>
	<head>	
		<?php require_once(ROOT_PATH . '/includes/head_section.php') ?>
		<title>Online Movie Tiket Service | Home </title>
	</head>
<body>
	<!-- container - wraps whole page -->
	<div class="container">
	
		<!-- Navbar -->
		<?php require_once(ROOT_PATH . '/includes/navbar.php') ?>
		
		<!-- banner -->
		<?php include(ROOT_PATH . '/includes/banner.php') ?>

		<!-- Page content -->
		<div class="content">
			<h2 class="content-title">Recent Articles</h2>
			<hr>
			<!-- more content still to come here ... -->
				<!-- Loops through all movies... -->
				<?php foreach ($posts as $post): ?>
					<div class="post" style="margin-left: 0px;">
					<img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="post_image" alt="">
						<a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
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
		
		<!-- footer -->
		<?php require_once(ROOT_PATH . '/includes/footer.php') ?>
</body>
</html>