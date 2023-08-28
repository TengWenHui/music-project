<?php
 session_start();
  $xid = $_SESSION['login_xid'];
  require_once("../db/dbinfo.php");
  // Create connection
  $mysqli = new mysqli($hostname,$dbUser,$dbPassword,$db); 
  // Check connection
  if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  }

  if (isset($_GET['id']) && $_GET['id'] != "") {
    $song_id = $_GET['id'];

    $sql = "INSERT INTO `create_playlist`(`song_id`, `user_id`) 
    VALUES ($song_id,$xid)";

    if ($mysqli->query($sql) === TRUE) {
      header("Location: createplaylist.php");
    } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
  } else if (isset($_GET['delete']) && $_GET['delete'] != ""){
    $create_id = $_GET['delete'];

    $sql = "DELETE FROM `create_playlist` WHERE playlist_xid = $create_id";

    if ($mysqli->query($sql) === TRUE) {
      header("Location: createplaylist.php");
    } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
  }
?>

