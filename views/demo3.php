<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .button_plus {
        position: absolute;
        width: 35px;
        height: 35px;
        background: #fff;
        cursor: pointer;
        border: 2px solid #095776;

        /* Mittig */
        top: 50%;
        left: 50%;
    }

    .button_plus:after {
        content: '';
        position: absolute;
        transform: translate(-50%, -50%);
        height: 4px;
        width: 50%;
        background: #095776;
        top: 50%;
        left: 50%;
    }

    .button_plus:before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #095776;
        height: 50%;
        width: 4px;
    }

    .button_plus:hover:before,
    .button_plus:hover:after {
        background: #fff;
        transition: 0.2s;
    }

    .button_plus:hover {
        background-color: #095776;
        transition: 0.2s;
    }


    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 60%;
        height: 60%;
        text-align: center;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }


    .button {
        border: none;
        color: white;
        padding: 13px 50px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 50px 20px;
        transition-duration: 0.4s;
        cursor: pointer;
        border-radius: 5%;

    }

    .button3 {
        background-color: white;
        color: black;
        border: 2px solid #60a100;
    }

    .button3:hover {
        background-color: #60a100;
        color: white;
    }
    </style>
</head>

<body>
    <div class="button_plus" id="myBtn"></div>
    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1 style="text-align:center">Add To Playlist</h1>
            <button class="button button3">Create Playlist</button>
        </div>

    </div>

    <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>

</body>

</html>