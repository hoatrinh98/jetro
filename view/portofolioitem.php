<?php include('../include/header.php');
	include('../Posts.php');

	$get_data = new Post();

	$post = $get_data->getInfoPostById($_GET['id']);
	// var_dump($posts);


?>
	<main>

		<div class="header-title">
			<h1><?php echo $post['title'] ?></h1>
		</div>
		<div class="portofolio-item">
				<div>
					<img src="<?php echo '../img/ImagePost/' . $post['image'] ?>" width="921px" height="391px" alt="" />
				</div>
				<div >
					<?php echo $post['content'] ?>
				</div>
				<div class="blog-post-meta">
						<h3><?php echo $post['user_name'] ?></h3>
						<h4><b><?php echo DATE_FORMAT(date_create($post['create_at']), "M d, Y") ?></b></h4>
				</div>

				<!--recent-works   -->
				<div class="title"><span>RECENTED ITEMS</span></div>
				<!-- item mage (giống index)-->
				<div class="recent-works">
					<div class="item1">
						<img src="../img/images/image1.jpg" alt="">
						<div class="blog-post-meta">
							<h3>POST TITLE APPEAR HERE</h3>
							<h4>JUNE 15,2013</h4>
						</div>
					</div>
					<div class="item2">
						<img src="../img//images/image2.jpg" alt="">
						<div class="blog-post-meta">
							<h3>POST TITLE APPEAR HERE</h3>
							<h4>JUNE 15,2013</h4>
						</div>
					</div>
					<div class="item3">
						<img src="../img/images/image3.jpg" alt="">
						<div class="blog-post-meta">
							<h3>POST TITLE APPEAR HERE</h3>
							<h4>JUNE 15,2013</h4>
						</div>
					</div>
					<div class="item4">
						<img src="../img/images/image4.jpg" alt="">
						<div class="blog-post-meta">
							<h3>POST TITLE APPEAR HERE</h3>
							<h4>JUNE 15,2013</h4>
						</div>
					</div>
				</div>
		</div>
	</main>
<? include('../include/footer.php') ?>