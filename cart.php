<?php 
include('./components/header.php');
include('./model/db.php');
include('./func/getProduct.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<div class="container py-5">
    <div class="row">
        <?php $cartItem = getCartItem();
            foreach($cartItem as $item){
                ?> 
                    <h1><?= $item['pro_qty'] ?></h1>
                <?php
            }
        ?>

    </div>
</div>
<?php include('./components/footer.php'); ?>