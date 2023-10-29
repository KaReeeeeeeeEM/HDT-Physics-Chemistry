<?php
    include "connection.php";

    if(isset($_POST['login'])){
        $user = $_POST['user'];
        $passkey = $_POST['passkey'];

        $query = "SELECT * FROM adminAcc WHERE (username = '$user' OR email = '$user') AND passkey = '$passkey' LIMIT 1;";
        $results = mysqli_query($connection,$query);
        // $stmt->bind_param("sss",$_POST['user'],$_POST['email'],$_POST['passkey']);
        // $stmt->execute();
        
        if(mysqli_num_rows($results) > 0){
            while($row = mysqli_fetch_array($results)){
                header('Location:admindashboard.php?id='.$row['id'].'&admin=Welcome again '.$row['username'].'&user='.$row['username']);
            }
        } else {
            header('Location:admin.php?error=User not found!');
        }
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
                background-color: rgb(97, 207, 97);
                display: flex;
                border-radius: 0.5rem;
                padding: 1rem 2rem;
                flex-direction: column;
                align-items: center;
                justify-content: space-around;
                margin: 0 35%;
            }
    
            .pop-up .head h3{
                color: green;
            }
    
            .pop-up .message{
                width:80%;
                margin-bottom: 1rem;
                color:#fff;
                font-weight:300;
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
                box-shadow: 0 0 3px 2px green;
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
                window.location.href = "admin.php";
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
    <title>HDT - Login as Admin</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing: border-box;
            font-family: poppins;
        }

        body{
            background-color:#ddd;
        }

        @keyframes grow {
            0% {
                transform:scale(.5);
            }
            100% {
                transform:scale(1);
            }
        }

        .form {
            display:flex;
            align-items:center;
            justify-content: space-evenly;
        }

        .form .left{
            width:50%;
            display: flex;
            flex-direction:column;
            align-items: center;
            justify-content: space-around;
        }

        .form .left h2{
            color: rgb(73, 185, 73);
            margin-bottom: 2rem;
            animation: grow 2s;
            transition:.2s ease-in-out;
        }

        .form .left .descriptions{
            margin-bottom: 3rem;
        }

        .form .left p{
            width: 95%;
            text-align:center;
            animation: grow 3s;
            transition:.2s ease-in-out;
        }

        .form .left h3{
            color: green;
            animation: grow 2.5s;
            transition:.2s ease-in-out;
        }

        .logo h3{
            font-style:italic;
            animation: grow 3.5s;
            transition:.2s ease-in-out;
        }

        .form .right{
            width:50%;
            height:980px;
            display:flex;
            align-items: center;
            justify-content: space-around;
            border-right: 10px dashed #ddd;
            background-color: rgb(46, 112, 46);
        }

        .form form{
            margin-right:7rem;
        }

        .form form .heading{
            color:#eee;
            margin:3rem 0 1.5rem 7rem;
            animation: grow 3s;
            transition:.2s ease-in-out;
        }

        .form form input[type=text],.form form input[type=password],.form form input[type=email],.form form input[type=tel],.form form input[type=number]{
            height:1rem;
            width: 120%;
            border:none;
            outline:none;
            cursor: pointer;
            border-radius: 0.6rem;
            font-size:1rem;
            background-color: #eee;
            text-align: center;
            padding:1.5rem 5rem;
            margin: 0.5rem 0 1rem;
            animation: grow 2s;
            transition:.2s ease-in-out;
        }

        .form form input[type=text]:focus,.form form input[type=password]:focus,.form form input[type=email]:focus,.form form input[type=tel]:focus,.form form input[type=number]:focus{
            border:3px solid rgb(73, 185, 73);
        }

        input[type=submit]{
            margin: 3rem 28%;
            border:none;
            cursor:pointer;
            outline:none;
            font-size: 1.2rem;
            font-weight: 700;
            border-radius: 1rem;
            color: green;
            padding:.6rem 5rem;
            animation: grow 3s;
            transition:.2s ease-in-out;
        }

        .descriptions p{
            margin-left:1rem;
        }

    </style>
</head>
<body>
    <div class="form">
        <div class="right">
            <form method="post">
                <div class="heading"><h2><span style="color: rgb(50, 207, 50);">Admin</span> credentials</h2></div>
                    <input type="text" name="user" id="user" placeholder="Username or Email" autocomplete="off" ><br>
                    <input type="password" name="passkey" id="passkey" placeholder="Password" ><br>

                <input type="submit" name="login" value="Login">
            </form>
        </div>
        <div class="left">
            <div class="heading">
                <h2>Login <span style="color:green">As</span> An <span style="color:green">Admin</span></h2>
            </div>

            <div class="descriptions">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea voluptate reiciendis, accusamus, rem eos at totam laborum beatae doloribus quibusdam cumque mollitia adipisci modi facilis a consequatur provident veritatis repellendus!</p>
            </div>

            <div class="logo">
                <h3>@HDT: Physics & Chemistry</h3>
            </div>
        </div>
    </div>
</body>
</html>