<?php 
    include('../include/header.php');
    include('../Users.php');

    $get_data = new User();
    $info = null;
    
    if(isset($_POST['sub-register'])){
        $get_data->insertUser($_POST);
    }
    // var_dump('ok---');
?>
<div class="container col-lg-7 mx-auto">
	<div id="contents">
		<div id="about">
            <h1>SIGN UP</h1>

            <form method="POST" enctype="multipart/form-data" id="HDpro">
                
                <label>UserName</label>
                <input type="text" class="form-control" name="name" required />

                <label>FullName</label>
                <input type="text" class="form-control" name="full-name" required />

                <label>Email Address</label>
                <input type="email" class="form-control" name="email"  required />

                <label>Phone Number</label>
                <input type="text" class="form-control" name="phone" required />

                <label>Gender</label><br>
                <select name = "gender" style="width:100%; height:38px; border:1px solid #ced4da; border-radius: 0.25rem; " class="form-select" aria-label="Default select example">
                    <option selected>Select gender</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    <option value="3">Other</option>
                </select><br>

                <label>Password</label>
                <input type="password" class="form-control" name="password" required minlength="4" />

                <input 
                    type="file" 
                    class="form-control"  
                    accept="image/*" 
                    name="image" 
                    id="file"  
                    onchange="loadFile(event)" 
                    style="display: none;">
                <label for="file" style="cursor: pointer; margin: 0px 5px 0px 150px "><b>Avatar</b></label>
                <img style="margin-top: 10px" id="output" width="250" height="250px" />

                <input style="margin:25px 375px; width: 100px; height: 50px; background-color: #e8663c; border: 0px; border-radius: 5px;" type="submit"name="sub-register" value="Đăng ký">
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
<?php
    include('../include/footer.php');
?>