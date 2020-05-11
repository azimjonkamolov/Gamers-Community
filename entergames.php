<?php

    include "config.php";
    include "header.php";

    $_SESSION['url'] = $_SERVER['REQUEST_URI'];

    if(empty($_SESSION['user_id']))
    {
        header("Location: signin.php");
        exit();
    }
    
?>
