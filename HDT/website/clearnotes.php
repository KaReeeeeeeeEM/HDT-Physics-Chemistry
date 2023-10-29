<?php
    include_once "connection.php";
        $id = $_GET["id"];
        $query = "DELETE FROM notes WHERE id = '$id';";
        $result = mysqli_query($connection,$query);

    if($result){
        header('Location:adnoteshistory.php?user='.$_GET["user"].'');
    } else {
        header('Location:adnoteshistory.php?user='.$_GET["user"].'&status=An error occured');
    }


?>