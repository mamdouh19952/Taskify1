<?php

require_once '../inc/conn.php';
require_once '../inc/functions.php';

if (isset($_POST['submit'])) {
    $email = clear($_POST['email']);
    $password = clear($_POST['password']);
$errors=[];
   
    
    if(empty($email)){
        $errors[] = "Email is required";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = "Invalid email format";
    }
    elseif(strlen($email) < 10){
        $errors[] = "Email must be at least 10 characters";
    }
    if(empty($password)){
        $errors[] = "Password is required";
    }
    elseif(strlen($password) < 6){
        $errors[] = "Password must be at least 6 characters";
    }
    // $password=password_hash($password,PASSWORD_DEFAULT);



   if(empty($errors)){

    $query="select * from users where email='$email'";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1){
$user=mysqli_fetch_assoc($result);
$oldPassword=$user['password'];
$password_verify = password_verify($password,$oldPassword);
if($password_verify){
    $_SESSION['success'] = 'welcome ' . $user['name'] . 'you are logged in successfully';
    $_SESSION['user_name']=$user['name'];
    $_SESSION['user_id']=$user['id'];
    redirect("../tasks/index.php");
}else{
    $_SESSION['errors']=['invalid email or password 2'];
    redirect("login.php");
}

    }
    else{
        $_SESSION['errors']=['invalid email or password 1'];
        redirect("login.php");
    }

      
       
   }else{
    $_SESSION['errors']=$errors;
    $_SESSION['email']=$email;

    redirect("login.php");

   }
   
    
}else{
    redirect("../inc/404.php")    ;
}
?>