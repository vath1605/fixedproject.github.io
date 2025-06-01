<?php 
    session_start();
    include('../model/db.php');
    function getAll($table){
        global $conn;
        $query = "SELECT * FROM $table";
        $query_run = mysqli_query($conn,$query);
        return $query_run;
    }
    function getById($table,$id){
        global $conn;
        $query = "SELECT * FROM $table WHERE id='$id'";
        $query_run = mysqli_query($conn,$query);
        return $query_run;
    }
    function getByIdActive($table,$id){
        global $conn;
        $query = "SELECT * FROM $table WHERE id='$id' AND status='1'";
        $query_run = mysqli_query($conn,$query);
        return $query_run;
    }
    function getBySlugActive($table,$slug){
        global $conn;
        $query = "SELECT * FROM $table WHERE slug='$slug' AND status='1' LIMIT 1";
        $query_run = mysqli_query($conn,$query);
        return $query_run;
    }
    function getProByCID($cate_id){
        global $conn;
        $query = "SELECT * FROM products WHERE category_id='$cate_id' AND status='1'";
        $query_run = mysqli_query($conn,$query);
        return $query_run;
    }
    function getAllActive($table){
        global $conn; 
        $query = "SELECT * FROM $table WHERE status = '1' ";
        return mysqli_query($conn,$query);
    }
?>