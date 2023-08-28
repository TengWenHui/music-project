<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">

    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: linear-gradient(45deg, #fdc7c5, #fffde7);
    }

    .player {
        position: relative;
        width: 350px;
        background: #f1f3f4;
        box-shadow: 0 50px 80px rgba(0, 0, 0, 0.25)
    }

    .player .imgBx {
        position: relative;
        width: 100%;
        height: 350px;
    }

    .player .imgBx img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .player audio {
        width: 100%;
        outline: none;
    }
    </style>
</head>

<body>
    <div class="player">
        <div class="imgBx">
            <img src="..\images\blackpink.jpg">
        </div>
        <h4 style="padding:10px;">Kill This Love</h4>
        <p style="padding-left:10px;">Blackpink</p>
        <audio controls>
            <source src="audios\twice.mp3" type="audio/mp3">
        </audio>
    </div>

</body>

</html>