<?php
    session_start();

    session_unset();
    
    session_destroy();

    header("Location: index.php?status=".$_GET['user']." logged out");

?>