<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/home.css">
    <style>
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

        .left-col h1{ 
            font-size: 50px;
            line-height: 50px;
        }
        .right-col {
            float: right;
            margin-right: 6%;
            display: flex;
            align-items: center;
            margin-top: 30px;
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
<?php  session_start();include 'header.php';?>

<body>
    <div class="container">
        <div class="content">
            <div class="left-col">
                <h1>THE <br> REAL <br> SOUND</h1>
            </div>
            <div class="right-col">
                <p>Music Of The Day &#129351 (Twice)</p>
                <img src="../images/play.png" id="icon">

            </div>
        </div>
    </div>
    <audio id="mySong">
        <source src="../audios/twice.mp3" type="audio/mp3">
    </audio>

    <script>
    var mySong = document.getElementById("mySong");
    var icon = document.getElementById("icon");

    icon.onclick = function() {
        if (mySong.paused) {
            mySong.play();
            icon.src = "../images/pause.png";
        } else {
            mySong.pause();
            icon.src = "../images/play.png";
        }
    }
    </script>

    <div class="container2">

        <h1 class="heading"> Top 6 Music &#128081</h1>

        <div class="box-container2">

            <div class="box" data-src="../audios/Lisa.mp3">
                <div class="image">
                    <div class="play">
                        <i class="fas fa-play"></i>
                    </div>
                    <img src="../images/lisa.jpg" alt="">
                </div>
                <div class="content2">
                    <h3 style="text-align:center;">'LALISA'</h3>
                </div>
            </div>

            <div class="box" data-src="../audios/baiyueguang.mp3">
                <div class="image">
                    <div class="play">
                        <i class="fas fa-play"></i>
                    </div>
                    <img src="../images/baiyueguang.jpg" alt="">
                </div>
                <div class="content2">
                    <h3 style="text-align:center;">白月光与朱砂痣</h3>
                </div>
            </div>

            <div class="box" data-src="../audios/myambulance.mp3">
                <div class="image">
                    <div class="play">
                        <i class="fas fa-play"></i>
                    </div>
                    <img src="../images/myambulance.jpg" alt="">
                </div>
                <div class="content2">
                    <h3 style="text-align:center;">My Ambulance</h3>
                </div>
            </div>

            <div class="box" data-src="../audios/demonslayer.mp3">
                <div class="image">
                    <div class="play">
                        <i class="fas fa-play"></i>
                    </div>
                    <img src="../images/demonslayer.jpg" alt="">
                </div>
                <div class="content2">
                    <h3 style="text-align:center;">"Gurenge"</h3>
                </div>
            </div>

            <div class="box" data-src="../audios/exo.mp3">
                <div class="image">
                    <div class="play">
                        <i class="fas fa-play"></i>
                    </div>
                    <img src="../images/exo.jpg" alt="">
                </div>
                <div class="content2">
                    <h3 style="text-align:center;">'Tempo' </h3>
                </div>
            </div>

            <div class="box" data-src="../audios/itzy.mp3">
                <div class="image">
                    <div class="play">
                        <i class="fas fa-play"></i>
                    </div>
                    <img src="../images/itzy.jpg" alt="">
                </div>
                <div class="content2">
                    <h3 style="text-align:center;">DALLA-DALLA</h3>
                </div>
            </div>

        </div>

    </div>

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
<?php include 'footer.php';?>

</html>