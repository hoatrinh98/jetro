<?php include('../include/header.php');
	include('../Posts.php');

	$get_data = new Post();

	$post = $get_data->getInfoPostById($_GET['id']);
	// var_dump($posts);
    $postRecent = $get_data->getPostByCategory();

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
                <?php foreach($postRecent as $post): ?>
                <div style="height: 300px;" class="item1" onclick="myHand(<?php echo $post['id'] ?>)" >
                    <img src="../img/ImagePost/<?php echo $post['image'] ?>" alt="">
                    <div class="blog-post-meta">
                        <h3><?php echo $post['title'] ?></h3>
                        <h4><?php echo $post['create_at'] ?></h4>
                    </div>
                </div>
            <?php endforeach; ?>
					
				</div>
		</div>
	</main>

    <script>
    function myHand(id) {
        window.location = "./portofolioitem.php?id=" + id;
    }
</script>
<? include('../include/footer.php') ?>