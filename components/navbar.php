<?php
session_start();
$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], '/') + 1);
include('./model/db.php');
$id = $_SESSION['auth-user']['user-id'];
$query_cart = "SELECT * FROM carts WHERE user_id = '$id' ";
$query_cart_run = mysqli_query($conn, $query_cart);
$count = mysqli_num_rows($query_cart_run);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">V-Commerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav gap-1 ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?= $page == 'index.php' ? "active border-2 border-bottom text-light fw-bold" : "" ?>" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page == 'category.php' ? "active border-2 border-bottom text-light fw-bold" : "" ?>" href="category.php">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link position-relative <?= $page == 'cart.php' ? "active border-2 border-bottom text-light fw-bold" : "" ?>" href="cart.php">
                        <?php if ($count > 0) { ?>
                            <span class="position-absolute top-0 end-0 bg-danger d-flex justify-content-center align-items-center rounded-circle mt-1" style="width: 15px; height: 15px;font-size: 12px;">
                                <?= $count ?>
                            </span>
                        <?php } ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                        </svg>
                    </a>
                </li>
                <?php if ($_SESSION['auth']) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'myorder.php' ? "active border-2 border-bottom text-light fw-bold" : "" ?>" href="myorder.php">Order</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['auth-user']['name'] ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="login.php">Sign In</a></li>
                            <li><a class="dropdown-item" href="signout.php">Sign Out</a></li>
                            <li><a class="dropdown-item" href="#">Other</a></li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Sign In</a>
                    </li>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>