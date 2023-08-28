<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="icon" type="image/x-icon" href="../images/logo2.png">
    <link rel="stylesheet" href="../css/header">
</head>

<header>
    <img id="logo" src="../images/logo2.png" alt=”Logo”>
    <nav>
        <label for="music">&#9776;</label>
        <input type="checkbox" id="music" />
        <ul id="menu">
            <li><a href="home.php">HOME</a></li>
            <li><a href="libary.php">LIBARY</a></li>
            <li><a href="favourites.php">FAVOURITES</a></li>
            <li><a href="createplaylist.php">PLAYLIST</a></li>
            <li><a href="account.php">ACCOUNT</a></li>
            <?php
            if(!isset($_SESSION['login_xid'])){
                echo '<li><a href="login.php">LOGIN</a></li>';
            } else {
                echo '<li><a href="logout.php">LOGOUT</a></li>';
            }
            ?>
        </ul>
    </nav>
    <hr>
</header>

<body>

</body>

</html>