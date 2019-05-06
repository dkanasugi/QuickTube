<?php
    include '../connect.php';
    
    $conn = getDatabaseConnection("QuickTube");
    $url = $_POST['url'];
    $username = $_POST['username'];
    $sql = "INSERT INTO  `history` (
                `searches` , `username`, `id`,
                
            )
           VALUES ('$searches','$username', '$id')";
           
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
?>