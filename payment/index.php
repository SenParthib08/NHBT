<?php
session_start();
include('../config/config.php');
$status_razorpay_key=mysqli_fetch_assoc(mysqli_query($con,"SELECT `status` FROM `site_config` WHERE item='razorpay_Key'"))['status'];
$status_razorpay_Token=mysqli_fetch_assoc(mysqli_query($con,"SELECT `status` FROM `site_config` WHERE item='razorpay_Token'"))['status'];
$status_amount=mysqli_fetch_assoc(mysqli_query($con,"SELECT `status` FROM `site_config` WHERE item='amount'"))['status'];
if($status_razorpay_key=="active" and $status_razorpay_Token=="active" and $status_amount=="active"){
    $_SESSION['IsPaymentInfoAvil']=true;
    header('location:razorpay.php');
    die();
}else{
    header('location:../404.html');
    die();
}
?>