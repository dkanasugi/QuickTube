<?php
  include 'connect.php';
  session_start();

  // Get Data from DB
  $conn = getDatabaseConnection("QuickTube");
  $namedParameters = array();
  
  $namedParameters[":username"] = $_GET['username'];
  
  $sql = "SELECT * FROM user " .
         "WHERE username = :username ";
  
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch();

if($_GET["password"] = $record["password"]){
    $isAuthenticated = true;
}else {
    $isAuthenticated = false;
}

    
  if ($isAuthenticated) {
    $_SESSION["username"] = $record["username"];
    $_SESSION["isAdmin"] = $record["is_admin"];
  }
  
  // Allow any client to access
  header("Access-Control-Allow-Origin: *");
  // Let the client know the format of the data being returned
  header("Content-Type: application/json");

  // Sending back down as JSON
  echo json_encode(array("isAuthenticated" => $isAuthenticated));
?>