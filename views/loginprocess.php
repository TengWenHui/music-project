<?php
    if (!isset($_POST["username"]) || !isset($_POST["password"]))
    {
        echo "This page is not meant to be loaded directly";
        exit(0);
    }

    require_once("../db/dbinfo.php");
    session_start();

    $sqlstatement = "SELECT * FROM login WHERE login_username ='" . $_POST["username"] . "' AND login_password = '" . $_POST["password"] . "'";
   
        
    if ($result = $mysqli -> query($sqlstatement)) 
    {
        $record = $result -> fetch_row();
        $result->free_result();

        $_SESSION["login_username"] = $record[1];
        $_SESSION["login_password"] = $_POST["password"];
        $login_xid = $record[0];
        $_SESSION["login_xid"] = $login_xid;
        $_SESSION["login_email"] = $record[2];


        $mysqli->close();

        header("Location: favourites.php");
    }
?>