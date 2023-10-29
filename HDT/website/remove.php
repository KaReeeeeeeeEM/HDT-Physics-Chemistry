<?php
    include_once "connection.php";
        $id = $_GET["id"];
        $query = "DELETE FROM registered WHERE id = '$id';";
        $result = mysqli_query($connection,$query);

    if($result){
        header('Location:adregistered.php?user='.$_GET['user'].'&status='.$_GET["name"].' has been removed');
    } else {
        header('Location:adregistered.php?user='.$_GET["user"].'&status=An error occured');
    }


?>