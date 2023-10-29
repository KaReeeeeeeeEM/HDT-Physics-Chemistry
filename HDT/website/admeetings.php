<?php 
                        include_once "connection.php";

                        if(isset($_POST['create'])){
                            $query = "INSERT INTO meetings(title,host,descriptions,dates,duration,meetID,subjects,link) VALUES (?,?,?,?,?,?,?,?);";
                            $stmt = mysqli_prepare($connection,$query);
                            $stmt->bind_param("ssssssss",$_POST['title'],$_POST['host'],$_POST['descriptions'],$_POST['dates'],$_POST['duration'],$_POST['meetID'],$_POST['subjects'],$_POST['link']);
                            $stmt->execute();
                    
                            header('Location:admeetings.php?user='.$_GET['user'].'&status=New '.$_POST['subjects'].' meeting available');
                        } 

                    ?>

<?php
if(isset($_GET['status'])){
    echo '
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Info</title>
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
                z-index:10000000000;
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
                <h3>Info</h3>
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
                window.location.href = "admeetings.php?user='.$_GET["user"].'";
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
    <title>Admin - Meetings</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing:border-box;
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


        /* For the navigation section */
        .nav{
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 5rem;
            border-bottom:2px dashed #ddd;
            background-color: rgb(81, 177, 81);
            /* rgb(115, 231, 115) */
        }

        .nav .logo{
            margin-left: 2rem;
            animation: grow 1s;
            transition:.2s ease-in-out;
        }

        .nav .logo a{
            text-decoration: none;
            color: #eee;
            font-size: 1rem;
            letter-spacing: 2px;
        }

        .nav .links ul{
            display: flex;
            list-style: none;
            justify-content: space-evenly;
            align-items: center;
            margin-right: 3rem;
        }

        .nav .links ul li.admin{
            color:rgb(58, 161, 58);
            border: 2px dashed rgb(56, 175, 56);
            border-radius:1.5rem;
            background-color: #ddd;
        }

        .nav .links ul li.admin:hover{
            background-color: rgb(117, 199, 117);
            border: 2px dashed #ddd;
            color: #ddd;
        }

        .nav .links ul a{
            text-decoration:none;
        }

        .nav .links ul a li{
            text-align: center;
            padding:0.5rem 2rem;
            color: #ddd; 
            font-size: 1.2rem;
            font-weight:700;
            transition:.4s ease-in-out;
            animation: grow 2s;
            transition:.2s ease-in-out;
        }

        .nav .links ul a li:hover{
            color: rgb(155, 233, 155);
        }

        .body{
            display:flex;
            align-items:center;
            justify-content:space-evenly;
        }

        .row{
            height: 350px;
            width: 500px;
            margin: 2rem 0.25%;
            outline: 5px dotted #fff;
            background-color: rgb(133, 229, 133);
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
            color: green;
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

        #meetform{
            background: none;
            display: none;
            flex-direction: column;
            align-items: center;
            justify-content: space-evenly;
            height:auto;
            width:650px;
            border-right: 6px dashed green;
            border-radius: 0;
            padding-top:5rem;
        }

        #meetform input{
            width:110%;
            padding: 0.4rem 5rem;
            margin-bottom: 2rem;
            text-align: center;
            border:none;
            outline: 2px solid green;
            border-radius:0.4rem;
        }

        #meetform input:focus{
            outline:3px solid green;
        }

        input[type=submit]{
            color:white;
            font-weight:700;
            background-color:green;
            cursor:pointer;
            transition:.4s ease-in-out;
            animation: grow 5.5s;
            transition:.2s ease-in-out;
        }

        input[type=submit]:hover{
            background-color:rgb(133, 229, 133);
            color:green;
        }

        #one{
            animation: grow 1.2s;
            transition:.2s ease-in-out;
        }
        
        #two{
            animation: grow 2s;
            transition:.2s ease-in-out;
        }
        
        #three{
            animation: grow 2.5s;
            transition:.2s ease-in-out;
        }
        
        #four{
            animation: grow 3s;
            transition:.2s ease-in-out;
        }
        
        #five{
            animation: grow 3.5s;
            transition:.2s ease-in-out;
        }
        
        #six{
            animation: grow 4s;
            transition:.2s ease-in-out;
        }
        
        #seven{
            animation: grow 4.5s;
            transition:.2s ease-in-out;
        }
        
        #eight{
            animation: grow 5s;
            transition:.2s ease-in-out;
        }

        #button1{
            display:none;
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

        #meeting{
            animation: grow 0.5s;
            transition:.2s ease-in-out;
        }

        #history{
            animation: grow 1.5s;
            transition:.2s ease-in-out;
        }

        #notify{
            animation: grow 2.5s;
            transition:.2s ease-in-out;
        }


    </style>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <a href="<?php echo 'admindashboard.php?user='.$_GET['user'] ?>"><h2>HDT - Meetings</h2></a>
        </div>
        <div class="links">
                <ul>
                    <a href="<?php echo 'adrequests.php?user='.$_GET['user'] ?>"><li>Requests</li></a>
                    <a href="<?php echo 'adpayments.php?user='.$_GET['user'] ?>"><li>Payments</li></a>
                    <a href="<?php echo 'adnotes.php?user='.$_GET['user'] ?>"><li>Notes</li></a>
                    <a href="<?php echo 'adlectures.php?user='.$_GET['user'] ?>"><li>Lectures</li></a>
                    <a href="<?php echo 'adconceptuals.php?user='.$_GET['user'] ?>"><li>Conceptuals</li></a>
                    <a href="logout.php?user=<?php echo $_GET['user']; ?>&status=Goodbye <?php echo $_GET['user']; ?> !Feel free to login another time" class="admin"><li class="admin">Log Out</li></a>
                </ul>
        </div>
    </div>


        <div class="body">
                <div class="row" id="meetform">
                    <form method="post">
                        <input type="text" autocomplete="off" placeholder="Meeting Title" name="title" id="one" autofocus required> <br>
                        <input type="text" autocomplete="off" placeholder="Host" name="host" id="two" required> <br>
                        <input type="text" autocomplete="off" placeholder="Short decription (optional)" name="descriptions" id="three"> <br>
                        <input type="date" autocomplete="off" name="dates" id="four" required> <br>
                        <input type="text" autocomplete="off" placeholder="Start time (duration)" name="duration" id="five" required> <br>
                        <input type="text" autocomplete="off" placeholder="Meeting ID" name="meetID" id="six" required> <br>
                        <input type="text" autocomplete="off" placeholder="Subject" name="subjects" id="seven" required> <br>
                        <input type="text" autocomplete="off" placeholder="link" name="link" id="eight" required> <br>
                        <input type="submit" value="Add Meeting" name="create">
                    </form>
                </div>
                <div class="row" id="meeting">
                    <div class="row-head">
                        <h2><span><img src="icons/reddit.png" style="height: 25px;"></span> Create a Zoom Meeting</h2>
                    </div>
                    <div class="row-content">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus nisi accusamus architecto beatae delectus doloremque magnam laborum eligendi, nostrum dolorum officiis perferendis facilis nobis totam. Harum voluptatum debitis eius voluptatibus.</p>
                    </div>
                    <div class="button">
                        <a href="#">Go to Zoom</a>
                    </div>
                </div>
                
                <div class="row" id="history">
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
                        <h2><span><img src="icons/reddit.png" style="height: 25px;"></span> Meeting History</h2>
                    </div>
                    <div class="row-content">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus nisi accusamus architecto beatae delectus doloremque magnam laborum eligendi, nostrum dolorum officiis perferendis facilis nobis totam. Harum voluptatum debitis eius voluptatibus.</p>
                    </div>
                    <div class="button">
                        <a href="admeetinghistory.php?user=<?php echo $_GET['user'] ?>">My Meetings</a>
                    </div>
                </div>

                <div class="row" id="notify">
                    <div class="row-head">
                        <h2><span><img src="icons/reddit.png" style="height: 25px;"></span> Make a Meeting Record</h2>
                    </div>
                    <div class="row-content">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus nisi accusamus architecto beatae delectus doloremque magnam laborum eligendi, nostrum dolorum officiis perferendis facilis nobis totam. Harum voluptatum debitis eius voluptatibus.</p>
                    </div>
                    <div class="button" id="button1">
                        <a href="<?php echo 'admeetings.php?user='.$_GET['user'] ?>">Back to Meetings</a>
                    </div>
                    <div class="button" id="button2">
                        <a href="#" onclick="fade()">Notify Students</a>
                    </div>
                </div>
    </div>
    <script>
        const meeting = document.getElementById("meeting");
        const meetform = document.getElementById("meetform");
        const notify = document.getElementById("notify");
        const history = document.getElementById("history");
        const button1 = document.getElementById("button1");
        const button2 = document.getElementById("button2");

        let fade = () =>{
            meeting.style.display = "none";
            history.style.display = "none";
            meetform.style.display = "flex";
            button2.style.display = "none";
            button1.style.display = "flex";

        }
    </script>
</body>
</html>