<?php
    include('../include/header.php');
    include '../Posts.php';
    $get_data = new Post();
    $posts = $get_data->getInfoPostByUserId();


?>
<div class="container col-lg-11 mx-auto">
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
            <th scope="col">Trạng thái bài viết</th>
            <th scope="col">Chỉnh sửa</th>
            <th scope="col">Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                foreach($posts as $post):
            ?>
<tr>
                <td><?php echo $i++ ?></td>
                <td>ảnh</td>
                <td><?php echo $post['user_name'] ?></td>
                <td><?php echo $post['category_name'] ?></td>
                <td><?php echo $post['title'] ?></td>
                <td><?php echo strlen($post['content']) < 100 ? $post['content'] : substr($post['content'],0,100) . "..." ?></td>
                <td><?php echo $post['create_at'] ?></td>
                <?php if($post['status'] == 0): ?>
                    <td><a href="./postBV.php?id=<?php echo $post['post_id'] ?>">Đăng bài</a></td>
                <?php elseif($post['status'] == 1):  ?>
                    <td><a href="">Đã Đăng</a></td>
                <?php else: ?>
                <?php endif; ?>
                <td><a href="">Sửa</a></td>
                <td><a href="">Xóa</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
        <div style="margin: 20px 0px 0 20px;">
                <a href="userList.php"><button>Back to Manager</button></a>
        </div>
    </div>
</div>

<?php include('../include/footer.php') ?>