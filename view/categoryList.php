<?php 
include '../connect.php';
include('../include/header.php');
include '../Categories.php';

$category = new Categories();
$categories = $category->getCategoryList();
global $i;
$i = 1;


?>
<div class="container col-lg-10 mx-auto">
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