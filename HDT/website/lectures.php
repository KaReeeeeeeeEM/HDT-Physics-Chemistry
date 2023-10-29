<?php
    include_once "connection.php";
    $query2 = "SELECT * FROM lectures ORDER BY id DESC";
    $result2 = mysqli_query($connection,$query2);

    if(mysqli_num_rows($result2) > 0){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student - YouTube Lectures</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            scroll-behavior: smooth;
            font-family: poppins, Arial, Helvetica, sans-serif;
        }

        body{
            background-color: #eee;
            display:flex;
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
            height: 780px;
            position:fixed;
            left:0;
            padding-top: 2rem;
            border-right: 5px dashed green;
            background-color: rgb(174, 226, 174);
        }

        .left .details{
            margin:3rem;
            padding-bottom: 2rem;
            border-bottom: 4px dashed green;
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
        }

        .links a{
            text-decoration: none;
            color: green;
        }

        .active {
            border-left: 6px solid green;
            padding-left: 1rem;
        }

        .body-contents{
            display: flex;
            align-items: center;
            flex-direction: column;
            width:70%;
            margin-left:30%;
        }

        .body-contents .head h3{
            color: rgb(87, 238, 87);
            margin-top: 5rem;
            margin-bottom: 5rem;
            font-size: 1.3rem;
            animation: grow 1.5s;
            transition:.2s ease-in-out;
        }

        .table {
            width: 100%;
            margin: 0.5rem 30%;
        }

        .table table{
            width:98%;
            margin-left:1%;
            border: 1px solid green;
        }

        th{
            color:#333;
            animation: grow 1.7s;
            transition:.2s ease-in-out;
        }

        td{
            animation: grow 1.9s;
            transition:.2s ease-in-out;
        }

        th,td{
            text-align:center;
            padding:1rem 0.5rem;
        }

        tr:nth-child(2n-1){
            background-color: rgb(120, 211, 120);
            font-weight: 400;
        }

        td a{
            text-decoration: none;
            margin-right:0.5rem;
            margin-left:0.5rem;
        }

        .edit{
            background-color: red;
            color: white;
            padding:0.5rem 1rem;
            font-weight: 700;
            border-radius: 0.3rem;
        }
    </style>
</head>
<body>
    <div class="left">
        <div class="details">
        <a href="dashboard.php?id=<?php echo $_GET['id'] ?>&paid=<?php echo$_GET['paid'] ?>&user=<?php echo $_GET['user'] ?>" style="text-decoration:none;"><h2>Welcome Student <span style="color:green;">#00<?php if(isset($_GET['id'])) echo $_GET['id']; ?></span></h2></a>
            <h4>Paid: <span style="color:green;border-right: 5px solid green;padding-right:1rem;margin-right:1rem;"><?php echo $_GET['paid'] ?></span> Unpaid: <span style="color:green;"><?php echo (40000 - $_GET['paid']) ?></span></h4>
            <h4>Status: <?php if($_GET['paid'] == 40000) echo '<span style="color:green;">Fully Paid'; else echo '<span style="color:maroon;">Partially Paid'; ?></span></h4>
        </div>
       <div class="links">
            <h3><a href="notes.php?id=<?php echo $_GET['id'] ?>&paid=<?php echo$_GET['paid'] ?>&user=<?php echo $_GET['user'] ?>"><span><img src="icons/file-small.png" style="height: 23px;padding-right: 1rem;"></span>View Notes</a></h3>
            <h3><a href="conceptuals.php?id=<?php echo $_GET['id'] ?>&paid=<?php echo$_GET['paid'] ?>&user=<?php echo $_GET['user'] ?>"><span><img src="icons/about.png" style="height: 23px;padding-right: 1rem;"></span>Conceptuals</a></h3>
            <h3 class="active"><a href="lectures.php?id=<?php echo $_GET['id'] ?>&paid=<?php echo$_GET['paid'] ?>&user=<?php echo $_GET['user'] ?>"><span><img src="icons/youtube.png" style="height: 23px;padding-right: 1rem;"></span>HTD YouTube Lectures</a></h3>
            <h3><a href="payments.php?id=<?php echo $_GET['id'] ?>&paid=<?php echo$_GET['paid'] ?>&user=<?php echo $_GET['user'] ?>"><span><img src="icons/price.png" style="height: 23px;padding-right: 1rem;"></span>Payments</a></h3>
            <h3><a href="meetings.php?id=<?php echo $_GET['id'] ?>&paid=<?php echo$_GET['paid'] ?>&user=<?php echo $_GET['user'] ?>"><span><img src="icons/reddit.png" style="height: 23px;padding-right: 1rem;"></span>Available Zoom meetings</a></h3>
            <h3><a href="userlogout.php?user=<?php echo $_GET['user'] ?>"><span><img src="icons/logout.png" style="height: 23px;padding-right: 1rem;"></span>Log Out</a></h3>
        </div> 
    </div>
    <div class="body-contents">
        <div class="head">
            <h3>Posted YouTube Lectures</h3>
        </div>

        <div class="table">
            <table>
                <tr>
                    <th>Lecture No.</th>
                    <th>Lecture Title</th>
                    <th>Host</th>
                    <th>Short Description(s)</th>
                    <th>Subject</th>
                    <th>Link</th>
        <?php
             while($row2 = mysqli_fetch_array($result2)){
             echo '<tr>
                 <td>'.$row2['id'].'</td>
                 <td>'.$row2['title'].'</td>
                 <td>'.$row2['host'].'</td>
                 <td>'.$row2['descriptions'].'</td>
                 <td>'.$row2['subjects'].'</td>
                 <td><a href="'.$row2['link'].'" target="_blank" class="edit">Watch</a></td>
             </tr>
        ';
        }
        echo '</table>
        </div>
    </div>
';
              
    } else {
        echo ' 
        <!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                         <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Student - Meetings</title>
<style>
*{
    margin: 0;
    padding: 0;
    scroll-behavior: smooth;
    font-family: poppins, Arial, Helvetica, sans-serif;
}

body{
    background-color: #eee;
    display:flex;
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
    height: 780px;
    padding-top: 2rem;
    border-right: 5px dashed green;
    background-color: rgb(174, 226, 174);
}

.left .details{
    margin:3rem;
    padding-bottom: 2rem;
    border-bottom: 4px dashed green;
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
}

.links a{
    text-decoration: none;
    color: green;
}

.active {
    border-left: 6px solid green;
    padding-left: 1rem;
}

.body-contents{
    display: flex;
    align-items: center;
    flex-direction: column;
    width:70%;
}

.body-contents .head h3{
    color: rgb(87, 238, 87);
    margin-top: 5rem;
    margin-bottom: 5rem;
    font-size: 1.3rem;
    animation: grow 1.5s;
    transition:.2s ease-in-out;
}

.table {
    width: 100%;
    margin: 0.5rem 1%;
}

.table table{
    width:98%;
    margin-left:1%;
    border: 1px solid green;
}

th{
    color:#333;
    animation: grow 1.7s;
    transition:.2s ease-in-out;
}

td{
    animation: grow 1.9s;
    transition:.2s ease-in-out;
}

th,td{
    text-align:center;
    padding:1rem 0.5rem;
}

tr:nth-child(2n-1){
    background-color: rgb(120, 211, 120);
    font-weight: 400;
}

td a{
    text-decoration: none;
    margin-right:0.5rem;
    margin-left:0.5rem;
}

p{
    color:green;
    margin-top:30%;
    font-weight:700;
}

</style>
</head>
<body>
<div class="left">
        <div class="details">
                <a href="dashboard.php?id='.$_GET['id'].'&paid='.$_GET['paid'].'&user='.$_GET['user'].'" style="text-decoration:none;"><h2>Welcome Student <span style="color:green;">#00';?><?php if(isset($_GET['id'])) echo $_GET['id']; ?><?php echo '</span></h2></a>
                <h4>Paid: <span style="color:green;border-right: 5px solid green;padding-right:1rem;margin-right:1rem;">'.$_GET['paid'].'</span> Unpaid: <span style="color:green;">'.(40000 - $_GET['paid']).'</span></h4>
                <h4>Status:';?><?php if($_GET['paid'] == 40000) echo '<span style="color:green;">Fully Paid'; else echo '<span style="color:maroon;">Partially Paid'; ?><?php echo '</span></h4>
        </div>
        <div class="links">
                <h3><a href="notes.php?id='.$_GET['id'].'&paid='.$_GET['paid'].'&user='.$_GET['user'].'"><span><img src="icons/file-small.png" style="height: 23px;padding-right: 1rem;"></span>View Notes</a></h3>
                <h3><a href="conceptuals.php?id='.$_GET['id'].'&paid='.$_GET['paid'].'&user='.$_GET['user'].'"><span><img src="icons/about.png" style="height: 23px;padding-right: 1rem;"></span>Conceptuals</a></h3>
                <h3 class="active"><a href="lectures.php?id='.$_GET['id'].'&paid='.$_GET['paid'].'&user='.$_GET['user'].'"><span><img src="icons/youtube.png" style="height: 23px;padding-right: 1rem;"></span>HTD YouTube Lectures</a></h3>
                <h3><a href="payments.php?id='.$_GET['id'].'&paid='.$_GET['paid'].'&user='.$_GET['user'].'"><span><img src="icons/price.png" style="height: 23px;padding-right: 1rem;"></span>Payments</a></h3>
                <h3><a href="meetings.php?id='.$_GET['id'].'&paid='.$_GET['paid'].'&user='.$_GET['user'].'"><span><img src="icons/reddit.png" style="height: 23px;padding-right: 1rem;"></span>Available Zoom meetings</a></h3>
                <h3><a href="userlogout.php?user='.$_GET['user'].'"><span><img src="icons/logout.png" style="height: 23px;padding-right: 1rem;"></span>Log Out</a></h3>
        </div> 
        </div>
        <div class="body-contents">
            <p>No Posted Lectures Available😪</p>
        </div>
</body>
</html>
';
    }
        ?>
    </div>
    
</body>
</html>