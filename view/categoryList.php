<?php 
include('../include/header.php');
include '../Categories.php';
include('../Posts.php');

$category = new Categories();
$categories = $category->getCategoryList();
global $i;
$i = 1;


    if(!(isset($_SESSION['role']) && $_SESSION['role'] == 2)){
        echo '<script>alert("Bạn không có quyền truy cập đến trang này");</script>';
        echo '<script>window.location= "index.php";</script>';
    }

  
    
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
    <h1>Category List</h1>
        <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach($categories as $category): ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $category['name'] ?></td>
                    <td><?php echo strlen($category['description']) < 300 ? $category['description'] : substr($category['description'], 0, 300) . " ... "  ; $i++; ?></td>
                    <td><a href="./categoryUpdate.php?category-id=<?php echo $category['id'] ?>">Update</a></td>
                    <td><a href="./categoryDelete.php?category-id=<?php echo $category['id'] ?>">Delete</a></td>

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