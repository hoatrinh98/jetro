<?php
    include('../include/header.php');
    if(!(isset($_SESSION['role']) && $_SESSION['role'] == 2)){
        echo '<script>alert("Bạn không có quyền truy cập đến trang này");</script>';
        echo '<script>window.location= "index.php";</script>';
    }
    include '../Posts.php';
    $get_data = new Post();
    $posts = $get_data->getInfoPost();

?>
<div class="container col-lg-11 mx-auto">
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
    <a href="postNew.php"><button style="margin: 10px 0px" type="button" class="btn btn-primary">Thêm mới bài viết</button></a>

        <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">STT</th>
            <th scope="col">Hình ảnh bài viết</th>
            <th scope="col">Tác Giả</th>
            <th scope="col">Danh mục bài viết</th>
            <th scope="col">Tiêu đề bài viết</th>
            <th scope="col">Nội dung bài viết</th>
            <th scope="col">Ngày Viết</th>
            <th scope="col">Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                foreach($posts as $post):
            ?>

                <th><?php echo $i++ ?></th>
                <th>ảnh</th>
                <th><?php echo $post['user_name'] ?></th>
                <th><?php echo $post['category_name'] ?></th>
                <th><?php echo $post['title'] ?></th>
                <th><?php echo strlen($post['content']) > 100 ? $post['content'] : substr($post['content'],0,100) . "..." ?></th>
                <th><?php echo $post['create_at'] ?></th>
                <th><a href="">Xóa</a></th>

            <?php endforeach; ?>
        </tbody>
    </table>
        <div style="margin: 20px 0px 0 20px;">
                <a href="userList.php"><button>Back to Manager</button></a>
        </div>
    </div>
</div>

<?php include('../include/footer.php') ?>