<?php include('./components/header.php'); 
session_start();
?>
<?php 
        if(isset($_SESSION['msg'])){
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Dear User!</strong> <?= $_SESSION['msg']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } 
        unset($_SESSION['msg']);
    ?>
<?php include('./components/footer.php') ?>