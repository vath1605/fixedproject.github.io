<?php 
session_start();
include("./components/header.php") ?>
<main class="container col-5 py-5 mt-5">
    <?php 
        if(isset($_SESSION['msg'])){
    ?>
        <div class="alert <?= $_SESSION['msgType']; ?> alert-dismissible fade show" role="alert">
            <strong>Dear User!</strong> <?= $_SESSION['msg']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } 
        unset($_SESSION['msg']);
    ?>
    <div class="card shadow-blur shadow mt-5">
        <div class="card-header text-center py-3">
            <h4>Log In Form</h4>
        </div>
        <div class="card-body py-5">
        <form method="post" action="./controller/authController.php" class="px-5">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <div class="container px-4"><input type="email" name="email" placeholder="Email Address" class="form-control shadow-none border-dark border-0 border-bottom rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <div class="container px-4">
                <input placeholder="Password" type="password" name="password" class="form-control shadow-none border-dark border-0 border-bottom rounded-0" id="exampleInputPassword1">
                </div>
            </div>
            <button type="submit" name="logBtn" class="btn float-end btn-outline-dark ">Sign In</button>
        </form>
        </div>
    </div>
</main>
<?php include("./components/footer.php") ?>