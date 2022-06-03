<?php include '../include/header.php' ?>
<div class="container col-lg-7 mx-auto">
	<div id="contents">
		<div id="about">
		
            <h1>Nee Infomation</h1>
            <form method="POST" id="HDpro">

            <label>Tên shop</label>
                <input type="text" name="shop-name" class="form-control" style ="display:none"
                    value="<?php echo $shop['id'] ?>" required />
                <input type="text" class="form-control" value="<?php echo $shop['name'] ?>" disabled /> 

                <label>Danh mục bài viết</label><br>
                <select name = "gender" style="width:100%; height:38px; border:1px solid #ced4da; border-radius: 0.25rem; " class="form-select" aria-label="Default select example">
                    <option selected>Chọn danh mục</option>
                    <option value="1">Phim Ảnh</option>
                    <option value="2">Ca Nhạc</option>
                    <option value="3">Ngôi sao</option>
                </select><br>

				<label>Tiêu đề bài viết</label>
                <input type="text" class="form-control" name="txt-title" required />

				<label>Nội dung bài viết</label><br>
				<textarea style="width: 100%; height: 150px" name="txt-content"></textarea>

                <input type="submit" name="submit" value="Thêm bài viết">
            </form>
			
        </div>
	</div>

</div>
<?php include '../include/footer.php' ?>