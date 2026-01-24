<?php


function redirect($url){
    header("Location: $url");
    exit();
}
function clear($value){
    return trim(htmlspecialchars($value));
}

function check_login(){
    if(!isset($_SESSION['user_id'])){
        redirect("../auth/login.php");
        exit();
        
    }  
}





?>

