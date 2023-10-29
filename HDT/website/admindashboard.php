<?php
session_start();
?>

<?php
if(isset($_GET['admin'])){
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
                background-color: green;
                display: flex;
                border-radius: 0.5rem;
                padding: 1rem 2rem;
                flex-direction: column;
                align-items: center;
                justify-content: space-around;
                margin: 0 35%;
                z-index:10000000000000;
            }
    
            .pop-up .head h3{
                color: #fff;
            }
    
            .pop-up .message{
                width:80%;
                margin-bottom: 1rem;
                color:#eee;
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
                <p style="text-align:center;">'.$_GET["admin"].'</p>
            </div>
            <div class="button">
                <button onclick="disappear()">Close</button>
            </div>
        </div>
        <script>
            const pop = document.getElementById("pop-up");
    
            let disappear = () =>{
                pop.style.display = "none";
                window.location.href = "admindashboard.php?id='.$_GET['id'].'&user='.$_GET['user'].'";
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
    <title>HDT - Admin Dashboard</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            scroll-behavior: smooth;
            font-family: poppins, Arial, Helvetica, sans-serif;
        }

        @keyframes grow {
            0% {
                transform:scale(.5);
            }
            100% {
                transform:scale(1);
            }
        }

        .body-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            background-color: #ddd;
        }

        .body-section .welcome-dashboard{
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 3rem;
            border-left:8px dashed rgb(19, 202, 19);
            border-right: 8px dashed green;
            border-bottom:3px dashed green;
            padding-bottom: 3rem;
        }

        .logout{
            margin-top:-8%;
            margin-left: -83%;
            margin-bottom:1rem;
        }

        .logout a{
            color: green;
            text-decoration: none;
            font-size:1.2rem;
            font-weight: 700;
            padding:0.5rem 1.5rem;
            border:2px dashed green;
        }

        .body-section .welcome-dashboard .welcome-words{
            text-align: center;
        }

        .body-section .welcome-dashboard .welcome-words .button a{
            text-decoration:none;
            padding-top:3rem;
            padding: 0.5rem 3rem;
            border: 2px solid green;
            color: rgb(75, 168, 75);
            font-weight: 700;
            background-color: #ddd;
        }

        .body-section .welcome-dashboard .welcome-words .button a:hover{
            background-color: rgb(21, 99, 21);
            border: 3px solid white;
            color: #eee;
        }

        .body-section .welcome-dashboard .welcome-words h1{
            color: rgb(45, 201, 45);
            margin-bottom: 2rem;
            animation: grow 0.5s;
            transition:.2s ease-in-out;
        }

        .para p{
            animation: grow 0.7s;
            transition:.2s ease-in-out;
            margin-left: 2rem;
        }

        .body-section .welcome-dashboard .welcome-pic{
            width: 50%;
            height: 350px;
            background-color: rgb(153, 235, 153);
            margin-right: 3rem;
            margin-bottom: 3rem;
            animation: grow 1s;
            transition:.2s ease-in-out;
        }

        .body-section .dashboard-content{
            display: flex;
            align-items: center;
            border-right:8px dashed green;
            border-left: 8px dashed rgb(19, 202, 19);
            padding-top: 3rem;
            margin-top: 0.6rem;
            background-color: rgb(173, 243, 173);
        }

        .active{
            text-decoration: none;
            background-color: #eee;
            color: green;
            font-size: 1.1rem;
            font-weight: 700;
            padding:0.5rem 2rem;
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
            width: 600px;
            margin: 2rem 0.25%;
            outline: 5px dotted #fff;
            background-color: rgb(87, 155, 87);
            display: flex;
            border-radius: 0.8rem;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            animation: grow 1.2s;
            transition:.2s ease-in-out;
        }

        .row-content{
            width: 80%;
        }

        .row-content p {
            text-align: center;
            animation: grow 1.9s;
            transition:.2s ease-in-out;
        }

        .row-head h2{
            color: #eee;
            animation: grow 1.7s;
            transition:.2s ease-in-out;
        }

        .button{
            animation: grow 1.9s;
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

        .logout{
            animation: grow 1.9s;
            transition:.2s ease-in-out;
        }

        .tag{
            animation: grow 1.5s;
            transition:.2s ease-in-out;
        }
    </style>
</head>
<body>
    <div class="body-section">
        <div class="welcome-dashboard">
            <div class="welcome-words">
                <div class="logout">
                    <a href="logout.php?user=<?php if(isset($_GET['user'])) echo $_GET['user']; ?>"><span><img src="icons/logout.png" style="height:18px;"></span> Log Out</a>
                </div>
                <div class="tag">
                    <h4 style="padding-bottom: 3rem;margin-left:-1rem; color: rgb(78, 190, 78);">@HDT: Physics & Chemistry</h4>
                </div>
                <div class="head">
                    <h1>Welcome <span style="color: green;"><?php if(isset($_GET['user'])) echo $_GET['user'] ?></span> : Dashboard Section  [admin]</h1>
                </div>
                <div class="para">
                    <p style="padding-right: 3rem;margin-bottom: 6rem;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum sapiente animi esse, magnam, explicabo voluptatibus molestiae quas laudantium facilis optio necessitatibus laborum eligendi eaque illo earum voluptas aut accusantium veniam.</p>
                </div>
                <div class="button">
                    <a href="<?php echo 'adregistered.php?user='.$_GET['user'] ?>">My Students</a>
                </div>
            </div>
            <div class="welcome-pic">

            </div>
        </div>
        <div class="dashboard-content">
            <div class="right" id="right">
                <div class="row">
                    <div class="row-head">
                        <?php 
                            include_once "connection.php";
                            $query = "SELECT COUNT(id) FROM requests;";
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
                        <!-- <div class="new"> </div> -->
                        <h2><span><img src="icons/file-small.png" style="height: 25px;"></span> Requests</h2>
                    </div>
                    <div class="row-content">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus nisi accusamus architecto beatae delectus doloremque magnam laborum eligendi, nostrum dolorum officiis perferendis facilis nobis totam. Harum voluptatum debitis eius voluptatibus.</p>
                    </div>
                    <div class="button">
                        <a href="<?php echo 'adrequests.php?user='.$_GET['user'] ?>">View Requests</a>
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
                        <h2><span><img src="icons/reddit.png" style="height: 25px;"></span>Zoom Meetings</h2>
                    </div>
                    <div class="row-content">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus nisi accusamus architecto beatae delectus doloremque magnam laborum eligendi, nostrum dolorum officiis perferendis facilis nobis totam. Harum voluptatum debitis eius voluptatibus.</p>
                    </div>
                    <div class="button">
                        <a href="<?php echo 'admeetings.php?user='.$_GET['user'] ?>">About my Meetings</a>
                    </div>
                </div>

                <div class="row">
                    <div class="row-head">
                        <h2><span><img src="icons/price.png" style="height: 25px;"></span> Payments</h2>
                    </div>
                    <div class="row-content">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus nisi accusamus architecto beatae delectus doloremque magnam laborum eligendi, nostrum dolorum officiis perferendis facilis nobis totam. Harum voluptatum debitis eius voluptatibus.</p>
                    </div>
                    <div class="button">
                        <a href="<?php echo 'adpayments.php?user='.$_GET['user'] ?>">View Payments</a>
                    </div>
                </div>

                <div class="row">
                    <div class="row-head">
                        <h2><span><img src="icons/upload-small.png" style="height: 25px;"></span> Create Notes</h2>
                    </div>
                    <div class="row-content">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus nisi accusamus architecto beatae delectus doloremque magnam laborum eligendi, nostrum dolorum officiis perferendis facilis nobis totam. Harum voluptatum debitis eius voluptatibus.</p>
                    </div>
                    <div class="button">
                        <a href="<?php echo 'adnotes.php?user='.$_GET['user'] ?>">Post Notes</a>
                    </div>
                </div>

                <div class="row">
                    <div class="row-head">
                        <h2><span><img src="icons/youtube.png" style="height: 25px;"></span> YouTube Videos</h2>
                    </div>
                    <div class="row-content">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus nisi accusamus architecto beatae delectus doloremque magnam laborum eligendi, nostrum dolorum officiis perferendis facilis nobis totam. Harum voluptatum debitis eius voluptatibus.</p>
                    </div>
                    <div class="button">
                        <a href="<?php echo 'adlectures.php?user='.$_GET['user'] ?>">HDT Videos</a>
                    </div>
                </div>

                <div class="row">
                    <div class="row-head">
                        <h2><span><img src="icons/tick.png" style="height: 25px;"></span> Conceptuals</h2>
                    </div>
                    <div class="row-content">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus nisi accusamus architecto beatae delectus doloremque magnam laborum eligendi, nostrum dolorum officiis perferendis facilis nobis totam. Harum voluptatum debitis eius voluptatibus.</p>
                    </div>
                    <div class="button">
                        <a href="<?php echo 'adconceptuals.php?user='.$_GET['user'] ?>">View Conceptuals</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
</body>
</html>