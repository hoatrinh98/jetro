<?php include '../include/header.php' ?>
<div class="container col-lg-7 mx-auto">
	<div id="contents">
		<div id="about">
		
            <h1>Nee Infomation</h1>
            <form method="POST" id="HDpro">

            <label>Tên tác giả</label>
                <input type="text" name="shop-name" class="form-control" style ="display:none"
                    value="<?php?>" required />
                <input type="text" class="form-control" value="<?php?>" disabled /> 

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

                <input 
                    type="file" 
                    class="form-control"  
                    accept="image/*" 
                    name="image" 
                    id="file"  
                    onchange="loadFile(event)" 
                    style="display: none;">
                <label for="file" style="cursor: pointer; margin: 0px 5px 0px 150px "><b>Hình ảnh bài viết</b></label>
                <img style="margin-top: 10px" id="output" width="250" height="250px" />

                <input style="margin:25px 375px; width: 100px; height: 50px; background-color: #e8663c; border: 0px; border-radius: 5px;" 
                        type="submit"name="sub-register" value="Đăng ký">

            </form>
			
        </div>
	</div>

</div>
<?php include '../include/footer.php' ?>