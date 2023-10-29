<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HDT - Home</title>
    <link rel="stylesheet" href="style.css">
    <style>
        *{
                margin: 0;
                padding: 0;
                font-family: poppins,Arial, Helvetica, sans-serif;
            }

        @keyframes grow {
            0% {
                transform:scale(.5);
            }
            100% {
                transform:scale(1);
            }
        }

        .nav .logo{
            animation: grow 2s;
            transition:.2s ease-in-out;
        }

        .links ul li{
            animation: grow 2.5s;
            transition:.2s ease-in-out;
        }

        .hero-image img{
            animation: grow 3s;
            transition:.2s ease-in-out;
        }

        .description h1{
            animation: grow 3s;
            transition:.2s ease-in-out;
        }
        
        .description p{
            animation: grow 3.5s;
            transition:.2s ease-in-out;
        }

        .buttons .join{
            animation: grow 4s;
            transition:.2s ease-in-out;
        }
        
        .buttons .see-more{
            animation: grow 4.1s;
            transition:.2s ease-in-out;
        }

        .about-heading h1{
            animation: grow 4.5s;
            transition:.2s ease-in-out;
        }

        .about-description .description{
            animation: grow 5s;
            transition:.2s ease-in-out;
        }

        .image-head h1{
            animation: grow 9s;
            transition:.2s ease-in-out;
        }

        .div1{
            animation: grow 12.7s;
            transition:.2s ease-in-out;
        }

        .div1 .img1{
            animation: grow 13.5s;
            transition:.2s ease-in-out;
        }

        .in-div1{
            animation: grow 13.7s;
            transition:.2s ease-in-out;
        }

        .div2{
            animation: grow 12.9s;
            transition:.2s ease-in-out;
        }

        .div3{
            animation: grow 13.1s;
            transition:.2s ease-in-out;
        }

        .div3 .img5{
            animation: grow 13.3s;
            transition:.2s ease-in-out;
        }
        
        .div3 .img6{
            animation: grow 13.5s;
            transition:.2s ease-in-out;
        }

        .call-to-action{
            background: #fff;
            border-bottom:8px dashed rgb(133, 229, 133);
        }

        .call-to-action .description .heading h2{
            animation: grow 16.9s;
            transition:.2s ease-in-out;
        }
        
        .call-to-action .description .explanation p{
            animation: grow 16.8s;
            transition:.2s ease-in-out;
        }
        
        .call-to-action .description .button{
            animation: grow 17s;
            transition:.2s ease-in-out;
        }

        .footer .map-section .map{
            animation: grow 17.3s;
            transition:.2s ease-in-out;
        }
        
        .footer .direction h3{
            animation: grow 17.5s;
            transition:.2s ease-in-out;
        }

        .contacts h3{
            animation: grow 17.8s;
            transition:.2s ease-in-out;
        }

        .social-media .media{
            animation: grow 18s;
            transition:.2s ease-in-out;
        }

        .team-section{
        display:flex;
        flex-direction: column;
        justify-content: space-around;
        padding:2rem auto;
        background-color: rgb(133, 229, 133);
        border-bottom:8px dashed rgb(87, 175, 87);
    }

    .team-section .head{
        text-align: center;
        margin-top: 2rem;
        color:#fff;
        font-weight:700;
        animation: grow 18s;
        transition:.2s ease-in-out;
    }

    .team {
        display:flex;
        align-items: center;
        justify-content: space-around;
        padding:2rem auto;
        background-color: rgb(133, 229, 133);
    }

    .team .member{
        display:flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
        margin:2rem auto;
    }

    .first{
        width:250px;
        height:250px;
        border-radius: 50%;
        margin:2rem auto;
        outline: 4px solid #ddd;
        background-color: rgb(81, 161, 81);
        animation: grow 12s;
        transition:.2s ease-in-out;
    }
    
    .second{
        width:250px;
        height:250px;
        border-radius: 50%;
        margin:2rem auto;
        outline: 4px solid #ddd;
        background-color: rgb(81, 161, 81);
        animation: grow 20s;
        transition:.2s ease-in-out;
    }
    
    .third{
        width:250px;
        height:250px;
        border-radius: 50%;
        margin:2rem auto;
        outline: 4px solid #ddd;
        background-color: rgb(81, 161, 81);
        animation: grow 29s;
        transition:.2s ease-in-out;
    }
    
    .fourth{
        width:250px;
        height:250px;
        border-radius: 50%;
        margin:2rem auto;
        outline: 4px solid #ddd;
        background-color: rgb(81, 161, 81);
        animation: grow 38s;
        transition:.2s ease-in-out;
    }

    .name h3{
        color: green;
        animation: grow 18.8s;
        transition:.2s ease-in-out;
    }

    .category h4{
        color: #333;
        text-align:center;
        animation: grow 19s;
        transition:.2s ease-in-out;
    }

    </style>
</head>
<body>

        <!--Navigation section -->
    <div class="nav">
        <div class="logo">
            <a href="#"><h2>HDT</h2></a>
        </div>

        <div class="links">
            <ul>
                <a href="#hero"><li>Home</li></a>
                <a href="#about"><li>About</li></a>
                <a href="#contacts"><li>Contacts</li></a>
                <a href="register.php" target="_blank"><li>Join</li></a>
                <a href="login.php" target="_blank"><li>Sign In</li></a>
                <a href="admin.php" target="_blank" class="admin"><li class="admin">Login as Admin</li></a>
            </ul>
        </div>
    </div>

         <!--Hero section -->
    <div class="hero-section" id="hero">
        <div class="hero-image">
            <img src="images/robot-2027195_1280.png">
        </div>
        <div class="hero-descriptions">
            <div class="description">
                <h1>HDT : <span style="color: rgb(155, 233, 155)">Physics</span> <span>&</span> <span style="color: rgb(155, 233, 155)">Chemistry</span></h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi molestiae dignissimos inventore suscipit necessitatibus esse minus officiis reiciendis totam? Nesciunt quam similique aut officia? Id quam fuga repellat error quas!</p>
            </div>
            <div class="buttons">
                <div class="join">
                    <a href="register.php" target="_blank">Enroll Now</a>
                </div>
                <div class="see-more">
                    <a href="#images">Our Facilities</a>
                </div>
            </div>
        </div>
    </div>

    
        <!--About section -->
    <div class="about-section" id="about">
        <div class="about-heading">
            <h1>So what is <span style="color:rgb(65, 192, 65)">HDT</span> all about? 🧐</h1>
        </div>
        <div class="about-description">
            <div class="description">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deleniti ex ullam cupiditate est. Deserunt ipsum unde minus qui magni eaque temporibus, ut earum laboriosam quia et maiores, labore omnis sapiente.</p>
            </div>
            <div class="description">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deleniti ex ullam cupiditate est. Deserunt ipsum unde minus qui magni eaque temporibus, ut earum laboriosam quia et maiores, labore omnis sapiente.</p>
            </div>
            <div class="description">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deleniti ex ullam cupiditate est. Deserunt ipsum unde minus qui magni eaque temporibus, ut earum laboriosam quia et maiores, labore omnis sapiente.</p>
            </div>
            <div class="description">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deleniti ex ullam cupiditate est. Deserunt ipsum unde minus qui magni eaque temporibus, ut earum laboriosam quia et maiores, labore omnis sapiente.</p>
            </div>
        </div>
    </div>

    <!--Image Gallery section -->
    
    <div class="image-section" id="images">
        <div class="image-head">
            <h1>Get all caught up</h1>
        </div>
        <div class="div1">
            <div class="img1">
                <img src="#">
            </div>
            <div class="in-div1">
                <div class="img2">
                    <img src="#">
                </div>
                <div class="img3">
                    <img src="#">
                </div>
            </div>
        </div>
        <div class="div2">
            <img src="#">
        </div>
        <div class="div3">
            <div class="img5">
                <img src="#">
            </div>
            <div class="img6">
                <img src="#">
            </div>
        </div>
    </div>

    <!-- Call to action section -->
    <div class="call-to-action" id="join">
        <div class="description">
            <div class="heading">
                <h2><span style="color:rgb(52, 141, 52);margin-right:1rem;">Ready?</span> Set! <span style="color:rgb(52, 141, 52);margin-left:1rem;">Learn!</span></h2>
            </div>
            <div class="explanation">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima suscipit labore amet, deleniti animi esse non inventore. Perspiciatis omnis, illum, aliquid est, explicabo molestias laudantium quibusdam quidem enim corrupti facilis? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab, ex distinctio! Nemo, itaque maxime! Obcaecati animi, ad harum veritatis dolorum repellat dicta, quo libero commodi, officiis fugiat voluptatem placeat. Nisi?</p>
            </div>
            <div class="button">
                <a href="register.php" target="_blank">Get Started</a>
            </div>
        </div>
        <div class="image">
            <img src="images/sketch-3047721_1280.jpg">
        </div>
    </div>

    <!---- Team Section   -->
    <div class="team-section">
        <div class="head">
            <h2>Meet the Team</h2>
        </div>

        <div class="team">
            <div class="member">
                <div class="pic first">

                </div>
                <div class="name">
                    <h3>Hazen</h3>
                </div>
                <div class="category">
                    <h4>CEO of HDT&<br>Head of Physics Department</h4>
                </div>
            </div>
            
            <div class="member">
                <div class="pic second">

                </div>
                <div class="name">
                    <h3>Dalton</h3>
                </div>
                <div class="category">
                    <h4>Head of Chemistry Department</h4>
                </div>
            </div>
            
            <div class="member">
                <div class="pic third">

                </div>
                <div class="name">
                    <h3>Thomas</h3>
                </div>
                <div class="category">
                    <h4>Head of Students Consultancy</h4>
                </div>
            </div>
            
            <div class="member">
                <div class="pic fourth">

                </div>
                <div class="name">
                    <h3>Joan</h3>
                </div>
                <div class="category">
                    <h4>Practical Organizer</h4>
                </div>
            </div>
            
            
        </div>
    </div>

    <!-- Footer Section  -->
    <div class="footer" id="contacts">
        <div class="map-section">
            <div class="map">

            </div>
            <div class="direction">
                <h3><img src="icons/location.png" height="40" width="40" style="margin-top:3rem;padding-right:0.3rem;padding-top:0.5rem;"> Reach our Location</h3>
            </div>
        </div>
        <div class="contacts-section">
            <div class="logo">
                <a href="#"><h1>HDT</h1></a>
            </div>
            <div class="contacts">
                <h3>Email: <span style="color:#ddd;margin-left:1rem;"><a href="#" style="text-decoration:none;color:#ddd;">hazenHDT@gmail.com</a></span></h3>
                <h3>Contacts: <span style="color:#ddd;margin-left:1rem;"><a href="#" style="text-decoration:none;color:#ddd;">+255 654 789 098</a></span></h3>
            </div>
            <div class="social-media">
                <div class="media"><a href="#"><img src="icons/instagram.png"></a></div>
                <div class="media"><a href="#"><img src="icons/telegram.png"></a></div>
                <div class="media"><a href="#"><img src="icons/linkedin.png"></a></div>
                <div class="media"><a href="#"><img src="icons/whatsapp.png"></a></div>
            </div>
        </div>
    </div>
</body>
</html>