<?php include('./components/header.php'); 
?>
<?php 
        if(isset($_SESSION['msg'])){
    ?>
        <div class="alert <?= $_SESSION['msgType'] ?> alert-dismissible fade show" role="alert">
            <strong>Dear <?= $_SESSION['auth-user']['name'] ?>!</strong> <?= $_SESSION['msg']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } 
        unset($_SESSION['msg']);
        unset($_SESSION['msgType']);
    ?>
<?php include('./components/footer.php') ?>