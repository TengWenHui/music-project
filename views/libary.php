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
    <title>Albums/Playlist</title>
    <style>
    * {
        box-sizing: border-box;
    }

    .column {
        float: left;
        width: 33.33%;
        padding: 5px;
    }

    /* Clearfix (clear floats) */
    .row::after {
        content: "";
        clear: both;
        display: table;
    }

    .column1 {
        float: left;
        width: 33.33%;
        padding: 5px;
    }

    /* Clearfix (clear floats) */
    .row1::after {
        content: "";
        clear: both;
        display: table;
    }

    .search {
        text-align: right;
        width: 100%;
    }

    #rcorners1 {
        border-radius: 25px;
        padding: 10px;
    }

    .zoom {
        padding: 100px;
        transition: transform .2s;
        margin: 0 auto;
    }

    .zoom:hover {
        -ms-transform: scale(1.5);
        /* IE 9 */
        -webkit-transform: scale(1.5);
        /* Safari 3-8 */
        transform: scale(1.5);
    }
    </style>
</head>

<body>
    
    <?php 
    include 'header.php';
    ?>
    <div class="container">
        <form class="form-inline" method="get" action="search.php">
            <input type="text" name="query" class="form-control" placeholder="Search song">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
   
    <div class="container-2">

        <h1 style="color:black; text-align:center"> Album / Playlist</h1>

        <div class="row">
            <div class="column">
                <img src="../images/blackpink.jpg" alt="blackpink" style="width:100%" id="rcorners1" class="zoom">
                <a href="playlist2.php?id=1" style="color:black">
                    <h2 style="color:black; text-align:center">1.Blackpink</h2>
                </a>
            </div>
            <div class="column">
                <img src="../images/sorn.jpg" alt="sorn" style="width:100%" id="rcorners1" class="zoom">
                <a href="playlist2.php?id=2" style="color:black">
                    <h2 style="color:black; text-align:center">2.Sorn</h2>
                </a>
            </div>
            <div class="column">
                <img src="../images/got7.jpg" alt="got7" style="width:100%" id="rcorners1" class="zoom">
                <a href="playlist2.php?id=3" style="color:black">
                    <h2 style="color:black; text-align:center">3.GOT7</h2>
                </a>
            </div>
        </div>
    </div>

    <div class="container-3">


        <div class="row1">
            <div class="column1">
                <img src="../images/gem.jpg" alt="gem" style="width:100%" id="rcorners1" class="zoom">
                <a href="playlist2.php?id=4" style="color:black">
                    <h2 style="color:black; text-align:center">4.邓紫棋</h2>
                </a>
            </div>
            <div class="column1">
                <img src="../images/billieelish.jpg" alt="billie" style="width:100%" id="rcorners1" class="zoom">
                <a href="playlist2.php?id=5" style="color:black">
                    <h2 style="color:black; text-align:center">5.Billie Eilish</h2>
                </a>
            </div>
            <div class="column1">
                <img src="../images/risaoribe.jpg" alt="Risa" style="width:100%" id="rcorners1" class="zoom">
                <a href="playlist2.php?id=6" style="color:black">
                    <h2 style="color:black; text-align:center">6.Risa Oribe(LiSA)</h2>
                </a>
            </div>
        </div>
    </div>
    <?php include 'footer.php';?>
</body>

</html>