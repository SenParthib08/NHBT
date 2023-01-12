<?php
session_start();
include('../config/config.php');
if(isset($_POST['amt']) && isset($_POST['name']) && isset($_POST['email'])){
    $email=$_POST['email'];
    $amt=$_POST['amt'];
    $name=$_POST['name'];
    $payment_status="pending";
    mysqli_query($con,"INSERT INTO `payment`( `name`, `email`, `amount`, `payment_status`) VALUES ('$name','$email',$amt,'$payment_status')");
    $_SESSION['ordertableID']=mysqli_insert_id($con);
}
if(isset($_POST['payment_id']) && isset($_SESSION['ordertableID'])){
    $payment_id=$_POST['payment_id'];
    $payment_status="complete";
    $orderID=$_POST["orderID"];
    mysqli_query($con,"UPDATE `payment` SET `payment_status`='complete',`payment_id`='$payment_id',`order_id`='$orderID' WHERE id='".$_SESSION['ordertableID']."'");
    $_SESSION['IsPaymentComplet']=true;
}
?> 