
<?php
 require_once("../db/dbinfo.php");
 session_start();
 
 if (!isset($_SESSION["login_username"])) 
 {
    header("Location: login.php?error=11208");
 }



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <title>Account</title>

    <style>
    input[type=text],
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #fdc7c5;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #caeae5;
    }

    div {
        border-radius: 5px;
        background-color: #f2f2f2;
    }

    .profile {
        width: 100%;
        text-align: center;
    }
    </style>
</head>
<?php include 'header.php';?>

<body>
    <div style="width: 80%; margin:0 auto;padding:25px;">
        <div class="profile">
            <img src="../images/profile.jpg" style="border-radius:50%;">
        </div>
        <form action="./updateaccount.php" method="POST">
            <?php echo 'username ' . $_SESSION['login_username']?>
            <label for="email">Email Address</label>
            <input type="text" id="email" name="email" placeholder=" <?php echo 'username ' . $_SESSION['login_username']?>">


            <input type="submit" name="update" id="update" value="Update Email">
        </form>
    </div>

    <?php include 'footer2.php';?>
</body>

</html>
