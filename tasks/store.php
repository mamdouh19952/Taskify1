<?php

require_once '../inc/conn.php';
require_once '../inc/functions.php';

if (isset($_POST['submit'])) {
    $title = clear($_POST['title']);
    $description = clear($_POST['description']);
$errors=[];
   
    
    if(empty($title)){
        $errors[] = "title is required";
    }
    elseif(strlen($title) < 3){
        $errors[] = "title must be at least 3 characters";
    }
    if(empty($description)){
        $errors[] = "description is required";
    }
    elseif(strlen($description) < 6){
        $errors[] = "description must be at least 6 characters";
    }

    // $password=password_hash($password,PASSWORD_DEFAULT);



   if(empty($errors)){



$user_id = $_SESSION['user_id'];
$query = "insert into  tasks  (`title`,`description`,`user_id`) values ('$title','$description','$user_id') ";
$result = mysqli_query($conn, $query);

    if($result){

        $_SESSION['success']="task added successfully";
        redirect("index.php");
    }
    else{
        $_SESSION['errors']=['issue while adding task'];
        redirect("index.php");
    }

}
  
    
      
       
   else{
    $_SESSION['errors']=$errors;
    $_SESSION['title']=$title;
    $_SESSION['description']=$description;

    redirect("index.php");

   }
   
    
}else{
    redirect("../inc/404.php")    ;
}
?>