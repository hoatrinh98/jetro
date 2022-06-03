<?php include('../include/header.php') ?>
<div class="container col-lg-7 mx-auto">
	<div id="contents">
		<div id="about">
		
            <h1>Nee Infomation</h1>
            <form method="POST" id="HDpro">

            <label>Tên tác giả</label>
                <input type="text" name="shop-name" class="form-control" style ="display:none"
                    value="" required />
                <input type="text" class="form-control" value="" disabled /> 

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

                <label style="margin: 0px 5px 0px 50px" ><b>Ảnh bài viết</b></label>
                <img style="margin: 10px 20px 0px 50px"  src= "../img/avatar/Mai.jpeg" alt="avatar" width="200px" height="200px"> 
                <input 
                    type="file" 
                    class="form-control"  
                    accept="image/*" 
                    name="image" 
                    id="file"  
                    onchange="loadFile(event)"
                    style="display: none;">
                <label for="file" style="cursor: pointer;"><b>Ảnh mới</b></label>
                <img style="margin-top: 10px" id="output" width="200" height="200px" /> <br>

                <input style=" width: 10rem; height: 2.5rem; margin: 10px 50px 0px 250px;" type="submit" name="sub-update" value="Save">
                <input style=" width: 10rem; height: 2.5rem;" type="submit"name="sub-exit" value="Exit">

            </form>
			
        </div>
	</div>

</div>
<script>
        var loadFile = function(event) {
	    var image = document.getElementById('output');
	    image.src = URL.createObjectURL(event.target.files[0]);
        };
</script>
<?php include('../include/footer.php') ?>