<?php
include ('connect.php');
class Post extends Database{

    public function getInfoUserById()
    {
        $sql = "SELECT * FROM users WHERE id = " . $_SESSION['id'];
        $data = $this->get_data($sql);
        return;
    }

    public function getInfoPostByUserId()
    {
        $sql = "SELECT c.id 'category_id', c.name 'category_name', u.id 'user_id', u.username 'user_name', 
                p.id, p.title, p.content, p.count_view, p.create_at, p.status
                FROM `categories` c, `posts` p, `users` u
                WHERE c.id = p.category_id AND p.user_id = u.id AND u.id = " . $_SESSION['id'];
        $data = $this->get_data($sql);
        return $data;

    }

    public function getInfoPost()
    {
        $sql = "SELECT c.id 'category_id', c.name 'category_name', u.id 'user_id', u.username 'user_name', 
                p.id, p.title, p.content, p.count_view, p.create_at, p.status
                FROM `categories` c, `posts` p, `users` u
                WHERE c.id = p.category_id AND p.user_id = u.id";
        $data = $this->get_data($sql);
        return $data;

    }

    public function getInfoCategories()
    {
        $sql = "SELECT * FROM categories";
        $data = $this->get_data($sql);
        return $data;
    }

    public function getInfoPostByStatus()
    {
        $sql = "SELECT c.id 'category_id', c.name 'category_name', u.id 'user_id', u.username 'user_name', 
                p.id, p.title, p.content, p.count_view, p.create_at, p.status
                FROM `categories` c, `posts` p, `users` u
                WHERE c.id = p.category_id AND p.user_id = u.id AND p.status = 0";
        $data = $this->get_data($sql);
        return $data;
    }
    
    public function uploadImagePost($data)
    {
        if(!isset($_FILES['image'])){
            return 'You have not selected avatar !';
        }

        $temp_name = $_FILES['image']['tmp_name'];
        $file_size = $_FILES['image']['size'];
        $type = explode('/', $_FILES['image']['type']);
        $extension = end($type);
        $allowed = ['png', 'jpg', 'jpeg', 'jfif'];

        if(!in_array($extension, $allowed)){
            return 'File phải có định dạng png, jpg, jpeg, ifif ';
        }

        if($file_size >= 5000000){
            return 'Dung lượng file quá lớn !';
        }
        
        
        $path = '../img/imagePost/' . $data . '.' . $extension;

        $is_upload_success = move_uploaded_file($temp_name, $path);

        if(!$is_upload_success){
            return 'Thêm ảnh thất bại !';
        }

        return '';

    }

    public function createPost($data)
    {
        $authorName = trim($data['author']);
        $category = trim($data['category']);
        $title = trim($data['txt-title']);
        $content = trim($data['txt-content']);

        if(empty($authorName) || empty($category) || empty($title) || empty($content)){

            echo "<script>alert('Các trường thông tin không được bỏ trống');</script>";
            // echo "<script>window.location='postList.php';</script>";
            return;

        }
        
        $upAvatar = $this->uploadImagePost($authorName);
            if (strlen($upAvatar) > 0) {
                echo "<script>alert('" . $upAvatar . "')</script>";
                return;
            }

        $type = explode('/', $_FILES['image']['type']);
        $image = $authorName . '.' . end($type);

        $post = [
            'category_id'   => $category,
            'user_id'       => $authorName,
            'title'         => $title,
            'content'       => $content,
            'image'         => $image,
            'create_at'     => date("Ymd"),
            'count_view'    => 0,

        ];

        $insert = $this->insert('posts', $post);
        if($insert){
            echo "<script>alert('Thêm bài viết thành công');</script>";
            echo "<script>window.location='postList.php';</script>";
            return;
        }
        else
        {
            echo "<script>alert('Thêm bài viết thất bại');</script>";
            echo "<script>window.location='postList.php';</script>";
            return;
        }


    }

}

?>