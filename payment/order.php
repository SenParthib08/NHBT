<?php
include('../config/config.php');
$name=$_GET['name'];
$email=$_GET['email'];
$amount=100*$amount;
$url= "https://api.razorpay.com/v1/orders";
$rec= "KTT".date('Y'.'m'.'d'.'H'.'i'.'s');
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, $key.":".$token);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('content-type: application/json'));
$data = <<< JSON
{
    "amount": "$amount",
    "currency": "INR",
    "receipt": "$rec",
    "notes":{
        "name": "$name",
        "email": "$email"
    }
}
JSON;
curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
$response = curl_exec($ch);
$decode = json_decode($response);
$orderID = $decode->id;
echo "<div id='order' style='display: none;'>".$orderID."</div>";
?>