<?php
    include_once "connection.php";
        $id = $_GET["id"];
        $query = "DELETE FROM conceptuals WHERE id = '$id';";
        $result = mysqli_query($connection,$query);

    if($result){
        header('Location:adconceptualshistory.php?user='.$_GET["user"].'');
    } else {
        header('Location:adconceptualshistory.php?user='.$_GET["user"].'&status=An error occured');
    }


?>