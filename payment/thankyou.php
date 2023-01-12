<?php
session_start();
include('../smtp/PHPMailerAutoload.php');
include('../config/config.php');
if(!isset($_SESSION['IsPaymentComplet'])){
	header('location:index.php');
	die();
}
if(isset($_SESSION['ordertableID'])){
    $res=mysqli_query($con,"SELECT `payment_status`, `payment_id`, `order_id`, `amount`, `email`, `name` FROM `payment` WHERE id='".$_SESSION['ordertableID']."'");
    $row=mysqli_fetch_assoc($res);
}
$mgstext='Dear '.$row['name'].'. Your payment has been received. The transaction number is '.$row['payment_id'].'. The event details will be sent to you shortly.';
if($row['email']==""){
    $html= ".";
}else{
	$status_email_id=mysqli_fetch_assoc(mysqli_query($con,"SELECT `status` FROM `site_config` WHERE item='email_id'"))['status'];
	$status_email_pass=mysqli_fetch_assoc(mysqli_query($con,"SELECT `status` FROM `site_config` WHERE item='email_pass'"))['status'];
	if($status_email_id=="active" and $status_email_pass=="active"){
		smtp_mailer($row['email'],'Payment successful',$mgstext,$email_pass,$email_username);
		$html= "and we will respond shortly.";
	}
}

function smtp_mailer($to,$subject,$msg,$email_pass,$email_username){
	$mail = new PHPMailer(); 
	// $mail->SMTPDebug  = 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username =$email_username;
	$mail->Password =$email_pass;
	$mail->SetFrom($email_username);
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}
unset($_SESSION['IsPaymentComplet']);
?>
<style>
    #print-btn{
        cursor: pointer;
    }
</style>

<link rel="stylesheet" href="../css/thankyou.css">
<div align="center">
</div>
<div>
    <center>
        <img src="../images/thankyou.png" alt="image not found">
        <p> <?php echo $row['amount'] ?> payment is <span class="go"><?php echo $row['payment_status'] ?></p>
        <p> <b>PAYMENT ID=</b> <?php echo $row['payment_id'] ?></p>
        <p> <b>ORDER ID=</b> <?php echo $row['order_id'] ?></p>
        <p> <br> Your information has been <span class="go">received</span> <?php echo "$html"; ?></p>
        <button> <a href="  ">Home</a> </button>
        <button onclick="window.print();" id="print-btn"> Print page</button>
    </center>
</div> 