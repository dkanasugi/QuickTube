<?php
    session_start();
    
    //Auto
    if (!isset($_SESSION['userId'])) {
        http_response_code(401);
        exit();
    }
    
    include '../connect.php';
    $conn = getDatabaseConnection("QuickTube");
    
    $np = array();
    $np[':userId'] = $_SESSION['userId'];
    
    $sql = "SELECT username FROM user where userId = :userId";
    
    $stmt= $conn->prepare($sql);
    $stmt->execute($np);
    $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records);
?>