<?php include('../include/header.php');
    if(!(isset($_SESSION['role']) && $_SESSION['role'] == 2)){
        echo '<script>alert("Bạn không có quyền truy cập đến trang này");</script>';
        echo '<script>window.location= "index.php";</script>';
    }

    include('../Posts.php');
    
    $get_data = new Post();
    $categories = $get_data->getInfoCategories();
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
            <th scope="col">STT</th>
            <th scope="col">Tên danh mục</th>
            <th scope="col">Mô tả danh mục</th>
            </tr>
        </thead>
        <tbody>
                
        </tbody>
    </table>
        <div style="margin: 20px 0px 0 20px;">
                <a href="userList.php"><button>Back to Manager</button></a>
        </div>
    </div>
</div>
<?php include('../include/footer.php') ?>