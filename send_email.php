<?php
include('config/config.php');
include('smtp/PHPMailerAutoload.php');

if(isset($_POST['email_id'])){
	$receiver_email_id=$_POST['email_id'];
	$email_subject=$_POST['email_subject'];
	$mgstext=$_POST['mgstext'];
	$sender_email_id=$email_username;
	$sender_email_pass=$email_pass;
}
$status_email_id=mysqli_fetch_assoc(mysqli_query($con,"SELECT `status` FROM `site_config` WHERE item='email_id'"))['status'];
$status_email_pass=mysqli_fetch_assoc(mysqli_query($con,"SELECT `status` FROM `site_config` WHERE item='email_pass'"))['status'];
if($status_email_id=="active" and $status_email_pass=="active"){
	smtp_mailer($receiver_email_id,$email_subject,$mgstext,$sender_email_id,$sender_email_pass);
}
function smtp_mailer($receiver_email_id,$email_subject,$mgstext,$sender_email_id,$sender_email_pass){
	$mail = new PHPMailer(); 
	// $mail->SMTPDebug  = 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = $sender_email_id;
	$mail->Password = $sender_email_pass;
	$mail->SetFrom($sender_email_id);
	$mail->Subject = $email_subject;
	$mail->Body =$mgstext;
	$mail->AddAddress($receiver_email_id);
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
die();
?>