<?php

require_once '../inc/conn.php';
require_once '../inc/functions.php';

if (isset($_POST['submit']) && isset($_GET['id'])) {


    $user_id = $_SESSION['user_id'];
    echo $user_id;
    echo $_GET['id'];
    $task_id = $_GET['id'];

    $query = "delete  from tasks  where id = '$task_id' and user_id = '$user_id' ";
    $result = mysqli_query($conn, $query);
print_r($result);
    if ($result) {

        $_SESSION['success'] = "task delted successfully";
        redirect("index.php");
    } else {
        $_SESSION['errors'] = ['issue while deleting task'];
        redirect("index.php");
    }
} else {
    redirect("../inc/404.php");
}
