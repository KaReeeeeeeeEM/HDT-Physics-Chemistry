<?php
    include "connection.php";

    if(isset($_POST['submit'])){
        $user = $_POST['fullname'];
        $email = $_POST['email'];
        $passkey = $_POST['passkey'];

        $query2 = "SELECT * FROM registered WHERE (fullname = '$user' OR email = '$email') AND passkey = '$passkey' LIMIT 1;";
        $results = mysqli_query($connection,$query2);

        if(mysqli_num_rows($results) > 0){
            header('Location:register.php?error=Account already exists! Please use a different name, email and password.');
        } else {

        $query = "INSERT INTO requests(fullname,email,passkey,contacts,residence,paid,unpaid) VALUES (?,?,?,?,?,?,?);";
        $stmt = mysqli_prepare($connection,$query);
        $stmt->bind_param("sssssss",$_POST['fullname'],$_POST['email'],$_POST['passkey'],$_POST['contacts'],$_POST['residence'],$_POST['paid'],$_POST['unpaid']);
        $stmt->execute();

        header('Location:register.php?status=Thank you '.$_POST['fullname'].'. Your request is being processed, Kindly wait to be registered so as to sign in.');
        }
    } 
?>

<?php

if(isset($_GET['error'])){
    echo '
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Error</title>
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
                background-color: rgba(109, 233, 109, 0.74);
                display: flex;
                border-radius: 0.5rem;
                padding: 1rem 2rem;
                flex-direction: column;
                align-items: center;
                justify-content: space-around;
                margin: 0 35%;
            }
    
            .pop-up .head h3{
                color: #fff;
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
                <h3>Error</h3>
            </div>
            <div class="message">
                <p style="text-align:center;">'.$_GET["error"].'</p>
            </div>
            <div class="button">
                <button onclick="disappear()">Close</button>
            </div>
        </div>
        <script>
            const pop = document.getElementById("pop-up");
    
            let disappear = () =>{
                pop.style.display = "none";
                window.location.href = "register.php";
            }
        </script>
        
    </body>
    </html>
    
    ';
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
                background-color: rgba(109, 233, 109, 0.74);
                display: flex;
                border-radius: 0.5rem;
                padding: 1rem 2rem;
                flex-direction: column;
                align-items: center;
                justify-content: space-around;
                margin: 0 35%;
            }
    
            .pop-up .head h3{
                color: #fff;
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
                window.location.href = "register.php";
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
    <title>HDT - Register</title>
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
            animation: grow 1s;
            transition:.2s ease-in-out;
        }

        .form .left .descriptions{
            margin-bottom: 3rem;
        }

        .form .left p{
            width: 95%;
            text-align:center;
            animation: grow 2s;
            transition:.2s ease-in-out;
        }

        .form .left h3{
            color: rgb(73, 185, 73);
            animation: grow 3s;
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
            border-left: 10px dashed #ddd;
            background-color: rgb(73, 185, 73);
        }

        
        .form form .heading{
            color:#eee;
            margin:3rem auto 1.5rem 8rem;
            animation: grow 3.8s;
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
            color: rgb(73, 185, 73);
            padding:.6rem 5rem;
            animation: grow 5s;
            transition:.2s ease-in-out;
        }

        .descriptions {
            margin-left:1rem;
        }

    </style>
</head>
<body>
    <div class="form">
        <div class="left">
            <div class="heading">
                <h2>Register <span style="color:green">Now</span></h2>
            </div>

            <div class="descriptions">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea voluptate reiciendis, accusamus, rem eos at totam laborum beatae doloribus quibusdam cumque mollitia adipisci modi facilis a consequatur provident veritatis repellendus!</p>
            </div>

            <div class="logo">
                <h3>@HDT: Physics & Chemistry</h3>
            </div>

            <div class="login">
                <h3 style="margin-top:10rem;color:#4d4d4d;">Already enrolled? <a href="login.php" style="color:rgb(73, 185, 73);">Login</a></h3>
            </div>
        </div>
        <div class="right">
            <form method="post">
                <div class="heading"><h2>1. Basic Info</h2></div>
                    <input type="text" name="fullname" id="fullname" placeholder="Enter your full names" oninput="validName()" autocomplete="off" autofocus required><br>
                    <input type="email" name="email" id="email" placeholder="Enter your email" oninput="validEmail()" autocomplete="off" required><br>
                    <input type="password" name="passkey" id="passkey" placeholder="Enter Password" oninput="validPass()" autocomplete="off" required><br>
                    <input type="password" name="confirm" id="confirm" placeholder="Confirm Password" oninput="validConfirm()" autocomplete="off" required><br>
                    <input type="tel" name="contacts" id="contacts" placeholder="Contacts" oninput="validTel()" autocomplete="off" required><br>
                    <input type="text" name="residence" id="residence" placeholder="Place of Residence" autocomplete="off" oninput="validRes()" required><br>

                <div class="heading"><h2>2. Payment Info</h2></div>
                    <input type="text" name="paid" id="paid" placeholder="Amount Paid" autocomplete="off" oninput="calculate()" required><br>
                    <input type="text" name="unpaid" id="unpaid" placeholder="Unpaid Amount (if any)" required readonly hidden><br>
                    <input type="submit" name="submit" value="Register">

                <div class="error">
                    <h3 id="error" style="color:tomato;text-align:center;"></h3>
                </div>
            </form>

            
        </div>
    </div>

    <script>
        const paid = document.getElementById("paid");
        const unpaid = document.getElementById("unpaid");
        const email = document.getElementById("email");
        const emailError = document.getElementById("emailError");
        const tel = document.getElementById("contacts");
        const user = document.getElementById("fullname");
        const error = document.getElementById("error");
        const res = document.getElementById("residence");
        const passkey = document.getElementById("passkey");
        const confirm = document.getElementById("confirm");

        let calculate = () =>{
            unpaid.value = 40000 - paid.value; 
            if(unpaid.value != 0){
                unpaid.style.color = "tomato";
                unpaid.style.display = "flex";
            } else {
                unpaid.style.display = "none";
            }
        }

        let validConfirm = () => {
            if(passkey.value === confirm.value){
                confirm.style.color = "rgb(65, 192, 65)";
            } else {
                confirm.style.color = "tomato";
            }
        }

        let validPass = () =>{
        if((passkey.value).length > 8 || (passkey.value).length < 4 ){
                passkey.style.color = "tomato";
                 
        } else {
                passkey.style.color = "rgb(65, 192, 65)";
            }
        }

        let validName = () =>{
        if((user.value).length < 3|| (user.value).includes("!") == true || (user.value).includes("@") == true || (user.value).includes("#") == true || (user.value).includes("$") == true || (user.value).includes("%") == true || (user.value).includes("^") == true || (user.value).includes("&") == true || (user.value).includes("*") == true || (user.value).includes("(") == true || (user.value).includes(")") == true || (user.value).includes("-") == true || (user.value).includes("-") == true || (user.value).includes("+") == true || (user.value).includes("=") == true || (user.value).includes("/") == true || (user.value).includes("~") == true || (user.value).includes("£") == true || (user.value).includes("?") == true || (user.value).includes("<") == true || (user.value).includes(">") == true ){
                user.style.color = "tomato";
                 
        } else {
                user.style.color = "rgb(65, 192, 65)";
            }
        }

        let validEmail = () =>{
            if((email.value).includes("@") == true) {
                if((email.value).includes("com") == true){
                    email.style.color = "rgb(65, 192, 65)"; 
                }
            } else {
                email.style.color = "tomato";
            }
        }

        let validTel = () =>{
            if((tel.value).length > 15 || (tel.value).length < 5){
                tel.style.color = "tomato";
            } else {
                tel.style.color = "rgb(65, 192, 65)";
            }
        }

        let validRes = () => {
            if((res.value).length < 3){
                res.style.color = "tomato";
            } else {
                res.style.color = "rgb(65, 192, 65)";
            }
        }
    </script>
</body>
</html>