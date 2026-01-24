<?php
session_start();

require_once '../inc/functions.php';
session_destroy();


    
    session_start();
    $_SESSION['success'] = "You have been logged out";
    redirect("login.php");
    exit();





?>