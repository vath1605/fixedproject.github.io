<?php 
    session_start();
    include('../model/db.php');
    if(isset($_POST['btn']) && $_POST['btn'] == "cancelBtn"){
        $user_id = $_SESSION['auth-user']['user-id'];
        $pro_id = $_POST['pro_id'];
        $query_cancel = "DELETE FROM carts WHERE pro_id = '$pro_id' AND user_id = '$user_id'";
        $query_cancel_run = mysqli_query($conn,$query_cancel);
        if($query_cancel_run){
            echo 123;
        }
    }elseif(isset($_POST['btn']) && $_POST['btn'] == "saveBtn"){
        $newOrder = $_POST['newOrder'];
        $pro_id = $_POST['pro_id'];
        $query_update = "UPDATE carts SET pro_qty = '$newOrder' WHERE pro_id = '$pro_id'";
        $query_update_run = mysqli_query($conn,$query_update);
        if($query_update_run){
            echo 168;
        }
    }   
?>