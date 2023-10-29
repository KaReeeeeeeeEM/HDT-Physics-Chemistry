<?php

if(isset($_GET['status'])){
    echo '
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome User</title>
        <style>
            *{
                margin: 0;
                padding: 0;
                font-family: poppins,Arial, Helvetica, sans-serif;
            }
    
            body{
                background-color: rgba(0,0,0,0.5);
            }
    
            .pop-up{
                width: 30%;
                position: fixed;
                background-color: white;
                display: flex;
                border-radius: 0.5rem;
                padding: 1rem 2rem;
                flex-direction: column;
                align-items: center;
                justify-content: space-around;
                margin: 0 35%;
                z-index:100000000000;
            }
    
            .pop-up .head h3{
                color: green;
            }
    
            .pop-up .message{
                width:80%;
                margin-bottom: 1rem;
            }
    
            .pop-up .button button{
                color: green;
                background-color: #eee;
                border: none;
                cursor: pointer;
                font-weight: 700;
                padding: 0.5rem 1rem;
                border-radius: 0.3rem;
            }
    
            .pop-up .button button:hover{
                box-shadow: 0 0 3px 2px rgb(97, 207, 97);
            }
    
            
        </style>
    </head>
    <body>
        <div class="pop-up" id="pop-up">
            <div class="head">
                <h3>Welcome</h3>
            </div>
            <div class="message">
                <p style="text-align:center;">'.$_GET["status"].'</p>
            </div>
            <div class="button">
                <button onclick="disappear()">Close</button>
            </div>
        </div>
        <script>
            const pop = document.getElementById("pop-up");
    
            let disappear = () =>{
                pop.style.display = "none";
                window.location.href = "dashboard.php?id='.$_GET['id'].'&paid='.$_GET['paid'].'&user='.$_GET['user'].'";
            }
        </script>
        
    </body>
    </html>
    
    ';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HDT - Student Dashboard</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            scroll-behavior: smooth;
            font-family: poppins, Arial, Helvetica, sans-serif;
        }

        body{
            background-color: #eee;
            display: flex;
        }

        @keyframes grow {
            0% {
                transform:scale(.5);
            }
            100% {
                transform:scale(1);
            }
        }

        .left{
            width:30%;
            height: 790px;
            padding-top: 2rem;
            border-right: 5px dashed green;
            background-color: rgb(174, 226, 174);
        }

        .right{
            width:70%;
            display: flex;
            align-items: center;
            flex-wrap:wrap;
            justify-content: space-around;
            background-color: #ddd;
            height: auto;
        }

        .left .details{
            margin:3rem;
            padding-bottom: 2rem;
            border-bottom: 4px dashed green;
            animation: grow 0.8s;
            transition:.2s ease-in-out;
        }

        .details h2{
            color: rgb(10, 71, 10);
            margin-bottom: 1rem;
        }

        .links{
            margin-left: 3rem;
        }

        .links h3{
            margin-bottom: 1rem;
            animation: grow 1s;
            transition:.2s ease-in-out;
        }

        .links a{
            text-decoration: none;
            color: green;
        }

        .active {
            border-left: 6px solid green;
            padding-left: 1rem;
        }

        .body-section .dashboard-content .right{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .right .row{
            height: 350px;
            width: 460px;
            margin: 2rem 0.25%;
            outline: 5px dashed #fff;
            background-color: rgb(87, 155, 87);
            display: flex;
            border-radius: 0.8rem;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
        }

        .row-content{
            width: 80%;
        }

        .row-content p {
            text-align: center;
            animation: grow 1.4s;
            transition:.2s ease-in-out;
        }

        .row-head h2{
            color: #eee;
            animation: grow 0.7s;
            transition:.2s ease-in-out;
        }

        .button{
            animation: grow 2.1s;
            transition:.2s ease-in-out;
        }


        .button a{
            text-decoration:none;
            padding-top:3rem;
            padding: 0.5rem 3rem;
            color: green;
            background-color: #eee;
            font-weight: 700;
            transition: .5s ease-in-out;
        }

        .button a:hover{
            box-shadow: 0 0 1px 2px #eee;
        }

        div .new{
            width:1.8rem;
            height:1.6rem;
            background-color: green;
            position:relative;
            border-radius:50%;
            font-weight:700;
            left:-2rem;
            top:1.5rem;
            color:white;
            text-align:center;
            animation: grow 1.9s;
            transition:.2s ease-in-out;
            
        }


        
    </style>
</head>
<body>
    <div class="left">
        <div class="details">
            <a href="dashboard.php?id=<?php echo $_GET['id'] ?>&paid=<?php 
                include_once "connection.php";
                $id = $_GET['id'];
                $result = mysqli_query($connection,"SELECT * FROM registered WHERE id = '$id'");
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        echo $row['paid'];
            ?>&user=<?php echo $_GET['user']; 
            ?>" style="text-decoration:none;"><h2>Welcome Student <span style="color:green;">#00<?php echo $row['id']; ?></span></h2></a>
            <h4>Paid: <span style="color:green;border-right: 5px solid green;padding-right:1rem;margin-right:1rem;"><?php echo $row['paid']; ?></span> Unpaid: <span style="color:green;"><?php echo (40000 - $row['paid']); ?></span></h4>
            <h4>Status: <?php if($row['paid'] == 40000) echo '<span style="color:green;">Fully Paid'; else echo '<span style="color:maroon;">Partially Paid'; ?></span></h4>
        </div>
       <div class="links">
            <h3><a href="notes.php?id=<?php echo $_GET['id'] ?>&paid=<?php echo$row['paid'] ?>&user=<?php echo $_GET['user'] ?>"><span><img src="icons/file-small.png" style="height: 23px;padding-right: 1rem;"></span>View Notes</a></h3>
            <h3><a href="conceptuals.php?id=<?php echo $_GET['id'] ?>&paid=<?php echo$row['paid'] ?>&user=<?php echo $_GET['user'] ?>"><span><img src="icons/about.png" style="height: 23px;padding-right: 1rem;"></span>Conceptuals</a></h3>
            <h3><a href="lectures.php?id=<?php echo $_GET['id'] ?>&paid=<?php echo$row['paid'] ?>&user=<?php echo $_GET['user'] ?>"><span><img src="icons/youtube.png" style="height: 23px;padding-right: 1rem;"></span>HTD YouTube Lectures</a></h3>
            <h3><a href="payments.php?id=<?php echo $_GET['id'] ?>&paid=<?php echo$row['paid'] ?>&user=<?php echo $_GET['user'] ?>"><span><img src="icons/price.png" style="height: 23px;padding-right: 1rem;"></span>Payments</a></h3>
            <h3><a href="meetings.php?id=<?php echo $_GET['id'] ?>&paid=<?php echo$row['paid'] ?>&user=<?php echo $_GET['user'] ?>"><span><img src="icons/reddit.png" style="height: 23px;padding-right: 1rem;"></span>Available Zoom meetings</a></h3>
            <h3><a href="userlogout.php?user=<?php echo $_GET['user']; }
    }?>"><span><img src="icons/logout.png" style="height: 23px;padding-right: 1rem;"></span>Log Out</a></h3>
        </div> 
    </div>
    <div class="right">
                <div class="row">
                    <div class="row-head">
                        <h2><span><img src="icons/file-small.png" style="height: 25px;padding-right:0.5rem;"></span> View Notes</h2>
                    </div>
                    <div class="row-content">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus nisi accusamus architecto beatae delectus doloremque magnam laborum eligendi, nostrum dolorum officiis perferendis facilis nobis totam. Harum voluptatum debitis eius voluptatibus.</p>
                    </div>
                    <div class="button">
                        <a href="notes.php?id=<?php echo $_GET['id'] ?>&paid=<?php echo$_GET['paid'] ?>&user=<?php echo $_GET['user'] ?>">View Notes</a>
                    </div>
                </div>

                <div class="row">
                    <div class="row-head">
                        <h2><span><img src="icons/about.png" style="height: 25px;padding-right:0.5rem;"></span> Conceptuals</h2>
                    </div>
                    <div class="row-content">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus nisi accusamus architecto beatae delectus doloremque magnam laborum eligendi, nostrum dolorum officiis perferendis facilis nobis totam. Harum voluptatum debitis eius voluptatibus.</p>
                    </div>
                    <div class="button">
                        <a href="conceptuals.php?id=<?php echo $_GET['id'] ?>&paid=<?php echo$_GET['paid'] ?>&user=<?php echo $_GET['user'] ?>">View Conceptuals</a>
                    </div>
                </div>

                <div class="row">
                    <div class="row-head">
                        <h2><span><img src="icons/youtube.png" style="height: 25px;padding-right:0.5rem;"></span>HDT YouTube Lectures</h2>
                    </div>
                    <div class="row-content">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus nisi accusamus architecto beatae delectus doloremque magnam laborum eligendi, nostrum dolorum officiis perferendis facilis nobis totam. Harum voluptatum debitis eius voluptatibus.</p>
                    </div>
                    <div class="button">
                        <a href="lectures.php?id=<?php echo $_GET['id'] ?>&paid=<?php echo$_GET['paid'] ?>&user=<?php echo $_GET['user'] ?>">Check HTD YouTube Videos</a>
                    </div>
                </div>

                <div class="row">
                    <div class="row-head">
                    <?php 
                            include_once "connection.php";
                            $query = "SELECT COUNT(id) FROM meetings WHERE attended != 'attended';";
                            $result = mysqli_query($connection, $query);

                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                    if($row["COUNT(id)"] > 0){
                                    echo '<div class="new">+'.$row["COUNT(id)"].' </div>';
                                    } else {
                                        echo ' ';
                                    }
                                }
                            } else {
                            echo ' ';
                        }
                        ?>
                        <h2><span><img src="icons/reddit.png" style="height: 25px;padding-right:0.5rem;"></span> View Zoom Meetings</h2>
                    </div>
                    <div class="row-content">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus nisi accusamus architecto beatae delectus doloremque magnam laborum eligendi, nostrum dolorum officiis perferendis facilis nobis totam. Harum voluptatum debitis eius voluptatibus.</p>
                    </div>
                    <div class="button">
                        <a href="meetings.php?id=<?php echo $_GET['id'] ?>&paid=<?php echo$_GET['paid'] ?>&user=<?php echo $_GET['user'] ?>">View available Meetings</a>
                    </div>
                </div>

                

    </div>
    
</body>
</html>