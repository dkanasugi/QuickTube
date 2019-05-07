<?php
    session_start();
    
    if(!isset($_SESSION['userId'])){
        header("Location:login.html");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title id="title"> </title>
        <link rel="shortcut icon" href="quicktubeLogo.ico">
        <link href="styles.css" rel="stylesheet" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    </head>
    <body>
                <div class="heading" >
            <div class = "left">
                <div id="logo">
                    <img src="quicktubeLogo.png" width="50" height="50" alt="qt"></img>
                </div>
            </div>
            <div class = "center">
                <div id = "text">
                    <h1 text-align="center">Playlist</h1>
                </div>
            </div>
            <div class ="right">
                <div id="main">
                    <button type="button" class="btn btn-primary" id="mainButton">Home</button>
                </div>
                &nbsp
                <div id="logout">
                    <button type="button" class="btn btn-primary" id="logoutButton">Logout</button>
                </div>
            </div>
        </div>
        
        <p>Welcome</p>
        <div id = "user"> </div>
    </body>
    <script>
    
        //Need an AJAX call to retrieve data from php to the database
        var userName = document.getElementById("user");
        var titleName = document.getElementById("title");
    
        userName.innerHTML = "Daichi";
        titleName.innerHTML = "Daichi's Account";
        
        document.getElementById("mainButton").onclick = function(){
            location.href = "home.php";
        }
        
        $("#logoutButton").on('click',function(){
           window.location = "logout.php"; 
        });
        
    </script>
</html>