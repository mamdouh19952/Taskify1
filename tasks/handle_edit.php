<?php

require_once '../inc/conn.php';
require_once '../inc/functions.php';

if (isset($_POST['submit'])&& isset($_GET['id'])) {
    $title = clear($_POST['title']);
    $description = clear($_POST['description']);

$user_id = $_SESSION['user_id'];
$task_id = $_GET['id'];

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




   if(empty($errors)){




$query = "update tasks set title = '$title', description = '$description' , updated_at = now() where id = $task_id and user_id = $user_id  ";
$result = mysqli_query($conn, $query);

    if($result){

        $_SESSION['success']="task updated successfully";
        redirect("index.php");
    }
    else{
        $_SESSION['errors']=['issue while updating task'];
        redirect("index.php");
    }

}
  
    
      
       
   else{
    $_SESSION['errors']=$errors;
    $_SESSION['title']=$title;
    $_SESSION['description']=$description;

    redirect("edit.php?id=$task_id");

   }
   
    
}else{
    redirect("../inc/404.php")    ;
}
?>