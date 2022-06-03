<?php
include ('connect.php');
class Post extends Database{

    public function getInfoUserById(Type $var = null)
    {
        $sql = "SELECT * FROM users WHERE id = '$userId' ";
        $data = $this->get_data($sql);
        return;
    }

    public function getInfoPostByPostId()
    {
        
    }

    // public function getShopByUserId()
    // {
    //     $sql = "SELECT * FROM shops WHERE user_id = " . $_SESSION['id'] . " AND id = " . $_GET['id'];
    //     $data = $this->get_data($sql);
    //     return $data[0];
    // }
}

?>