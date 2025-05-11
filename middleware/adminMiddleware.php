<?php 
    if($_SESSION['auth']){
        if($_SESSION['role_as']!= 1){
            $_SESSION['msg']="You're not athorized to able accessing the admin panel.";
            header('location: ../index.php');
        }
        $_SESSION['msg']="Welcome Back To The Admin Dashboard.";
    }else{
        $_SESSION['msg']="Please Log In First.";
        header('location: ../login.php');
    }
?>