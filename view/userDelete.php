<?php
include '../include/header.php';
    include('../Users.php');
    $user = new User();
    $user->deleteUser($_GET['userId']);
?>