<?php
session_start();
include('../func/redirect.php');
include('../model/db.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['add-btn'])) {
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
    $file_name = time() . '.' . $file_ext;
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
    $cate_query_run = mysqli_query($conn, $cate_query);

    if ($cate_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $file_name);
        $_SESSION['msg'] = "Product Insert Success.";
        header('location: ../Admin/add.php');
    } else {
        $_SESSION['msg'] = "Product Insert Error: " + mysqli_error($conn);
        header('location: ../Admin/add.php');
    }
} else if (isset($_POST['update-btn'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $slug = mysqli_real_escape_string($conn, $_POST['slugname']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $meta_title = mysqli_real_escape_string($conn, $_POST['meta_title']);
    $meta_description = mysqli_real_escape_string($conn, $_POST['meta_description']);
    $meta_keyword = mysqli_real_escape_string($conn, $_POST['meta_keyword']);
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';
    $old_image = mysqli_real_escape_string($conn,$_POST['old_image']);
    $new_image = $_FILES['image']['name'];

    if($new_image != ""){
        $file_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_file = time() . '.' . $file_ext;
    }else{
        $update_file = $old_image;
    }
    $path = "../uploads";

    $update_query = "UPDATE categories SET 
    id = '$id',
    name='$name', 
    slug='$slug',
    description='$description',
    status='$status',
    popular='$popular',
    image='$update_file',
    meta_title = '$meta_title',
    meta_description = '$meta_description',
    meta_keywords = '$meta_keyword'
    WHERE id = '$id'
    ";
    $update_query_run = mysqli_query($conn,$update_query);
    if($update_query_run){
        if($_FILES['image']['name'] != ""){
            move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$update_file);
            if(file_exists("../uploads/".$old_image)){
                unlink("../uploads/".$old_image);
            }
        }
        reDirect("../Admin/categories.php","Category Updated Successfully.","alert-success");
    }
}
