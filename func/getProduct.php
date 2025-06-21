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
    function getCartItem(){
        global $conn;
        $userId = $_SESSION['auth-user']['user-id'];
        $query = "SELECT c.id as cid, c.pro_qty, p.id as pid, p.name, p.image, p.selling_price
            FROM carts c, products p WHERE c.pro_id = p.id AND c.user_id = '$userId' ORDER BY c.id DESC ";
            $query_run =  mysqli_query($conn,$query);
        return $query_run;
    }
    function getOrder(){
        global $conn;
        $userId = $_SESSION['auth-user']['user-id'];
        $query = "SELECT * FROM orders WHERE user_id = '$userId'";
        return mysqli_query($conn,$query);
    }
?>