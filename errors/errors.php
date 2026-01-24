<?php
if(isset($_SESSION['errors'])){
    foreach($_SESSION['errors'] as $error){
        echo "<div class='alert alert-danger'>$error</div>";
    }
    unset($_SESSION['errors']);
}

?>