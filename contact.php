<?php
include('config/config.php');
include('track.php');
$error_message="";
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mgs=$_POST['message'];
    $name_res=mysqli_query($con,"SELECT `name` FROM `contact_us` WHERE `name` LIKE '$name'");
    $email_res=mysqli_query($con,"SELECT `email` FROM `contact_us` WHERE `email` LIKE '$email'");
    if(mysqli_fetch_assoc($name_res)['name'] != $name && mysqli_fetch_assoc($email_res)['email'] != $email){
        $query= "INSERT INTO `contact_us`(`name`, `email`, `message`) VALUES ('$name','$email','$mgs')";
        mysqli_query($con,$query);
    }else{
        $error_message="your name or email is already exsist";
    } ?>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script>
        var mgstext="Hi <?php echo "$name"; ?>. We receverd your message";
        var email_id="<?php echo "$email";?>";
        var email_subject="Succesfully Receved";
        jQuery.ajax({
            type:'post',
            url:'send_email.php',
            data: "mgstext="+mgstext+"&email_id="+email_id+"&email_subject="+email_subject,
            success:function(result){
                window.location.href="contact.php";
            }
        }); 
    </script><?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Contact Us</title>
    <!-- <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" /> -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body class="royal_preloader">
    <div id="page" class="site">
        

        <div id="content" class="site-content">
            <div class="page-header dtable text-center" style="background-image: url(images/bg-page-header.jpg);">
                <div class="dcell">
                    <div class="container">
                        <h1 class="page-title">Contacts</h1>
                    </div>
                </div>
            </div>

            <section class="p-t110 z-index-1 section-contact">
                <div class="container">
                    <div class="row flex-row">
                        <div class="col-md-6 col-xs-12 sm-m-b60">
                            <div class="our-contact text-light">
                                <div class="ot-heading text-light">
                                    <h6><span>contact details</span></h6>
                                    <h2 class="main-heading">Our Contacts </h2>
                                </div>
                                <p class="m-b45">Give us a call or drop by anytime, we endeavour to answer all enquiries within 24 hours on business days. We will be happy to answer your questions.</p>
                                <div class="contact-info text-light m-b30">
                                    <i class="flaticon-world"></i>
                                    <div class="info-text">
                                        <h6>Our Address:</h6>
                                        <a href="https://goo.gl/maps/8zY3HHTCp55mpWnc9" target="_blank"><p>Dept. of Biotech., HIT, ICARE Complex, Haldia, W.B., India 721657</p></a>
                                    </div>
                                </div>
                                <div class="contact-info text-light m-b30">
                                    <i class="flaticon-note"></i>
                                    <div class="info-text">
                                        <h6>Our mailbox:</h6>
                                        <?php $email=mysqli_fetch_assoc(mysqli_query($con,"SELECT `data` FROM `contact_info` WHERE item='email'"))['data']; ?>
                                        <p><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
                                    </div>
                                </div>
                                <div class="contact-info text-light">
                                    <i class="flaticon-viber"></i>
                                    <div class="info-text">
                                        <h6>Our phones:</h6>
                                        <?php $phone=mysqli_fetch_assoc(mysqli_query($con,"SELECT `data` FROM `contact_info` WHERE item='phone'"))['data'];
                                        $phone_ouner=mysqli_fetch_assoc(mysqli_query($con,"SELECT `data` FROM `contact_info` WHERE item='phone_owner'"))['data']; ?>
                                        <p><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?> (<?php echo $phone_ouner; ?>)</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 align-self-center">
                            <div class="form-contact">
                                <div class="ot-heading">
                                        <h6><span>GET IN TOUCH</span></h6>
                                    <h2 class="main-heading">Ready to Get Started?</h2>
                                </div>
                                <form action="" class="wpcf7-form" method="post">
                                    <p><p style="color:red;"><?php echo $error_message ?></p>
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="text" name="name" id="name" class="wpcf7-form-control wpcf7-text" placeholder="Your Name *" required="">
                                        </span>
                                    </p>
                                    <p>
                                        <span class="wpcf7-form-control-wrap your-email">
                                            <input type="email" name="email" id="email" class="wpcf7-form-control wpcf7-text wpcf7-email" placeholder="Your Email *" required="">
                                        </span>
                                    </p>
                                    <p>
                                        <span class="wpcf7-form-control-wrap your-message">
                                            <textarea type="text" name="message" id="message" class="wpcf7-form-control wpcf7-textarea" placeholder="Message..." required=""></textarea>
                                        </span>
                                    </p>
                                    <p>
                                        <button type="submit" name="submit" id="submit" class="octf-btn octf-btn-primary octf-btn-icon"  >Send Message <i class="flaticon-right-arrow-1"></i></button>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><br>
            </section>
</div>
</body>
</html>