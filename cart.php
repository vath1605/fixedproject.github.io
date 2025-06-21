<?php
include('./components/header.php');
include('./model/db.php');
include('./func/getProduct.php');
include('./func/authenticate.php');
?>
<div class="container py-5">
    <div class="row">
        <div class="col-12 text-secondary d-flex justify-content-start">
            <a class="text-decoration-none text-secondary" href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi text-secondary mb-1 bi-house" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                </svg> &gt </a>
            <a class="text-decoration-none text-secondary mx-1" href="cart.php">Cart</a>
        </div>
        <div class="col-md-12 mb-3">
            <h1>Cart Items</h1>
            <hr>
        </div>
        <?php
        $cartItem = getCartItem();
        $p = mysqli_fetch_array($cartItem);
        if ($p) {
            $pro_id = $p['pid'];
        } else {
            $pro_id = null;
        }
        $query_stock = "SELECT qty FROM products WHERE id='$pro_id'";
        $query_stock_run = mysqli_query($conn, $query_stock);
        $qty = mysqli_fetch_assoc($query_stock_run);
        if (mysqli_num_rows($cartItem) > 0) {
        ?>
            <div class="row py-1 shadow shadow-sm rounded-3 mb-1 pt-2 ">
                <div class="col-md-2 d-flex align-items-center justify-content-center">
                    <h5>Image</h5>
                </div>
                <div class="col-md-3 d-flex align-items-center justify-content-center">
                    <h5>Info</h5>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <h5>QTY</h5>
                </div>
                <div class="col-md-3 d-flex align-items-center justify-content-center">
                    <h5>Action</h5>
                </div>
            </div>
            <?php
            foreach ($cartItem as $item) {
            ?>
                <div class="row mb-3 shadow py-3 rounded-3">
                    <div class="col-md-2">
                        <img style="height: 11vh; object-fit: cover;" src="./uploads/<?= $item['image'] ?>" class="w-100 rounded-3" alt="">
                    </div>
                    <div class="col-md-3 d-flex align-items-center flex-column justify-content-center">
                        <h5><?= $item['name'] ?></h5>
                        <h5 class="text-danger"><?= $item['selling_price'] ?> <sup>$</sup></h5>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        <select class="form-select shadow-none order_qty" data-id="<?= $item['pid'] ?>">
                            <?php for ($i = 1; $i <= $qty['qty']; $i++) { ?>
                                <option value="<?= $i ?>" <?= ($i == $item['pro_qty']) ? 'selected' : '' ?>><?= $i ?> pcs</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center align-items-center">
                        <form class="d-flex gap-3">
                            <button value="<?= $item['pid'] ?>" class="cancel_order btn d-flex px-3 justify-content-center align-items-center gap-1 btn-danger fw-bold" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-x" viewBox="0 0 16 16">
                                    <path d="M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793z" />
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                                </svg>Remove</button>
                            <button id="update_order" value="<?= $item['pid'] ?>" class="btn btn-success fw-bold px-3 justify-content-center align-items-center gap-1 d-none save-btn" data-id="<?= $item['pid'] ?>" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-upload" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383" />
                                    <path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708z" />
                                </svg>
                                Save</button>
                        </form>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="row p-0">
                <div class="p-0 col-12">
                    <a class="btn btn-primary p-2 px-3 d-flex justify-content-center align-items-center gap-1 fw-bold float-end" href="checkout.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                            <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z" />
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                            <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12" />
                        </svg>Check Out</a>
                </div>
            </div>
        <?php
        } else { ?>
            <div class="container text-center text-secondary">
                <p>No Product Add Yet.</p>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<script src="./assets/js/jquery-3.7.1.min.js"></script>
<script>
    $(function() {
        let cancel = $('.cancel_order');
        cancel.click(function() {
            pro_id = $(this).val();
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: "POST",
                        url: "controller/cartController.php",
                        data: {
                            'btn': 'cancelBtn',
                            'pro_id': pro_id
                        },
                        success: function(response) {
                            if (response === "123") {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your order has been deleted.",
                                    icon: "success"
                                }).then(() => {
                                    location.reload();
                                });
                            }
                        }
                    });
                }
            });
        })
        $('.order_qty').each(function() {
            const originalQty = $(this).val();
            $(this).on('change', function() {
                const productId = $(this).data('id');
                const saveBtn = $(`.save-btn[data-id='${productId}']`);
                if ($(this).val() !== originalQty) {
                    saveBtn.removeClass('d-none').addClass('d-flex');
                    let newOrder = $(this).val();
                    saveBtn.click(function() {
                        let proId = $(this).val();
                        console.log(proId);
                        $.ajax({
                            method: "POST",
                            url: "controller/cartController.php",
                            data: {
                                'pro_id': proId,
                                'newOrder': newOrder,
                                'btn': 'saveBtn'
                            },
                            success: function(response) {
                                if (response === "168") {
                                    Swal.fire({
                                        title: "Updated",
                                        text: "Your product order updated.",
                                        icon: "success"
                                    }).then(() => {
                                        location.reload();
                                    });
                                }
                            }
                        });
                    })
                } else {
                    saveBtn.addClass('d-none').removeClass('d-flex');
                }
            });
        });
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php include('./components/footer.php'); ?>