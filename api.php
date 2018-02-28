<?php

 
//API Url
$url = 'https://v-coin.io/wallet/user/createNewUser';
 
//Initiate cURL.
$ch = curl_init($url);
 
//The JSON data.
$jsonData = array(
"name"=>"shubham",
"email"=> "pj21@gmail.com",
"password"=> "p@nk@j30SKH02",
"spendingpassword"=> "12345",
);
$jsonDataEncoded = json_encode($jsonData);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
$result = curl_exec($ch);
?>