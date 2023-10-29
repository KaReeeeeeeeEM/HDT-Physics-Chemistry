<?php 
//establish a connection to the database
    $connection = mysqli_connect("localhost", "root", "", "HDT");

//test if the connection is not succesful
if(!$connection){
    echo "Connection not succesful due to the following errors <br>".mysqli_conn_error();
}

?>