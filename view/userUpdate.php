<?php 
    include('../include/header.php');
    include('../Users.php');

    $get_data = new User();

    $user = $get_data->getInfoUserById($_GET['userId']);
    echo '<pre>';
    print_r($user);
    echo '</pre>';
    if(isset($_POST['sub-update'])){
        $get_data->updateUser($_POST, $_GET['userId']);
    }
    var_dump('ok---');
?>
<div class="container col-lg-7 mx-auto">
	<div id="contents">
		<div id="about">
            <h1>Cập nhật thông tin cá nhân</h1>
            <form method="POST" enctype="multipart/form-data" id="HDpro">
                <div class="personal-image">
                    <label style="all: unset;">
                        <input style ="display: none" type="file" name="image" acept="image/*" id="file">
                        <figure class="personal-figure">
                            <img src="<?php echo "../img/avatar/" . $user['image']; ?>" class="personal-avatar" 
                                    alt="avatar" width = "120px" height = "120px" style="border-radius: 5px;" id="avatar">
                            <figcaption class="personal-figcaption">
                                <img src="//www.gstatic.com/images/icons/material/system/2x/photo_camera_white_24dp.png">
                            </figcaption>
                        </figure>
                    </label>
                </div>    
                <label>UserName</label>
                <input type="text" class="form-control" name="name" value="<?php echo $user['username']; ?>" required />

                <label>FullName</label>
                <input type="text" class="form-control" name="full-name" value="<?php echo $user['full_name']; ?>" required />

                <label>Email Address</label>
                <input type="email" class="form-control" name="email"
                    value = <?php echo $user['email'] ?>  required />

                <label>Phone Number</label>
                <input type="text" class="form-control" name="phone"
                    value = <?php echo $user['num_phone'] ?> required />

                <label>Gender</label><br>
                <select name = "gender" style="width:100%; height:38px; border:1px solid #ced4da; border-radius: 0.25rem; " class="form-select" aria-label="Default select example">
                    <option>
                        <?php 
                            if($user['gender'] == 1){
                                echo "Male";
                            }
                            elseif($user['gender'] == 2){
                                echo "Female";
                            }
                            else{
                                echo "Other";
                            }
                        ?>
                    </option>
                    <option >Select gender</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    <option value="3">Other</option>
                </select><br>

                <label>Password</label>
                <input type="text" class="form-control" name="password"
                    value = <?php echo $user['password_current'] ?> required minlength="4" />

                <input  style="margin:25px 375px; width: 100px; height: 50px; background-color: #e8663c; border: 0px; border-radius: 5px;" 
                        type="submit" name="sub-update" value="Save">
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