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
        // var_dump($_POST);
    }
    var_dump('ok---');
?>
<div class="container col-lg-7 mx-auto">
	<div id="contents">
		<div id="about">
            <h1>Cập nhật thông tin cá nhân</h1>  
            <form method="POST" enctype="multipart/form-data" id="HDpro">
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
                    <option value="<?php echo $user['gender'] ?>">
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

                <label style="margin: 0px 5px 0px 50px" ><b>Avatar</b></label>
                <img style="margin: 10px 20px 0px 50px"  src= "<?php echo "../img/avatar/" . $user['image']; ?> " alt="avatar" width="200px" height="200px"> 
                <input 
                    type="file" 
                    class="form-control"  
                    accept="image/*" 
                    name="image" 
                    id="file"  
                    onchange="loadFile(event)"
                    style="display: none;">
                <label for="file" style="cursor: pointer;"><b>New Avatar</b></label>
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
<?php
    include('../include/footer.php');
?>