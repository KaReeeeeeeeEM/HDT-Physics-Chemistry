<?php
    include_once "connection.php";

    $id = $_GET['id'];
    $query = 'UPDATE meetings SET attended = "attended" WHERE id = '.$id.';';
    $result = mysqli_query($connection,$query);

    if($result){
        echo "<script type='text/javascript'> 
            window.location.href = 'admeetinghistory.php?user=".$_GET["user"]."'; 
        </script>";
    } else {
        echo "<script type='text/javascript'> 
            window.location.href = 'admeetinghistory.php?error=Error executing command&user=".$_GET["user"]."'; 
        </script>";
    }

?>