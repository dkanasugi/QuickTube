<?php
    include '../connect';
    
    $conn = getDatabaseConnection("QuickTube");
    $namedParameters = array();
    
    $namedParameters[":username"] = $_POST['username'];
    $namedParameters[":password"] = $_POST['password'];
    
    $sql = "SELECT * FROM user".
            "WHERER username "
?>