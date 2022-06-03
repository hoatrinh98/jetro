<?php
include '../connect.php';
include '../Categories.php';

$category = new Categories();
$category->deleteCategoryById();

?>