<?php include('../include/header.php');
    include('../Posts.php');

    $get_data = new Post();
    $categories = $get_data->getInfoCategories();
    $posts = $get_data->getInfoPostByStatus1();
    // var_dump($posts);
    // return;
?>
	<main>
		<div class="header-title">
            <h1>PORTFOLIO</h1>
        </div>
        <div class="categories">
            <ul>
                <li><b>Danh Mục</b></li>
                <li><a href="" class="active">ALL</a></li>
                <?php foreach($categories as $value) : ?>
                <li><a href=""><?php echo $value['name'] ?></a></li>
                <?php endforeach;?>
                <!-- <li><a href="">CATEGORY 2</a></li>
                <li><a href="">CATEGORY 3</a></li>
                <li><a href="">CATEGORY 4</a></li> -->
            </ul>
        </div>
        <?php foreach($posts as $post): ?>
        <div class="itemImgPortfolio">
            <div class="item1">
                <a  href="portofolioitem.php?id=<?php echo $post['id'] ?>">
                    <img src="<?php echo '../img/ImagePost/' . $post['image'] ?>" width="226px" height="167px" alt="ảnh" />
                    <div class="text">
                        <h2><?php echo $post['title'] ?></h2>
                        <p><?php echo DATE_FORMAT(date_create($post['create_at']), "M d, Y")?></p>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
	</main>
<?php include('../include/footer.php') ?>