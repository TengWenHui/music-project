<?php
    session_start();
    if(!isset($_SESSION["login_username"]))
    {
        header("Location: login.php");
    }

    require_once("../db/dbinfo.php");

   

    $username = $_SESSION['login_username'];
     $email = $_POST['email'];
    // var_dump($_POST);


    $sqlstatement = "SELECT * FROM `login` where login_email='$email'";  //Lab26 Exercise A2

    if ($result = $mysqli->query($sqlstatement)) {
        if ($result -> num_rows == 0) {
            $sqlstatement = "UPDATE login SET login_email='$email' WHERE `login_username`= '$username'";
            if($mysqli -> query($sqlstatement)){
                echo"updated successfully";
            } else {
                echo "Error: " . $sqlstatement . "<br>" . $mysqli->error;
            }
        }

        else {
            echo'<script>alert("Email exist in database. Please try another one")</script>';
        }
    }




   
$mysqli->close();


?>