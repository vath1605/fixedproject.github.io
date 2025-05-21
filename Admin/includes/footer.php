<?php session_start(); ?>
<footer class="footer pt-5">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-md-6 mb-lg-0 mb-4">
            </div>
            <div class="col-md-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">About</a>
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
    alertify.set('notifier', 'position', 'bottom-right');
    alertify.success('<?= $_SESSION['msg']; ?>');
<?php }
    unset($_SESSION['msg']);
?>
</script>
</body>

</html>