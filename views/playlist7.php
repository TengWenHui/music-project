<?php 
    require_once("../db/dbinfo.php");
    // Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["login_username"])){
    header("location: login.php");
    exit;
}
    $playlist_id = $_GET["id"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risa Orbie</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <style>
    table {
        width: 100%;
    }

    table td {
        padding: 10px;
        text-align: left;
        border: 1px solid #eee;
    }

    /*Button Css */
    *,
    *:before,
    *:after {
        position: relative;
        box-sizing: border-box;
    }

    :root {
        --color-bg: #FDF1F2;
        --color-heart: #EA442B;
        --easing: cubic-bezier(.7, 0, .3, 1);
        --duration: .5s;
    }

    html,
    body {
        height: 100%;
        width: 100%;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    .like-button {
        font-size: 35vmin;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border: none;
        border-radius: 50%;
        background: white;
        width: 0.1em;
        height: 0.1em;
        padding: 0;
        margin: 0;
        outline: none;
        z-index: 2;
        -webkit-transition: -webkit-transform var(--duration) var(--easing);
        transition: -webkit-transform var(--duration) var(--easing);
        transition: transform var(--duration) var(--easing);
        transition: transform var(--duration) var(--easing), -webkit-transform var(--duration) var(--easing);
        cursor: pointer;
    }

    .like-button:before {
        z-index: -1;
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        box-shadow: 0 0.3em 0.6em rgba(0, 0, 0, 0.3);
        border-radius: inherit;
        -webkit-transition: inherit;
        transition: inherit;
    }

    .like-button:after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #fff;
        border-radius: inherit;
        z-index: -1;
    }

    .like-button:active:before {
        -webkit-animation: depress-shadow var(--duration) var(--easing) both;
        animation: depress-shadow var(--duration) var(--easing) both;
    }

    .like-button:focus:after {
        -webkit-animation: depress var(--duration) var(--easing) both;
        animation: depress var(--duration) var(--easing) both;
    }

    @-webkit-keyframes depress {

        from,
        to {
            -webkit-transform: none;
            transform: none;
        }

        50% {
            -webkit-transform: translateY(5%) scale(0.9);
            transform: translateY(5%) scale(0.9);
        }
    }

    @keyframes depress {

        from,
        to {
            -webkit-transform: none;
            transform: none;
        }

        50% {
            -webkit-transform: translateY(5%) scale(0.9);
            transform: translateY(5%) scale(0.9);
        }
    }

    @-webkit-keyframes depress-shadow {

        from,
        to {
            -webkit-transform: none;
            transform: none;
        }

        50% {
            -webkit-transform: scale(0.5);
            transform: scale(0.5);
        }
    }

    @keyframes depress-shadow {

        from,
        to {
            -webkit-transform: none;
            transform: none;
        }

        50% {
            -webkit-transform: scale(0.5);
            transform: scale(0.5);
        }
    }

    .like-wrapper {
        display: grid;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
        z-index: 1;
    }

    .like-wrapper>* {
        margin: auto;
        grid-area: 1 / 1;
    }

    .heart {
        width: 0.1em;
        height: 0.1em;
        display: block;
        -webkit-transform-origin: center 80%;
        transform-origin: center 80%;
    }

    .heart>path {
        stroke: var(--color-heart);
        stroke-width: 2;
        fill: transparent;
        -webkit-transition: fill var(--duration) var(--easing);
        transition: fill var(--duration) var(--easing);
    }

    .like-button:focus .heart>path {
        fill: var(--color-heart);
    }

    .like-button:focus .heart {
        -webkit-animation: heart-bounce var(--duration) var(--easing);
        animation: heart-bounce var(--duration) var(--easing);
    }

    @-webkit-keyframes heart-bounce {
        40% {
            -webkit-transform: scale(0.7);
            transform: scale(0.7);
        }

        0%,
        80%,
        100% {
            -webkit-transform: scale(1);
            transform: scale(1);
        }
    }

    @keyframes heart-bounce {
        40% {
            -webkit-transform: scale(0.7);
            transform: scale(0.7);
        }

        0%,
        80%,
        100% {
            -webkit-transform: scale(1);
            transform: scale(1);
        }
    }

    /* Added wrapper to prevent layout jank with resizing particles */
    .particles {
        width: 1px;
        height: 1px;
    }

    .particle {
        position: absolute;
        top: 0;
        left: 0;
        height: .1em;
        width: .1em;
        border-radius: .05em;
        background-color: var(--color);
        --percentage: calc(var(--i) / var(--total-particles));
        --Θ: calc(var(--percentage) * 1turn);
        -webkit-transform: translate(-50%, -50%) rotate(var(--Θ)) translateY(0) scaleY(0);
        transform: translate(-50%, -50%) rotate(var(--Θ)) translateY(0) scaleY(0);
        -webkit-transition: all var(--duration) var(--easing);
        transition: all var(--duration) var(--easing);
    }

    .like-button:focus .particle {
        -webkit-animation: particles-out calc(var(--duration) * 1.2) var(--easing) forwards;
        animation: particles-out calc(var(--duration) * 1.2) var(--easing) forwards;
    }

    @-webkit-keyframes particles-out {
        50% {
            height: .3em;
        }

        50%,
        60% {
            height: .3em;
            -webkit-transform: translate(-50%, -50%) rotate(var(--Θ)) translateY(0.8em) scale(1);
            transform: translate(-50%, -50%) rotate(var(--Θ)) translateY(0.8em) scale(1);
        }

        60% {
            height: .2em;
        }

        100% {
            -webkit-transform: translate(-50%, -50%) rotate(var(--Θ)) translateY(1em) scale(0);
            transform: translate(-50%, -50%) rotate(var(--Θ)) translateY(1em) scale(0);
        }
    }

    @keyframes particles-out {
        50% {
            height: .3em;
        }

        50%,
        60% {
            height: .3em;
            -webkit-transform: translate(-50%, -50%) rotate(var(--Θ)) translateY(0.8em) scale(1);
            transform: translate(-50%, -50%) rotate(var(--Θ)) translateY(0.8em) scale(1);
        }

        60% {
            height: .2em;
        }

        100% {
            -webkit-transform: translate(-50%, -50%) rotate(var(--Θ)) translateY(1em) scale(0);
            transform: translate(-50%, -50%) rotate(var(--Θ)) translateY(1em) scale(0);
        }
    }

    .ripple {
        height: 0.11em;
        width: 0.1em;
        border-radius: 50%;
        overflow: hidden;
        z-index: 1;
    }

    .ripple:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 0.4em solid var(--color-heart);
        border-radius: inherit;
        -webkit-transform: scale(0);
        transform: scale(0);
    }

    .like-button:focus .ripple:before {
        -webkit-animation: ripple-out var(--duration) var(--easing);
        animation: ripple-out var(--duration) var(--easing);
    }

    @-webkit-keyframes ripple-out {
        from {
            -webkit-transform: scale(0);
            transform: scale(0);
        }

        to {
            -webkit-transform: scale(5);
            transform: scale(5);
        }
    }

    @keyframes ripple-out {
        from {
            -webkit-transform: scale(0);
            transform: scale(0);
        }

        to {
            -webkit-transform: scale(5);
            transform: scale(5);
        }
    }

    body {
        flex-direction: column;

        display: -webkit-box;
        display: flex;
        -webkit-box-pack: center;
        -webkit-box-align: center;
        align-items: center;
        background-color: var(--color-bg);
    }

    /* Reset the animation when clicking again! */
    .like-button:focus {
        pointer-events: none;
        cursor: normal;
    }

    /*Button Css */

    .clearfix {
        border: 3px solid black;
        padding: 10px;
    }


    .img2 {
        float: left;
    }

    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }

    .h1 {
        margin-top: 150px;
    }


    * {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        outline: none;
        border: none;
        text-transform: capitalize;
        text-decoration: none;
        transition: .2s linear;
    }

    .container2 .heading {
        text-align: center;
        padding: 10px;
        color: #333;
        font-size: 35px;
        border-bottom: 3px solid #333;
    }

    .container2 .box-container2 {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        padding: 20px 9%;
        background: #eee;
    }

    .container2 .box-container2.active {
        padding-bottom: 150px;
    }

    .container2 .box-container2 .box {
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        padding: 15px;
        cursor: pointer;
    }

    .container2 .box-container2 .box .image {
        height: 540px;
        width: 100%;
        overflow: hidden;
        border-radius: 10px;
        position: relative;
    }

    .container2 .box-container2 .box .image img {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }

    .container2 .box-container2 .box .image .play {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: rgba(0, 0, 0, .8);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10;
        display: none;
    }

    .container2 .box-container2 .box:hover .image .play {
        display: flex;
    }

    .container2 .box-container2 .box .image .play i {
        font-size: 100px;
        color: #fff;
    }

    .container2 .box-container2 .box .content2 {
        padding-top: 15px;
    }

    .container2 .box-container2 .box .content2 h3 {
        font-size: 20px;
        color: #333;
    }

    .music-player {
        position: fixed;
        bottom: -125px;
        left: 0;
        right: 0;
        background: #fff;
        z-index: 1000;
    }

    .music-player.active {
        bottom: 0;
    }

    .music-player .music-title {
        font-size: 25px;
        margin-bottom: 5px;
        border-top: 3px solid #333;
        border-bottom: 1px solid #333;
        text-align: center;
        color: #333;
        padding: 10px;
    }

    .music-player audio {
        width: 100%;
    }

    .music-player audio::-webkit-media-controls-enclosure {
        border-radius: 0;
        background: #fff;
    }

    .music-player #close-player {
        position: absolute;
        top: -50px;
        right: 5px;
        height: 50px;
        width: 55px;
        line-height: 50px;
        cursor: pointer;
        font-size: 30px;
        color: #333;
        background: #fff;
        border: 3px solid #333;
        border-bottom: none;
        text-align: center;
    }

    @media (max-width:768px) {
        .container2 .box-container2 {
            padding: 20px;
        }
    }

    @media (max-width:450px) {
        .container2 .box-container2 {
            grid-template-columns: 1fr;
        }

        .container2 .box-container2 .box .image {
            height: 300px;
        }
    }
    </style>
</head>

<body>
    <div class="clearfix" style="width:100%;">
        <?php
    $sqlstatement = "SELECT `playlist_title`, `playlist_image` FROM `playlist` WHERE playlist_xid = $playlist_id";
    if ($result = $mysqli -> query($sqlstatement)) {
        while($record = $result -> fetch_row()){
            $playlist_title = $record[0]; 
            $playlist_img = $record[1];
        }
    }
    ?>
        <img class="img2" src="../images/<?php echo $playlist_img ?>" alt="bp" width="170" height="170">
        <h1><?php echo $playlist_title ?></h1>
    </div>
    <table>
        <tbody>
            <tr>
                <td>#</td>
                <td>Title</td>
                <td>Album</td>
                <td>Rating</td>
                <td>Time</td>
                <td></td>
            </tr>
            <?php
            $count = 0;
            $sqlstatement = "SELECT song_image, song_title, song_rating, song_duration FROM playlist_items
                             INNER JOIN songs ON songs.song_xid = playlist_items.song_FK
                             INNER JOIN playlist ON playlist.playlist_xid = playlist_items.playlist_FK where playlist_FK = $playlist_id;";
            if ($result = $mysqli -> query($sqlstatement)) {
                while($record = $result -> fetch_row()){
                    $count += 1;
                    $image = $record[0];
                    $title = $record[1];
                    $rating = $record[2];
                    $duration = $record[3]; 
            ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><img src="../images/<?php echo $image; ?>"
                        style="width:40px;height:40px;">&nbsp;<?php echo $title; ?></td>
                <td>&nbsp;<?php echo $title; ?></td>
                <td>&nbsp;<?php echo $rating; ?></td>
                <td>&nbsp;<?php echo $duration; ?></td>
                <td> <a href="favourite.php">
                        <button class="like-button">
                            <div class="like-wrapper">
                                <div class="ripple"></div>
                                <svg class="heart" width="24" height="24" viewBox="0 0 24 24">
                                    <path
                                        d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z">
                                    </path>
                                </svg>
                                <div class="particles" style="--total-particles: 6">
                                    <div class="particle" style="--i: 1; --color: #7642F0"></div>
                                    <div class="particle" style="--i: 2; --color: #AFD27F"></div>
                                    <div class="particle" style="--i: 3; --color: #DE8F4F"></div>
                                    <div class="particle" style="--i: 4; --color: #D0516B"></div>
                                    <div class="particle" style="--i: 5; --color: #5686F2"></div>
                                    <div class="particle" style="--i: 6; --color: #D53EF3"></div>
                                </div>
                            </div>
                        </button>
                    </a></td>
            </tr>
            <?php
                } // while close
                 $result -> free_result();
            }  //if close
            ?>
        </tbody>
    </table>

    <div class="music-player">
        <div id="close-player">
            <img src="../images/up-arrow.png" width="100%;" id="player-button">
        </div>
        <h3 class="music-title">(play your song)</h3>

        <audio src="" controls></audio>
    </div>

    <script>
    let closePlayer = document.querySelector('#close-player');
    let musicPlayer = document.querySelector('.music-player');
    let boxcontainer2 = document.querySelector('.container2 .box-container2');

    closePlayer.onclick = () => {
        musicPlayer.classList.toggle('active');
        boxcontainer2.classList.toggle('active');
        if (musicPlayer.classList.contains('active')) {
            document.getElementById('player-button').src = "../images/close.png";
        } else {
            document.getElementById('player-button').src = "../images/up-arrow.png";
        }
    }

    let boxes = document.querySelectorAll('.container2 .box-container2 .box');

    boxes.forEach(box => {

        box.onclick = () => {
            let src = box.getAttribute('data-src');
            let text = box.querySelector('.content2 h3').innerText;
            musicPlayer.classList.add('active');
            boxcontainer2.classList.add('active');
            musicPlayer.querySelector('h3').innerText = text;
            musicPlayer.querySelector('audio').src = src;
            musicPlayer.querySelector('audio').play();
        }

    });
    </script>



</body>

</html>