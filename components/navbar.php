<?php
    session_start();
    $page=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],'/')+1);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">V-Commerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link rounded-3 <?= $page == 'index.php'? "active bg-light text-dark fw-bold":"" ?>" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-3 <?= $page == 'category.php'? "active bg-light text-dark fw-bold":"" ?>" href="category.php">Category</a>
                </li>
                <?php if($_SESSION['auth']){ ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['auth-user']['name']?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="login.php">Sign In</a></li>
                        <li><a class="dropdown-item" href="signout.php">Sign Out</a></li>
                        <li><a class="dropdown-item" href="#">Other</a></li>
                    </ul>
                </li>
                <?php } else{ ?>
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