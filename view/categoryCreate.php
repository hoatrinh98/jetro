<?php 
    include('../include/header.php');
    include '../Categories.php';

    $category = new Categories();
    $data = [];
    if(isset($_POST['submit'])) {
        $data = $category->createCategory($_POST['category-name'], $_POST['txt-description']);
    }


?>
<div class="container col-lg-7 mx-auto">
<div id="contents">
		<div id="about">
		
            <h1>Thêm danh mục bài viết</h1>
            <form method="POST" id="HDpro">
			
				<label>Tên danh mục</label>
                <input 
                    type="text" 
                    class="form-control" 
                    value="<?php echo count($data) > 0 ? $data['name'] :''; ?>"
                    name="category-name" required />

                <label>Mô tả danh mục</label><br>
				<textarea style="width: 100%; height: 150px"  name="txt-description">
                    <?php echo count($data) > 0 ? $data['description'] : ''; ?>
                </textarea>

                <input style="margin-top: 25px" type="submit" name="submit" value="Thêm bài viết">
            </form>
			
        </div>
	</div>
</div>
<?php
    include('../include/footer.php')
?>