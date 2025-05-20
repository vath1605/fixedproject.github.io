<?php
    function reDirect($url,$msg,$msgType){
        $_SESSION['msg'] = $msg;
        header('location:'.$url);
        $_SESSION['msgType']=$msgType;
    }
?>