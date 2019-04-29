
    <!--AIzaSyBZHX6SuAgh2zbwQ9Og3HFA3m3VaMf-Z2k-->
<?php
$apiKey = "AIzaSyBZHX6SuAgh2zbwQ9Og3HFA3m3VaMf-Z2k";

/*
curl    -X "GET" "https://api.spotify.com/v1/browse/featured-playlists" 
        -H "Accept: application/json" 
        -H "Content-Type: application/json" 
        -H "Authorization: Bearer $apiKey"
*/

/*

***mine***
curl -X "GET" "https://api.spotify.com/v1/browse/new-releases?country=SE&limit=10&offset=5" 
-H "Accept: application/json" 
-H "Content-Type: application/json" 
-H "Authorization: Bearer BQBare7weKIRYxSTUBPG1JIpC1Q32-OKIPMMjc8IovJXn365omMB5v7ttRQPAUMI5BGWfaIDuDueC4LDJwd3l5w15dv4psJCWkSiVonRjiPlvg_fvIXaC7KXmluvYY2V6bXNqRWcP0ZTVXrOVfDkZK_eDB1gfYV0EPFLdg"
*/

//step1
$cSession = curl_init();

//step2
curl_setopt($cSession,CURLOPT_URL,"https://api.spotify.com/v1/browse/new-releases?country=SE&limit=10&offset=5");
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false);
curl_setopt($cSession,CURLOPT_HTTPHEADER, array(
    "Accept: application/json",
    "Content-Type: application/json",
    "Authorization: Bearer $apiKey"
));

//step3
$results = curl_exec($cSession);
$errno = curl_errno($cSession);

if ($errno) {
    var_dump($errno);
    curl_close($cSession);
    exit();
}

//step4
curl_close($cSession);

//step5
$musicData = json_decode($results);
//var_dump($musicData->albums);
// var_dump($musicData->albums->href);

// var_dump($musicData);


// header("Content-Type: application/json");

// echo $results;


?>