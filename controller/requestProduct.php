<?php
session_start();
include('../model/db.php');
if (!isset($_SESSION['auth'])) {
    echo 101; // Not authenticated
    exit();
}
if (!isset($_POST['scope']) || $_POST['scope'] !== "add") {
    echo 101; // Invalid request
    exit();
}
$pro_id = $_POST['pro_id'];
$pro_qty = $_POST['pro_qty'];
$user_id = $_SESSION['auth-user']['user-id'];
// Check if the item already exists in cart (same user, same product)
$validate_order = "SELECT * FROM carts WHERE user_id = '$user_id' AND pro_id = '$pro_id'";
$validate_order_run = mysqli_query($conn, $validate_order);
if (mysqli_num_rows($validate_order_run) > 0) {
    echo 102; // Already in cart
    exit();
}
// Get current stock of product
$query_stock = "SELECT qty FROM products WHERE id='$pro_id' AND status='1'";
$query_stock_run = mysqli_query($conn, $query_stock);
$product = mysqli_fetch_assoc($query_stock_run);
$available_stock = $product['qty'] ?? 0;
// Check if enough stock is available for the requested quantity
if ($pro_qty > $available_stock) {
    echo 103; // Not enough stock
    exit();
}
// Insert into cart
$query_insert = "INSERT INTO carts (user_id, pro_id, pro_qty) VALUES ('$user_id', '$pro_id', '$pro_qty')";
$query_insert_run = mysqli_query($conn, $query_insert);
if ($query_insert_run) {
    // Update stock only after successful insert
    $new_stock = $available_stock - $pro_qty;
    $query_update_qty = "UPDATE products SET qty='$new_stock' WHERE id='$pro_id'";
    $query_update_qty_run = mysqli_query($conn, $query_update_qty);

    if ($query_update_qty_run) {
        echo 168; // Success
    } else {
        echo 104; // Failed to update stock
    }
} else {
    echo 101; // Insert failed
}
?>
