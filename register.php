<?php 
session_start();
include("./components/header.php") ?>
<main class="container col-5 py-5 mt-5">
    <div class="card shadow-blur shadow mt-5">
        <div class="card-header text-center py-3">
            <h4>Registration Form</h4>
        </div>
        <div class="card-body py-5">
        <form method="post" action="./controller/authController.php" class="px-5">
        <div class="mb-3">
                <label for="userName" class="form-label">Full Name</label>
                <div class="container px-4">
                <input placeholder="Full Name" type="text" name="userName" class="form-control shadow-none border-dark border-0 border-bottom rounded-0" id="userName">
                </div>
        </div>
        <div class="mb-3">
                <label for="phoneNumber" class="form-label">Phone Number</label>
                <div class="container px-4">
                <input placeholder="Phone Number" type="text" name="phoneNumber" class="form-control shadow-none border-dark border-0 border-bottom rounded-0" id="phoneNumber">
                </div>
        </div>
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
            <div class="mb-3">
                <label for="exampleInputPassword" class="form-label">Confirm-Password</label>
                <div class="container px-4">
                <input placeholder="Confirm Password" type="password" name="conpassword" class="form-control shadow-none border-dark border-0 border-bottom rounded-0" id="exampleInputPassword">
                </div>
            </div>
            <button type="submit" name="subBtn" class="btn float-end btn-outline-dark ">Sign Up</button>
        </form>
        </div>
    </div>
</main>
<?php include("./components/footer.php") ?>