<?php
    include_once "connection.php";

        $query = "INSERT INTO registered(id,fullname,email,contacts,paid,passkey) VALUES (?,?,?,?,?,?);";
        $stmt = mysqli_prepare($connection,$query);
        $stmt->bind_param("ssssss",$_GET['id'],$_GET['fullname'],$_GET['email'],$_GET['contacts'],$_GET['paid'],$_GET['passkey']);
        $stmt->execute();

        $id = $_GET["id"];
        $query2 = "DELETE FROM requests WHERE id = '$id';";
        $result2 = mysqli_query($connection,$query2);

        if($result2){
            header('Location:adregistered.php?status='.$_GET["fullname"].' has been registered &user='.$_GET["user"]);
        } else {
            header('Location:adregistered.php?status= An error occured &user='.$_GET["user"]);
        }

?>