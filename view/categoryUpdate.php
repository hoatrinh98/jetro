<?php
    include '../connect.php';
    include '../include/header.php';
    include '../Categories.php';

    $category = new Categories();
    $data = [];
    $data = $category->getInfoCategoryById($_GET['category-id'])[0];
    if(isset($_POST['submit-ud'])) {
        $data = $category->updateCategory( $_POST['txt-description']);
    }

?>



<div class="container col-lg-7 mx-auto">
<div id="contents">
		<div id="about">
		
            <h1>Update category</h1>
            <form method="POST" id="HDpro">
			
				<label>Name</label>
                <input 
                    disabled
                    type="text" 
                    class="form-control" 
                    value="<?php echo $data['name'] ; ?>"
                    name="category-name" required />

                <label>Description</label><br>
				<textarea style="width: 100%; height: 150px"  name="txt-description">
                    <?php echo $data['description'] ?>
                </textarea>

                <input style="margin-top: 25px" type="submit" name="submit-ud" value="Update">
            </form>
			
        </div>
	</div>
</div>

<?php include '../include/footer.php' ?>