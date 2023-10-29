<?php

$connection = mysqli_connect("localhost", "root", "", "files");

if(!$connection){
    echo "Error".mysqli_conn_error();
}

if(isset($_POST['submit'])){
    $target_dir = 'notes/';
    $target_file = $target_dir.basename($_FILES['files']['name']);
    move_uploaded_file($_FILES['files']['tmp_name'], $target_file);
    
    $files = $_POST['files'];
    $result = mysqli_query($connection,"INSERT INTO files(files) VALUE('$files');");
    if($result){
        header("Location:test.php?File Uploaded and moved!");
    } else {
        header("Location:test.php?Failed to upload file");
    }
}

    $result2 = mysqli_query($connection,"SELECT * FROM files");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Requests</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing:border-box;
            scroll-behavior: smooth;
            font-family: poppins, Arial, Helvetica, sans-serif;
            text-align:center;
        }

        a{
            background-color: green;
            padding: 0.5rem 2rem;
            border-radius: 0.3rem;
            text-align:center;
            color:white;
            font-weight:700;
            text-decoration:none;
        }

        form{
            margin:100px auto;
        }
        input{
            margin-bottom:1rem;
        }

    </style>
</head>
<body>
    <!---- Body Section   -->
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="files" id="files"> <br>
            <input type="submit" name="submit" value="UPLOAD">
        </form>
        <?php
            if(mysqli_num_rows($result2) > 0){
                while($row = mysqli_fetch_array($result2)){
                    echo '<a href=notes/"'.$row['files'].'" download>Download</a><br><br>';
            } 
         }
        ?>
        
   
</body>
</html>