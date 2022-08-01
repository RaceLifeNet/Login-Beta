<?php
session_start();

$url = "https://script.google.com/macros/s/AKfycbzeevSPBy_TH44mMzq7opfPM8nYoSIF0joKzzgmc62khjQKMDnpo3ghbfJi5HCs_i8s/exec";
$postData = [
   "action" => "signup",
   "beammpingamename" => $_POST['beammpingamename'],
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
   $_SESSION['success'] = "Signup successfully, please login";
   header("location: signup.php");
}else{
   $_SESSION['error'] = $result['message'];
   header("location: signup.php");
}

