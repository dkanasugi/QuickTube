<?php

function getDatabaseConnection(){
    $connUrl = getenv('JAWSDB_MARIA_SILVER_URL');
    $hasConnUrl = !empty($connUrl);
    $connParts = null;
    if ($hasConnUrl) {
        $connParts = parse_url($connUrl);
    }
    
    // $host = $hasConnUrl ? $connParts['host']: getenv('IP');
    // $dbname = $hasConnUrl ? ltrim($connParts['path'],'/') : 'QuickTube';
    // $username = $hasConnUrl ? $connParts['user'] : getenv('C9_USER');
    // $password = $hasConnUrl ? $connParts['pass'] : '';
    
    // $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    $host = "localhost";
    $dbname = "qs4tci11k6kefzpz";
    $username = "dkanasugi";
    $password = "";
    
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
 
}
?>