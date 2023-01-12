<?php
include('admin_session.php');
include('../config/config.php');
$id=$_GET['updateid'];
$item=$_GET['item'];
$data=$_GET['data'];

$rkey=$rtoken=$eid=$epass=$uid=$amot="";
if ($item=="razorpay_Key"){
    $rkey="show";
}if ($item=="razorpay_Token"){
    $rtoken="show";
}if ($item=="email_id"){
    $eid="show";
}if ($item=="email_pass"){
    $epass="show";
}if ($item=="upi"){
    $uid="show";
}if ($item=="amount"){
    $amot="show";
}

if(isset($_POST['submit'])){
    $text=$_POST['text'];
    $result=mysqli_query($con,"UPDATE `site_config` SET `data`='$text' WHERE id='$id'");
    if($result){
        header('Location:dashboard.php');
    }
}
$status=mysqli_fetch_assoc(mysqli_query($con,"SELECT `data` FROM `site_config` WHERE item='".$item."'"))['data'];
if($status==""){
    mysqli_query($con,"UPDATE `site_config` SET `status`='inactive' WHERE id='$id'");
}else{
    mysqli_query($con,"UPDATE `site_config` SET `status`='active' WHERE id='$id'");
}
?>

<style>
    #show{
        display: inline;
    }
    .razorpay_Key,
    .razorpay_Token,
    .email_id,
    .email_pass,
    .upi,
    .amount{
        display: none;
    }
</style>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">

        <div class="razorpay_Key" id="<?php echo $rkey; ?>">
            <br>
            <h5 style="font-weight:100;">1. Go to the <a href="https://dashboard.razorpay.com/?screen=sign_in" target="_blank">link</a> and create an account on RAZORPAY.</h5>
            <h5 style="font-weight:100;">2. Compleate KYC. </h5>
            <h5 style="font-weight:100;">3. After completing KYC you get the test mode option and you need to enable live mode to receive money.</h5>
            <h5 style="font-weight:100;">4. After compleating this go to settings and from there go to API keys to generate live key or you can use the <a href="https://dashboard.razorpay.com/app/keys" target="_blank">link</a>.</h5>
            <h5 style="font-weight:100;">5. From there you get API keys and token please save the key and token for future use.</h5>
            <h5 style="font-weight:100;">6. Put the API keys down below.</h5>
        </div>

        <div class="razorpay_Token" id="<?php echo $rtoken; ?>">
            <br>
            <h5 style="font-weight:100;">1. Go to the <a href="https://dashboard.razorpay.com/?screen=sign_in" target="_blank">link</a> and create an account on RAZORPAY.</h5>
            <h5 style="font-weight:100;">2. Compleate KYC. </h5>
            <h5 style="font-weight:100;">3. After completing KYC you get the test mode option and you need to enable live mode to receive money.</h5>
            <h5 style="font-weight:100;">4. After compleating this go to settings and from there go to API keys to generate live key or you can use the <a href="https://dashboard.razorpay.com/app/keys" target="_blank">link</a>.</h5>
            <h5 style="font-weight:100;">5. From there you get API keys and token please save the key and token for future use.</h5>
            <h5 style="font-weight:100;">6. Put the API token down below.</h5>
        </div>

        <div class="email_id" id="<?php echo $eid; ?>">
            <br>
            <h5 style="font-weight:100;">1. Before using the service email id you need to follow the steps.</h5>
            <h5 style="font-weight:100;">2. Go to this <a href="https://mail.google.com/mail/u/0/#settings/fwdandpop" target="_blank">link</a> and enable IMAP.</h5>
            <h5 style="font-weight:100;">2. Go to this <a href="https://accounts.google.com/DisplayUnlockCaptcha" target="_blank">link</a> and press continue.</h5>
            <h5 style="font-weight:100;">3. Add 2-step verification or go to <a href="https://myaccount.google.com/security?hl=en" target="_blank">link</a>.</h5>
            <h5 style="font-weight:100;">4. After completing 2-step verification go to this <a href="https://myaccount.google.com/apppasswords" target="_blank">link</a> and add a app.</h5>
            <h5 style="font-weight:100;">5. To add a app go to select app and go to other and type surver and hit generate google will generate a password.</h5>
            <h5 style="font-weight:100;">6. Note newly generated pass to use in future.</h5>
            <h5 style="font-weight:100;">7. Put the email ID down below.</h5>
        </div>

        <div class="email_pass" id="<?php echo $epass; ?>">
            <br>
            <h5 style="font-weight:100;">1. Put the new generated email password down below.</h5>
        </div>

        <div class="upi" id="<?php echo $uid; ?>">
            <br>
            <h5 style="font-weight:100;">1. Put the Unified Payments Interface (UPI) ID down below.</h5>
        </div>

        <div class="amount" id="<?php echo $amot; ?>">
            <br>
            <h5 style="font-weight:100;">1. Put the Price at which you want to set the registration fees down below.</h5>
        </div>

        
        <br><br>
        <form action="" method="post">
            <div class="form-group">
                <lebel><?php echo $item; ?></lebel>
                <input type="text" name="text" class="form-control" placeholder="input your <?php echo $item; ?>" value="<?php echo $data; ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
  </body>
</html>

