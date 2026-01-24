<?php

require_once '../inc/conn.php';
require_once '../inc/functions.php';

if (isset($_POST['submit'])) {
    $name = clear($_POST['name']);
    $email = clear($_POST['email']);
    $password = clear($_POST['password']);
$errors=[];
    if(empty($name)){
        $errors[] = "Name is required";
    }
    elseif(!preg_match("/^[a-zA-Z ]*$/", $name)){
        $errors[] = "Only letters and white space allowed";
    }elseif(strlen($name) < 3){
        $errors[] = "Name must be at least 3 characters";
    }
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
    $password=password_hash($password,PASSWORD_DEFAULT);


    $query="select * from users where email='$email'";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        $errors[]="Email already exists";
    }

   if(empty($errors)){
       $query="INSERT INTO users(`name`,`email`,`password`) VALUES('$name','$email','$password')";
       $result=mysqli_query($conn,$query);
       if($result){
           $_SESSION['success']="User registered successfully";

           redirect("login.php");
       }else{
           $errors[]="Failed to register user";
           redirect("register.php");

       }
       
   }else{
    $_SESSION['errors']=$errors;
    $_SESSION['name']=$name;
    $_SESSION['email']=$name;

    redirect("register.php");

   }
   
    
}else{
    redirect("../inc/404.php")    ;
}
?>