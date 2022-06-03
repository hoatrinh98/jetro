<?php 
include('../include/header.php');
// include '../connect.php';
include '../Posts.php';

$post = new Post();
$postNew = $post->getPostsNewMost();
$postView = $post->getPostsView();
?>
	<main>
		<div class="banner">
			<img src="../img/banner.png" alt="">
        	<img src="../img/next.png" alt="" class="next">
			<div class="slide_one">
				<h2>SLIDE ONE</h2>
				<p>Lorem ipsum dolor sit amet, malorum recteque reprehendunt ea vel. Urbanitas adolescens vim te, per at tritani aperiri. Adhuc invenire convenire his ea.</p>
			</div>
		</div>
		<div class="itemImgIndex">
			<div class="item1">
				<img src="../img/1.png" alt="">
			</div>
			<div class="item2">
				<img src="../img/images/image2.jpg" alt="">
			</div>
			<div class="item3">
				<img src="../img/3.png" alt="">
			</div>
			<div class="item4">
				<img src="../img/4.png" alt="">
			</div>
			<div class="item5">
				<img src="../img/5.png" alt="">
			</div>
			<div class="item6">
				<img src="../img/6.png" alt="">
			</div>
		</div>
		<div class="itemParaph">
            <?php foreach($postNew as $post): ?>
                <div class="1">
                    <img style="width: 100%; height: 200px" src="../img/ImagePost/<?php echo $post['image'] ?>" alt=""  style="width: 100%; height: 200" >
                    <br>
                    <p style="font-size: 25x; color:brown"><?php echo $post['title'] ?></p>
                    <!-- <h2></h2> -->
                    <p style="height: 110px;"><?php echo strlen($post['content']) < 200 ? $post['content'] : substr($post['content'], 0, 200) . ' ... ' ?></p>
                    <button><a href="./portofolioitem.php?id=<?php echo $post['id'] ?>">More</a></button>
                </div>
            <?php endforeach; ?>
			
		</div>
		<div class="title"><span>RECENT WORKS</span></div>
		<div class="recent-works">
            <?php foreach($postView as $post): ?>
                <div style="height: 300px;" class="item1" onclick="myHand(<?php echo $post['id'] ?>)" >
                    <img src="../img/ImagePost/<?php echo $post['image'] ?>" alt="">
                    <div class="blog-post-meta">
                        <h3><?php echo $post['title'] ?></h3>
                        <h4><?php echo $post['create_at'] ?></h4>
                    </div>
                </div>
            <?php endforeach; ?>
			
			
		</div>
	</main>
<script>
    function myHand(id) {
        window.location = "./portofolioitem.php?id=" + id;
    }
</script>


<?php include('../include/footer.php') ?>
