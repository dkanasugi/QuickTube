<?php
    include '../connect';
    
    $conn = getDatabaseConnection("QuickTube");
<<<<<<< HEAD
=======

>>>>>>> 18d3ccc8250bc9391e45418006d802cb8712e60a
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