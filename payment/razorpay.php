<?php
session_start();
require('order.php');
include('../config/config.php');
if(!isset($_SESSION['IsPaymentInfoAvil'])){
	header('location:../404.html');
	die();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Registration</title>
    <!-- <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" /> -->
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/flaticon.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/loading.css">
    <link rel="stylesheet" href="../css/header.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <div id="loading" style="visibility:hidden"></div>
    <link rel="stylesheet" href="../css/footer.css">
	<title>Payment</title>
</head>
<body class="royal_preloader">
    <header>
        <a href="../index.php" class="brand">NHBT</a>
        <div class="menu-btn"></div>
        <div class="navigation">
            <div class="navigation-items">
            <a href="../index.php">Home</a>
            <a href="../about_us.php">About</a>
            <a href="../pdf.php">Proceedings</a>
            <a href="../guest.php">Guests</a>
            <a href="../gallery.php">Gallery</a>
            <a href="../contact.php">Contact</a>
            </div>
        </div>
    </header>
    <script>
        const menuBtn = document.querySelector(".menu-btn");
        const navigation = document.querySelector(".navigation");
            
        menuBtn.addEventListener("click", () => {
            menuBtn.classList.toggle("active");
            navigation.classList.toggle("active");
        });
    </script>
    <div id="page" class="site">
        <div id="content" class="site-content">
            <div class="page-header dtable text-center" style="background-image: url(../images/bg-page-header.jpg);">
                <div class="dcell">
                    <div class="container">
                        <h1 class="page-title">NHBT Registration Page</h1>
                    </div>
                </div>
            </div>
            <section class="z-index-1"> 
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                                <br>
                                <div class="owl-carousel home-client-carousel">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12 text-center">
                            <div class="search-engine-form">
                                <div class="bg-overlay"></div>
                                <div class="bg-overlay-img2"></div>
                                <div class="title">
                                    <h2>Register Here</h2>
                                </div>
                                <div role="form" class="wpcf7">
                            <!-- <form action="seoform.php" method="POST" class="wpcf7-form"> -->
                            <div class="seo-score one-line-form">
                                            <span class="wpcf7-form-control-wrap your-url">
                                                <input type="text" name="name" id="name" placeholder="Enter Your Name" class="wpcf7-form-control wpcf7-text wpcf7-url">
                                            </span>
                                            <span class="wpcf7-form-control-wrap your-email">
                                                <input type="email" name="email" id="email" placeholder="Enter Email" class="wpcf7-form-control wpcf7-text">
                                            </span>
                                            <button type="submit" name="btn" id="btn" class="octf-btn octf-btn-icon octf-btn-primary" onclick="paynow()" >Pay Now<i class="flaticon-right-arrow-1"></i></button>
                                        </div>
                                        <br><br><br>
                                    <!-- </form> -->
                                    </div>
                            </div>
                    </div>
                </div>
            </section>
    </div>
    <script>
        function paynow(){
            document.getElementById("loading").style.isibility="visible";
            var orderID = document.getElementById('order').innerHTML;
            var name=jQuery('#name').val();
            var email=jQuery('#email').val();
            var amt=<?php echo "$amount"; ?>;
            jQuery.ajax({
                type:'post',
                url:'payment_process.php',
                data: "amt="+amt+"&name="+name+"&email="+email,
                success:function(result){
                    var options = {
                        "key": "<?php echo "$key"; ?>",
                        "amount": amt*100,
                        "currency": "INR",
                        "name": "Acme Corp",
                        "description": "Test Transaction",
                        "image": "https://example.com/your_logo",
                        "order_id": orderID,
                        "handler": function (response){
                            jQuery.ajax({
                                type:'post',
                                url:'payment_process.php',
                                data: "payment_id="+response.razorpay_payment_id+"&orderID="+orderID,
                                success:function(result){
                                    window.location.href="thankyou.php";
                                }
                            });
                        },
                        "prefill": {
                            "name": name,
                            "email": email,
                            // "contact": "9999999999"
                        },
                        "notes": {
                            "address": "Razorpay Corporate Office"
                        },
                        "theme": {
                            "color": "#3399cc"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                }
            });
        }
    </script>
</body>
</html>