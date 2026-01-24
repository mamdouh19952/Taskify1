<?php

require_once '../inc/conn.php';
require_once '../inc/functions.php';

if (isset($_GET['id'])) {


    $user_id = $_SESSION['user_id'];
    $task_id = $_GET['id'];



    $query = "select * from tasks  where id = $task_id and user_id = $user_id  ";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $task = mysqli_fetch_assoc($result);



        $status = ($task['status'] == 'pending') ? 'done' : 'pending';

        $query = "update tasks set status = '$status' where id = $task_id and user_id = $user_id";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $_SESSION['success'] = "task status updated successfully";
            redirect("index.php");
        }
        else {
            $_SESSION['errors'] = ['issue while updating task status'];
            redirect("index.php");
        }
    } else {
        $_SESSION['errors'] = [' invalid task id'];
        redirect("index.php");
    }
} else {
    redirect("../inc/404.php");
}
