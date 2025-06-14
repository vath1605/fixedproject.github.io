<?php include('./components/header.php');
include('./model/db.php');
include('./func/getProduct.php');
$pro_slug = $_GET['pro-slug'];
$cate_slug = $_GET['cate-slug'];
$cate_data = getBySlugActive('categories', $cate_slug);
$cate = mysqli_fetch_array($cate_data);
$pro_data = getBySlugActive('products', $pro_slug);
$pro = mysqli_fetch_array($pro_data);
?>
<div class="container py-5">
    <div class="row">
        <div class="col-12 text-secondary d-flex justify-content-start">
            <a class="text-decoration-none text-secondary" href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi text-secondary mb-1 bi-house" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                </svg> &gt </a>
            <a class="text-decoration-none text-secondary mx-1" href="category.php">Categories &gt</a>
            <a class="text-decoration-none text-secondary mx-1" href="product.php?category=<?= $cate['slug'] ?>"><?= $cate['name'] ?> &gt</a>
            <a class="text-decoration-none text-secondary mx-1" href="product-view.php?cate-slug=<?= $cate['slug'] ?>&&pro-slug=<?= $pro['slug'] ?>"><?= $pro['name'] ?></a>
        </div>
        <div class="col-12 mt-3 d-flex align-items-center justify-content-between">
            <h1><?= $pro['name']; ?></h1>
            <?php if ($pro['trending'] == '1') { ?>
                <span style="clip-path: polygon(13% 0, 100% 0%, 87% 100%, 0% 100%);" class="text-end py-2 px-4 bg-danger text-white fw-bold ">Trending</span>
            <?php } ?>
        </div>
        <div class="col-12">
            <hr>
        </div>
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <img class="w-100" style="height: 70vh; object-fit: cover;" src="./uploads/<?= $pro['image'] ?>" alt="">
                </div>
            </div>
        </div>
        <div class="col-7">
            <div class="row">
                <div class="col-12">
                    <h3 class="card-card-title">
                        <?= $pro['meta_title'] ?>
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="card-card-title">
                        <?= $pro['description'] ?>
                    </p>
                    <hr class="my-4">
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <span class="fw-bold border-dark border px-3 py-1">Instock: <?= $pro['qty'] ?></span>
                </div>
                <div class="col-9">
                    <?php
                    if ($pro['original_price'] > $pro['selling_price']) {
                        $dis = 100 - ($pro['selling_price'] * 100) / $pro['original_price'];
                    ?>
                        <span class="fw-bold border-danger text-danger border px-3 py-1">Discount: <?= round($dis, 2) ?>%</span>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <?php if ($pro['original_price'] > $pro['selling_price']) { ?>
                <div class="row">
                    <div class="col-3 mt-3">
                        <span class="text-secondary">
                            Original Price
                        </span>
                        <h1>
                            <del class="text-danger">
                                <?= $pro['original_price'] ?>
                                $
                            </del>
                        </h1>
                    </div>
                    <div class="col-3 mt-3">
                        <span class="text-secondary">
                            Selling Price
                        </span>
                        <h1>
                            <?= $pro['selling_price'] ?>$
                        </h1>
                    </div>
                    <div class="col-6">
                        <span class="text-secondary">
                            Order Product Quantity
                        </span>
                        <select class="form-select shadow-none" id="order_qty">
                            <?php for ($i = 1; $i <= $pro['qty']; $i++) { ?>
                                <option value="<?= $i ?>"><?= $i ?> pcs</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row">
                    <div class="col-6 mt-3">
                        <span class="text-secondary">
                            Selling Price
                        </span>
                        <h1>
                            <?= $pro['selling_price'] ?>$
                        </h1>
                    </div>
                    <div class="col-6">
                        <span class="text-secondary">
                            Order Product Quantity
                        </span>
                        <select class="form-select shadow-none" id="order_qty">
                            <?php for ($i = 1; $i <= $pro['qty']; $i++) { ?>
                                <option value="<?= $i ?>"><?= $i ?> pcs</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            <?php } ?>

            <div class="row">
                <hr class="my-4">
                <div class="col-12">
                    <h4><?= $pro['meta_description'] ?></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-6 my-4">
                    <button value="<?= $pro['id'] ?>" type="button" class="btn btn-outline-dark w-100 py-2 fw-bold d-flex justify-content-center align-items-center add-to">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi fw-bold bi-cart-plus me-1" viewBox="0 0 16 16">
                            <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z" />
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                        </svg>
                        Add Cart</button>
                </div>
                <div class="col-6 my-4">
                    <button name="" value="<?= $pro['id'] ?>" type="button" class="btn btn-outline-danger w-100 py-2 fw-bold d-flex justify-content-center align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi fw-bold me-1 bi-heart" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                        </svg>
                        Favorite</button>
                </div>
            </div>
        </div>
    </div>
    <script src="./assets//js//jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            $('.add-to').click(function() {
                let qty = $('#order_qty').val();
                let pro_id = $(this).val();
                $.ajax({
                    method: "POST",
                    url: "controller/requestProduct.php",
                    data: {
                        'pro_id': pro_id,
                        'pro_qty': qty,
                        'scope': 'add',
                    },
                    success: function(response) {
                        if (response == 101) {
                            Swal.fire({
                                icon: "error",
                                title: "Log In To Continue",
                                footer: '<a class="nav-link" href="./login.php">Log In</a>'
                            });
                        } else if (response == 168) {
                            window.location.reload();
                        } else if (response == 102) {
                            Swal.fire({
                                title: "Product Already Added To Cart",
                                icon: "warning",
                                draggable: true
                            });
                        }
                    }
                })
            });
        });
    </script>
    <?php include('./components/footer.php'); ?>