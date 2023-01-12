<?php
include('db.php');
$key=mysqli_fetch_assoc(mysqli_query($con,"SELECT `data` FROM `site_config` WHERE item='razorpay_Key'"))['data'];
$token=mysqli_fetch_assoc(mysqli_query($con,"SELECT `data` FROM `site_config` WHERE item='razorpay_Token'"))['data'];
$email_username=mysqli_fetch_assoc(mysqli_query($con,"SELECT `data` FROM `site_config` WHERE item='email_id'"))['data'];
$email_pass=mysqli_fetch_assoc(mysqli_query($con,"SELECT `data` FROM `site_config` WHERE item='email_pass'"))['data'];
$upi=mysqli_fetch_assoc(mysqli_query($con,"SELECT `data` FROM `site_config` WHERE item='upi'"))['data'];

$status_amount=mysqli_fetch_assoc(mysqli_query($con,"SELECT `status` FROM `site_config` WHERE item='amount'"))['status'];
if($status_amount=="inactive"){
    $amount=10;
}else{
    $amount=mysqli_fetch_assoc(mysqli_query($con,"SELECT `data` FROM `site_config` WHERE item='amount'"))['data'];

}
?>
<!-- $key="rzp_test_tLxZyLd1YGQMUO";                     // this is the razorpay Key ID
$token="sqfyxLMzQsV3vesT9zicPjJ3";                  //this is the razorpay Token ID
$key="rzp_live_sSUDbGtVbiP4Mo";                     // this is the live razorpay Key ID
$token="z5cs7Ub9lA7FQzylxRFOj5VU";                  //this is the live razorpay Token ID
$amount=750;                                        //this is the amount which will be set in payment gateway
$email_username="nationalseminarhit@gmail.com";     //this email id use for SMTP service
$email_pass="zqlawsrabdkrdzjj";                     //this is the password of email id
$upi="inactive";                                    //this is upi id for upi payment -->