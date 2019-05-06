<?php
    include '../connect.php';
    
    $conn = getDatabaseConnection("QuickTube");
    $uName = $_POST['username'];
    $password = $_POST['password'];
    $sql = "INSERT INTO  `user` (
                `username` ,
                `password`
            )
           VALUES ('$uName','$password')";
           
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
?>