<?php include '../include/header.php';
    include('../Posts.php');
    $get_data = new Post();

    $categories = $get_data->getInfoCategories();
    // var_dump($categories);
    if(isset($_POST['sub-register'])){
        $get_data->createPost($_POST);
        var_dump('okk');
    }
    

?>
<div class="container col-lg-7 mx-auto">
	<div id="contents">
		<div id="about">
		
            <h1>Nee Infomation</h1>
            <form method="POST" enctype="multipart/form-data" id="HDpro">

            <label>Tên tác giả</label>
                <input type="text" name="author" class="form-control" style ="display:none"
                    value="<?php echo $_SESSION['id'] ?>" required />
                <input type="text" class="form-control" value="<?php echo $_SESSION['username']?>" disabled /> 

                <label>Danh mục bài viết</label><br>
                <select name = "category" style="width:100%; height:38px; border:1px solid #ced4da; border-radius: 0.25rem; " class="form-select" aria-label="Default select example">
                    <option selected>Chọn danh mục</option>
                    <?php foreach($categories as $value): ?>
                        <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                    <?php endforeach; ?>
                </select><br>

				<label>Tiêu đề bài viết</label>
                <input type="text" class="form-control" name="txt-title" required />

				<label>Nội dung bài viết</label><br>
				<textarea style="width: 100%; height: 150px" name="txt-content"></textarea>

                <input 
                    type="file" 
                    class="form-control"  
                    accept="image/*, video/*" 
                    name="image" 
                    id="file"  
                    onchange="loadFile(event)" 
                    style="display: none;">
                <label for="file" style="cursor: pointer; margin: 0px 5px 0px 150px "><b>Hình ảnh bài viết</b></label>
                <img style="margin-top: 10px" id="output" width="250" height="250px" />

                <input style="margin:25px 375px; width: 100px; height: 50px; background-color: #e8663c; border: 0px; border-radius: 5px;" 
                        type="submit" name="sub-register" value="Thêm bài viết">

            </form>
			
        </div>
	</div>
    <script>
        var loadFile = function(event) {
	    var image = document.getElementById('output');
	    image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
</div>
<?php include '../include/footer.php' ?>