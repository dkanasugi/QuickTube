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
                    <h1 text-align="center">Account Settings</h1>
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
        
        <div id = "user"></div>
        <h1>History</h1>
        <div id="history"></div>
        <h1>Playlist</h1>
        <div id="playlist"></div>
        <h2>Edit Password</h2>
        <div class = "changePass">
            <input type="text" id="newPass" holder="enter new password"></div>
            <button type="button" class="btn btn-primary" id="passButton">Change</button>
        </div>
    </body>
    <script>
    
        //Need an AJAX call to retrieve data from php to the database
        var userName = document.getElementById("user");
        var titleName = document.getElementById("title");
        
         $(document).on('click','#passButton',function(){
             console.log("button clicked");
            $.ajax({
                type:"POST",
                url:"api/editPassword.php",
                dataType:"json",
                data:{
                    'password': $("#newPass").val(),
                },
                success:function(data){
                    console.log("Success"); 
                },
                error:function(data){
                    console.log("Error");
                    console.log(data);
                }
               });
           });
        
        document.getElementById("mainButton").onclick = function(){
            location.href = "home.php";
        }
        
        $("#logoutButton").on('click',function(){
           window.location = "logout.php"; 
        });
        
        $(document).ready(function(){
            $.ajax({
                type:"GET",
                url:"api/accountSetting.php",
                dataType:"json",
                success:function(data,status){
                    data.forEach(function(key){
                        userName.innerHTML = "Welcome back, " + key['username'];
                        titleName.innerHTML = (key['username']).toUpperCase() + "'s ACCOUNT"; 
                   });
               }
           });
           
           $.ajax({
               type:"GET",
               url:"api/getSearch.php",
               dataType:"json",
               success:function(data,status){
                   $("#history").append("Previous Searches: " + " ");
                   data.forEach(function(key){
                       $("#history").append(key['search'] + " | ");
                   });
               }
           })
           $.ajax({
               type:"GET",
               url:"api/getPlaylists.php",
               dataType:"json",
               success:function(data,status){
                   data.forEach(function(key){
                       //$("#playlist").append(key['url'] );
                       $("#playlist").append(`<div class="col s3"><iframe height="auto" src="${key['url']}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                       </iframe><button input type="submit" class="deleteBttn" id="${key['url']}">Delete</button></div><br>`);
                   });
               }
           })
           
        });
        
        $(document).on('click',".deleteBttn",function(){
            console.log($(this).attr("id"))
           $.ajax({
              type:"POST",
              url:"api/deleteVideo.php",
              dataType: "json",
              data:{'url': $(this).attr("id")}
           });
           location.href = "account.php";
        });
        
    </script>
</html>