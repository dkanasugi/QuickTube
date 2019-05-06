<?php

    include '../connect.php';
    
    $conn=getDatabaseConnection("user");
    $np = array();
    $np[':username'] = $_GET['username'];
    
    $sql="SELECT username FROM user WHERE username = :username";
    
    $stmt=$conn->prepare($sql);
    $stmt->execute($np);
    $records=$stmt->fetch(PDO::FETCH_ASSOC);
    
    echo json_encode($records);
?>