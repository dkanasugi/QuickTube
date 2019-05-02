<?php
    include '../connect';
    
    $conn = getDatabaseConnection("QuickTube");

    $uName = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "INSERT INTO  `QuickTube`.`user` (
                `username` ,
                `password`
            )
            VALUES (
                $uName,  $password
            );"
?>