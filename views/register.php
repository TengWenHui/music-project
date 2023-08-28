<?php
    if (isset($_POST["username"]) || isset($_POST["password"]))
    {
    
        require_once("../db/dbinfo.php");
    // Create connection
    $mysqli = new mysqli($hostname,$dbUser,$dbPassword,$db); 
    // Check connection
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }

    $name = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sqlstatement = "SELECT * FROM `login` where login_email='$email' or login_username='$name'";  //Lab26 Exercise A2

    if ($result = $mysqli->query($sqlstatement)) {
        if ($result -> num_rows == 0) {
            $sqlstatement = "INSERT INTO login (`login_username`, `login_email`, `login_password`) VALUES ('$name', '$email', '$password')";
            if (mysqli_query($mysqli, $sqlstatement)){
                header("Location: login.php");
            }
        }

        else {
            echo'<script>alert("Email / Username is taken alr. Please try another one")</script>';
        }
    }

    $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <style>
    .container {
        display: flex;
        align-content: center;
        justify-content: center;
        padding: 100px;
    }

    .wrapper {
        background-color: #caeae5;
        border: 2px solid white;
        width: 400px;
        padding-left: 50px;
    }

    .form-group {
        margin-top: 10px;
    }

    .form-control {
        width: 90%;
        height: 30px;
    }

    input {
        height: 30px;
        border-radius: 5px;
    }

    @media (max-width:768px) {

        .container {
            align-content: center;
            justify-content: center;
            padding: 50px;
        }

        .wrapper {
            background-color: #caeae5;
            border: 2px solid white;
            width: 400px;
        }

        .form-group {
            margin-top: 10px;
        }

        .form-control {
            width: 90%;
            height: 30px;
        }

        input {
            height: 30px;
            border-radius: 5px;
        }


    }
    </style>
</head>
<?php include 'header.php';?>

<body>
    <div class="container">
        <div class="wrapper">
            <h2 style="text-align:center; color:black">Sign Up</h2>
            <p>Please fill this form to create an account.</p>
            <form id="registerform" action="register.php" method="post">
                <div class="form-group">
                    <label for="usename">Username</label>
                    <input type="text" name="username" id="username" class="form-control">

                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" id="email" class="form-control">

                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" id="password" name="password" class="form-control">

                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control">

                </div>
                <div class="form-group">
                    <input type="button" id="validateSubmit" class="btn btn-primary" style="background-color:#FF6961"
                        value="Sign Up">
                    <input type="reset" class="btn btn-secondary ml-2" style="background-color:#A7C7E7" value="Reset">
                </div>
                <p>Already have an account? <a href="login.php">Login here</a>.</p>
            </form>
        </div>
    </div>
    <?php include 'footer.php';?>

    <script src="../js/jquery.js"></script>
    <script src="../js/index.js"></script>

</body>



</html>