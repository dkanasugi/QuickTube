<?php
    include '../connect.php';
    
    $conn = getDatabaseConnection("QuickTube");
    $url = $_POST['url'];
    $username = $_POST['username'];
    $sql = "INSERT INTO  `playlist` (
                `url` ,
                `username`
            )
           VALUES ('$url','$username')";
           
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
?>