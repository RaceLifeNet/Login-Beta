<?php
session_start();
<meta http-equiv="refresh" content="30">

$url = "https://script.google.com/macros/s/AKfycbzeevSPBy_TH44mMzq7opfPM8nYoSIF0joKzzgmc62khjQKMDnpo3ghbfJi5HCs_i8s/exec";
$postData = [
   "action" => "login",
   "username" => $_POST['username'],
   "password" => $_POST['password']
];

$ch = curl_init($url);
curl_setopt_array($ch, [
   CURLOPT_FOLLOWLOCATION => true,
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_POSTFIELDS => $postData
]);

$result = curl_exec($ch);
$result = json_decode($result, 1);

if($result['status'] == "success"){
   $_SESSION['user'] = $result['data'];
   header("location: dashboard.php");
}else{
   $_SESSION['error'] = $result['message'];
   header("location: login.php");
}

