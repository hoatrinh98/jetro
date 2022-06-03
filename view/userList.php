<?php 
    include ('../include/header.php');
    include('../Users.php');

    $get_data = new User();
    $infoUsers = $get_data->getInfoUsers();
    
?>
<div class="container col-lg-10 mx-auto">
    <div class="d-flex justify-content-start py-3">
        <ul class="nav nav-pills">
          <li class="nav-item"><a href="./userList.php" class="nav-link active" aria-current="page">Manager</a></li>
          <li class="nav-item"><a href="./userList.php" class="nav-link">Người Dùng</a></li>
          <li class="nav-item"><a href="./postListCenship.php" class="nav-link">Đăng Bài</a></li>
          <li class="nav-item"><a href="./categoryList.php" class="nav-link">Danh Mục</a></li>
          <li class="nav-item"><a href="./postListAdmin.php" class="nav-link">Bài Viết</a></li>
        </ul>
      </div>
    <div class="content">
    <h1>User List</h1>
        <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Avatar</th>
            <th scope="col">UserName</th>
            <th scope="col">FullName</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Gender</th>
            <th scope="col">Password</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i =1;
                foreach($infoUsers as $value){
            ?>
                <tr>
                <th scope="row"><?php echo $i++ ?></th>
                <td>    
                    <img src="<?php echo "../img/avatar/" . $value['image'] ?>" alt="avatar" 
                                width=90px height=50px style = "border-radius: 5%"/>
                </td>
                <td><?php echo $value['username'] ?></td>
                <td><?php echo $value['full_name'] ?></td>
                <td><?php echo $value['email'] ?></td>
                <td><?php echo $value['num_phone'] ?></td>
                <td>
                    <?php 
                        if($value['gender'] == 1){
                            echo "Male";
                        }
                        elseif($value['gender'] == 2){
                            echo "Female";
                        }
                        else{
                            echo "Other";
                        }
                    ?>
                </td>
                <td><?php echo $value['password_current'] ?></td>
                
                <td>
                    <a href="userDelete.php?userId=<?php echo $value['id'] ?>" onclick="return confirm ('Bạn có chắc chắn muốn xóa không')">
                    <button class="btn btn-danger">Xoá</button>
                    </a>
                </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
        <div style="margin: 20px 0px 0 20px;">
                <a href="userList.php"><button>Back to Manager</button></a>
        </div>
    </div>
</div>



<?php
    include('../include/footer.php')
?>