<footer class="footer pt-5">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-md-6 mb-lg-0 mb-4">
            </div>
            <div class="col-md-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-muted">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-muted">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-muted">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link pe-0 text-muted">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</main>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
<script>
        <?php if(isset($_SESSION['msg'])){?>
    alertify.set('notifier', 'position', 'top-right');
    alertify.success('<?= $_SESSION['msg']; ?>');
<?php }
    unset($_SESSION['msg']);
?>
</script>
</body>

</html>