<?php
session_start();
include('../controller/redirect.php');
include('../model/db.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['add-btn'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $slug = mysqli_real_escape_string($conn, $_POST['slugname']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $meta_title = mysqli_real_escape_string($conn, $_POST['meta_title']);
    $meta_description = mysqli_real_escape_string($conn, $_POST['meta_description']);
    $meta_keyword = mysqli_real_escape_string($conn, $_POST['meta_keyword']);
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';
    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $file_ext = pathinfo($image, PATHINFO_EXTENSION);
    $file_name = time().'.'.$file_ext; 
    $cate_query = "INSERT INTO categories 
        (name, slug, description, status, popular, image, meta_title, meta_description, meta_keywords) 
        VALUES (
            '$name',
            '$slug',
            '$description',
            '$status',
            '$popular',
            '$file_name',
            '$meta_title',
            '$meta_description',
            '$meta_keyword'
        )";

    // Execute query
    $cate_query_run = mysqli_query($conn, $cate_query); 

    if($cate_query_run){
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$file_name);
        reDirect("../Admin/add.php", "Adding Successfully.", "alert-success");
    } else {
        reDirect("../Admin/add.php", "Something went wrong, try again. Error: " . mysqli_error($conn), "alert-danger");
    }
}
?>
