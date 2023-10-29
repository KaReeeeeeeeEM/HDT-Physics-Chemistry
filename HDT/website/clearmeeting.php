<?php
    include_once "connection.php";
        $id = $_GET["id"];
        $query = "DELETE FROM meetings WHERE id = '$id';";
        $result = mysqli_query($connection,$query);

    if($result){
        header('Location:admeetinghistory.php?user='.$_GET["user"].'');
    } else {
        header('Location:admeetinghistory.php?user='.$_GET["user"].'&status=An error occured');
    }


?>