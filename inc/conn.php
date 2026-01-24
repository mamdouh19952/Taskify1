    <?php
    session_start();
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "taskify";

    $conn =  mysqli_connect($hostname, $username, $password, $database);

    ?>