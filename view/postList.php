<?php
    include('../include/header.php')
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
        <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Hình ảnh bài viết</th>
            <th scope="col">Tác Giả</th>
            <th scope="col">Danh mục bài viết</th>
            <th scope="col">Tiêu đề bài viết</th>
            <th scope="col">Nội dung bài viết</th>
            <th scope="col">Trạng thái bài viết</th>
            <th scope="col">Chỉnh sửa</th>
            <th scope="col">Xóa</th>
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