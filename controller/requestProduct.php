<?php
session_start();
include('../model/db.php');
if (!isset($_SESSION['auth'])) {
    echo 101;
    exit();
}
if (!isset($_POST['scope']) || $_POST['scope'] !== "add") {
    echo 101;
    exit();
}
$pro_id = $_POST['pro_id'];
$pro_qty = $_POST['pro_qty'];
$user_id = $_SESSION['auth-user']['user-id'];
$validate_order = "SELECT * FROM carts WHERE user_id = '$user_id' AND pro_id = '$pro_id'";
$validate_order_run = mysqli_query($conn, $validate_order);
if (mysqli_num_rows($validate_order_run) > 0) {
    echo 102;
    exit();
}
$query_stock = "SELECT qty FROM products WHERE id='$pro_id' AND status='1'";
$query_stock_run = mysqli_query($conn, $query_stock);
$product = mysqli_fetch_assoc($query_stock_run);
$query_insert = "INSERT INTO carts (user_id, pro_id, pro_qty) VALUES ('$user_id', '$pro_id', '$pro_qty')";
$query_insert_run = mysqli_query($conn, $query_insert);
if ($query_insert_run) {
        echo 168;
} else {
    echo 101;
}
?>
