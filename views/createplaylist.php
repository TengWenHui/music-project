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
    <title>Document</title>
    <style>
    table {
        width: 100%;
    }

    table td {
        padding: 10px;
        text-align: left;
        border: 1px solid #eee;
    }

    #buttons {
        width: 80vw;
        margin: auto;
        text-align: center;
    }

    .button5 {
        background-color: white;
        color: black;
        border: 2px solid #014b70;
    }

    .button5:hover {
        background-color: #fdc7c5;
        color: white;
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

    @media(max-width: 500px) {

        table {
            width: 100%;
        }

        table td {
            padding: 0px;
            text-align: left;
            border: 1px solid #eee;
        }

        #buttons {
            width: 80vw;
            margin: auto;
            text-align: center;
        }

        .button5 {
            background-color: white;
            color: black;
            border: 2px solid #014b70;
        }

        .button5:hover {
            background-color: #fdc7c5;
            color: white;
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
            font-size: 20px;
            margin-bottom: 5px;
            border-top: 3px solid #333;
            border-bottom: 1px solid #333;
            text-align: center;
            color: #333;
            padding: 0px;
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


    }
    </style>

<body>

<?php include 'header.php'; ?>

    <table>
        <h2 style="color:black;"><?php echo htmlspecialchars($_SESSION["login_username"]); ?></b>,Untitled Playlist</h2>
        <form action="libary.php">
            <button class="button button5" input type="submit">Add New Songs</button>
        </form>
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
                 $user_id = $_SESSION["login_xid"];
            $count = 0;
            $sqlstatement = "SELECT song_image, song_title, song_rating, song_duration, song_url, song_xid, playlist_xid FROM create_playlist
                             INNER JOIN songs ON songs.song_xid = create_playlist.song_id where user_id = $user_id;";
            if ($result = $mysqli -> query($sqlstatement)) {
                while($record = $result -> fetch_row()){
                    $count += 1;
                    $image = $record[0];
                    $title = $record[1];
                    $rating = $record[2];
                    $duration = $record[3]; 
                    $songurl = $record[4];
                    $songid = $record[5];
                    $createid = $record[6];
            ?>
                <tr>
                    <td><?php echo $count; ?>
                        <img src="../images/play.png" id="play-btn" style="width:40px;height:40px;top: 15px;"
                            data-src="../audios/<?php echo $songurl; ?>" name="<?php echo $title; ?>"
                            onclick="play(this)">
                    </td>
                    <td><img src="../images/<?php echo $image; ?>"
                            style="width:40px;height:40px;">&nbsp;<?php echo $title; ?></td>
                    <td>&nbsp;<?php echo $title; ?></td>
                    <td>&nbsp;<?php echo $rating; ?></td>
                    <td>&nbsp;<?php echo $duration; ?></td>
                    <td> <a href="createform.php?delete=<?php echo $createid; ?>">
                            <button class="like-button">
                                <div class="like-wrapper">
                                    <div class="ripple"></div>
                                    <svg class="heart" width="24" height="24" viewBox="0 0 24 24">
                                        <path
                                            d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z">
                                        </path>
                                    </svg>
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

        closePlayer.onclick = () => {
            musicPlayer.classList.toggle('active');
            if (musicPlayer.classList.contains('active')) {
                document.getElementById('player-button').src = "../images/close.png";
            } else {
                document.getElementById('player-button').src = "../images/up-arrow.png";
            }
        }

        function play(element) {
            musicPlayer.classList.add('active');
            musicPlayer.querySelector('h3').innerText = element.name;
            musicPlayer.querySelector('audio').src = element.getAttribute('data-src');
            musicPlayer.querySelector('audio').play();
        }
        </script>
        <?php include 'footer.php';?>
</body>

</html>`