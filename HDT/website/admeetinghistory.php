<?php
include_once "connection.php";

$query = "SELECT * FROM meetings WHERE attended = 'attended';";
$result = mysqli_query($connection,$query);

$query2 = "SELECT * FROM meetings WHERE attended != 'attended';";
$result2 = mysqli_query($connection,$query2);

if(mysqli_num_rows($result) > 0 ){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Meetings History</title>
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
            animation: grow 1.3s;
            transition:.2s ease-in-out;
        }

        .nav .links ul a li:hover{
            color: rgb(155, 233, 155);
        }

        /* For the body content section */
        .body-contents{
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            flex-direction: column;
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

        .edit{
            background-color: orange;
            color: #eee;
            padding:0.5rem 1rem;
            font-weight: 700;
            border-radius: 0.3rem;
        }

        .accept{
            background-color: blue;
            color: #fff;
            padding:0.5rem 1rem;
            font-weight: 700;
            border-radius: 0.3rem;
        }

        .decline{
            background-color: rgb(158, 41, 21);
            color: #eee;
            padding:0.5rem 1rem;
            font-weight: 700;
            border-radius: 0.3rem;
        }
    </style>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <a href="<?php echo 'admeetings.php?user='.$_GET['user'] ?>"><h2>HDT - Meeting History</h2></a>
        </div>
        <div class="links">
                <ul>
                    <a href="<?php echo 'admeetings.php?user='.$_GET['user'] ?>"><li>Meetings</li></a>
                    <a href="<?php echo 'adrequests.php?user='.$_GET['user'] ?>"><li>Requests</li></a>
                    <a href="<?php echo 'adnotes.php?user='.$_GET['user'] ?>"><li>Notes</li></a>
                    <a href="<?php echo 'adlectures.php?user='.$_GET['user'] ?>"><li>Lectures</li></a>
                    <a href="<?php echo 'adconceptuals.php?user='.$_GET['user'] ?>"><li>Conceptuals</li></a>
                    <a href="logout.php?user=<?php echo $_GET['user']; ?>&status=Goodbye <?php echo $_GET['user']; ?> !Feel free to login another time" class="admin"><li class="admin">Log Out</li></a>
                </ul>
        </div>
    </div>

    <!---- Body Section   -->
    <div class="body-contents">
        <div class="head">
            <h3>Attended Meetings</h3>
        </div>

        <div class="table">
          <table>
            <tr>
                 <th>Meeting No.</th>
                 <th>Meeting Title</th>
                 <th>Host</th>
                 <th>Short Description</th>
                 <th>Date</th>
                 <th>Time</th>
                 <th>Meeting ID</th>
                 <th>Subject</th>
                 <th>Actions</th>
            </tr>

            <?php
            while($row = mysqli_fetch_array($result)){
            echo '<tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['title'].'</td>
            <td>'.$row['host'].'</td>
            <td>'.$row['descriptions'].'</td>
            <td>'.$row['dates'].'</td>
            <td>'.$row['duration'].'</td>
            <td>'.$row['meetID'].'</td>
            <td>'.$row['subjects'].'</td>
            <td>
                <a href="clearmeeting.php?id='.$row['id'].'&title='.$row['title'].'&user='.$_GET['user'].'" class="decline">Clear Meeting</a>
            </td>
        ';
             } 
        echo '</table>
        </div>';
} else {
    echo '
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Meeting History</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing:border-box;
            scroll-behavior: smooth;
            font-family: poppins, Arial, Helvetica, sans-serif;
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
        }

        .nav .links ul a li:hover{
            color: rgb(155, 233, 155);
        }

        /* For the body content section */
        .body-contents{
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            flex-direction: column;
        }

        .body-contents .head h3{
            color: rgb(87, 238, 87);
            margin-top: 5rem;
            margin-bottom: 5rem;
            font-size: 1.3rem;
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
            animation: grow 1.3s;
            transition:.2s ease-in-out;
        }

        .nav .links ul a li:hover{
            color: rgb(155, 233, 155);
        }

        /* For the body content section */
        .body-contents{
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            flex-direction: column;
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

        .edit{
            background-color: orange;
            color: #eee;
            padding:0.5rem 1rem;
            font-weight: 700;
            border-radius: 0.3rem;
        }
        .decline{
            background-color: rgb(158, 41, 21);
            color: #eee;
            padding:0.5rem 1rem;
            font-weight: 700;
            border-radius: 0.3rem;
        }
        .accept{
            background-color: blue;
            color: #fff;
            padding:0.5rem 1rem;
            font-weight: 700;
            border-radius: 0.3rem;
        }

        .remove{
            background-color: rgb(158, 41, 21);
            color: #eee;
            padding:0.5rem 1rem;
            font-weight: 700;
            border-radius: 0.3rem;
        }

        p{
            margin-top:300px;
            font-size:1.2rem;
            color: green;
        }
    </style>
    </head>
    <body>
    <div class="nav">
    <div class="logo">
        <a href="admeetings.php?user='.$_GET['user'].'"><h2>HDT - Meeting History</h2></a>
    </div>
    <div class="links">
            <ul>
            <a href="admeetings.php?user='.$_GET['user'].'"><li>Meetings</li></a>
            <a href="adrequests.php?user='.$_GET['user'].'"><li>Requests</li></a>
            <a href="adnotes.php?user='.$_GET['user'].'"><li>Notes</li></a>
            <a href="adlectures.php?user='.$_GET['user'].'"><li>Lectures</li></a>
            <a href="adconceptuals.php?user='.$_GET['user'].'"><li>Conceptuals</li></a>
            <a href="logout.php?user='.$_GET['user'].'" class="admin"><li class="admin">Log Out</li></a>
            </ul>
    </div>
</div>

<!---- Body Section   -->
<div class="body-contents">
    <div class="head">
        <h3>Attended Meetings</h3>
    </div>

    <div class="table">
        <table>
            <tr>
                <th>Meeting No.</th>
                <th>Meeting Title</th>
                <th>Host</th>
                <th>Short Description</th>
                <th>Date</th>
                <th>Time</th>
                <th>Meeting ID</th>
                <th>Subject</th>
                <th>Actions</th>
            </tr>
        </table>
    </div>
    ';
}


    if(mysqli_num_rows($result2) > 0 ){
            echo ' 
            <div class="head">
                <h3>Pending</h3>
            </div>
 
         <div class="table">
           <table>
             <tr>
                 <th>Meeting No.</th>
                 <th>Meeting Title</th>
                 <th>Host</th>
                 <th>Short Description</th>
                 <th>Date</th>
                 <th>Time</th>
                 <th>Meeting ID</th>
                 <th>Subject</th>
                 <th>Link</th>
                 <th>Actions</th>
             </tr>';

             while($row2 = mysqli_fetch_array($result2)){
             echo '<tr>
                 <td>'.$row2['id'].'</td>
                 <td>'.$row2['title'].'</td>
                 <td>'.$row2['host'].'</td>
                 <td>'.$row2['descriptions'].'</td>
                 <td>'.$row2['dates'].'</td>
                 <td>'.$row2['duration'].'</td>
                 <td>'.$row2['meetID'].'</td>
                 <td>'.$row2['subjects'].'</td>
                 <td><a href="'.$row2['link'].'" target="_blank" class="accept">Host Now</a></td>
                 <td>
                     <a href="attended.php?id='.$row2['id'].'&title='.$row2['title'].'&user='.$_GET['user'].'" class="edit">Over</a>
                 </td>
             </tr>
        ';
        }
        echo '</table>
        </div>
    </div>';
              
    } 
            ?>

        <?php
            if(isset($_POST['attended'])){
                $id = $_POST['id'];
                $query3 = 'UPDATE meetinghistory SET attended = ? WHERE id = '.$id.';';
                $stmt = mysqli_prepare($connection,$query3);
                $stmt->bind_param("s",$_POST['attended']);
                $stmt->execute();

                echo "<script type='text/javascript'> 
                    window.location.href = 'admeetinghistory.php?status=Meeting over and attended&user=".$_GET["user"]."'; 
                </script>";
            }
        ?>
</body>
</html>