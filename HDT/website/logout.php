<?php
    session_start();

    session_unset();
    
    session_destroy();

    header("Location: admin.php?status=Goodbye 👋 ".$_GET['user']."! Feel free to login another time.");

?>