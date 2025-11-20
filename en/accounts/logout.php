<?php

    session_start();
    require_once '../../config.php';
    
    $id = $_SESSION['id'];        
    $conn = connect();

    mysqli_query($conn, "UPDATE _users SET _logged = 0 WHERE _id = $id");

    session_unset();
    session_destroy();
    header("Location: ../login/login.php");