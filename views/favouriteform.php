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

    $sql = "INSERT INTO `favourites_song`(`song_id`, `user_id`) 
    VALUES ($song_id,$xid)";

    if ($mysqli->query($sql) === TRUE) {
      header("Location: favourites.php");
    } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
  } else if (isset($_GET['delete']) && $_GET['delete'] != ""){
    $fav_id = $_GET['delete'];

    $sql = "DELETE FROM `favourites_song` WHERE favourite_xid = $fav_id";

    if ($mysqli->query($sql) === TRUE) {
      header("Location: favourites.php");
    } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
  }
?>

