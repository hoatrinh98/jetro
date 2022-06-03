<?php
include '../include/header.php';
include '../Categories.php';

$category = new Categories();
$category->deleteCategoryById();

?>