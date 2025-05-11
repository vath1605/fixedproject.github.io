<?php
include("../model/db.php");
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_GET['subBtn'])) {
    $name = mysqli_real_escape_string($conn, $_GET['userName']);
    $email = mysqli_real_escape_string($conn, $_GET['email']);
    $phone = mysqli_real_escape_string($conn, $_GET['phoneNumber']);
    $password = mysqli_real_escape_string($conn, $_GET['password']);
    $cpassword = mysqli_real_escape_string($conn, $_GET['conpassword']);

    $email_validate_query = "SELECT uEmail FROM users WHERE uEmail = '$email' ";
    $email_validate_run = mysqli_query($conn, $email_validate_query);
    if (mysqli_num_rows($email_validate_run) > 0) {
        $_SESSION['msg'] = "The email is already exist.";
        header('location: ../register.php');
    } 
    $phone_validate_query = "SELECT uPhone FROM users WHERE uPhone = '$phone' ";
    $phone_validate_run = mysqli_query($conn, $phone_validate_query);
    if (mysqli_num_rows($phone_validate_run) > 0) {
        $_SESSION['msg'] = "The phone number is already exist.";
        header('location: ../register.php');
    }
    if ($password == $cpassword) {
        $query = "INSERT INTO users (uName, uEmail, uPhone, uPass) 
        VALUES ('$name', '$email', '$phone', '$password')";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            $_SESSION['msg'] = "User Registered Successfully";
            header('location: ../login.php');
        } else {
            $_SESSION['msg'] = "User Registration Failed";
            header('location: ../register.php');
        }
    } else {
        $_SESSION['msg'] = "Password Not Matched";
        header('location: ../register.php');
    }
}else if(isset($_POST['logBtn'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $query_select = "SELECT  * FROM users WHERE uEmail = '$email' AND uPass = '$password' ";
    $query_select_run = mysqli_query($conn,$query_select);
    if(mysqli_num_rows($query_select_run)>0){
        $_SESSION['auth'] = true;
        $userdata = mysqli_fetch_array($query_select_run);
        $username = $userdata['uName'];
        $useremail = $userdata['uEmail'];
        $_SESSION['auth-user']=[
            'name' => $username,
            'email' => $useremail
        ];
        $_SESSION['msg']="Logged in successfully.";
        header('location: ../index.php');
    }else{
        $_SESSION['msg']="Invalid Credential";
        header('location: ../login.php');
    }
}