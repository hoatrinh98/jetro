<?php
    include('../include/header.php');
    include '../Posts.php';
    $get_data = new Post();
    $posts = $get_data->getInfoPost();

?>
<div class="container col-lg-11 mx-auto">
    <div class="d-flex justify-content-start py-3">
        <ul class="nav nav-pills">
          <li class="nav-item"><a href="userList.php" class="nav-link active" aria-current="page">Manager</a></li>
          <li class="nav-item"><a href="userList.php" class="nav-link">Users</a></li>
          <li class="nav-item"><a href="../news/PageAdmin.php" class="nav-link">News</a></li>
          <li class="nav-item"><a href="../categories/categoryList.php" class="nav-link">Categories</a></li>
          <li class="nav-item"><a href="../contact/contactList.php" class="nav-link">Contact</a></li>
        </ul>
      </div>
    <div class="content">
    <h1>User List</h1>
    <a href="postNew.php"><button style="margin: 10px 0px" type="button" class="btn btn-primary">Thêm mới bài viết</button></a>

        <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Hình ảnh bài viết</th>
            <th scope="col">Tác Giả</th>
            <th scope="col">Danh mục bài viết</th>
            <th scope="col">Tiêu đề bài viết</th>
            <th scope="col">Nội dung bài viết</th>
            <th scope="col">Ngày Viết</th>
            <th scope="col">Chỉnh sửa</th>
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