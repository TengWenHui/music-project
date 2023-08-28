<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <h2 style="text-align:center;color:black;">Login</h2>
            <p>Please fill in your credentials to login.</p>

            <form action="loginprocess.php" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" style="background-color:#C1E1C1" value="Login">
                </div>
                <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
            </form>
        </div>
    </div>
    <?php include 'footer.php';?>
</body>

</html>