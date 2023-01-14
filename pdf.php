<?php
include('config/config.php');
include('track.php');
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>pdf</title>
    <!-- <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" /> -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/header.css"
</head>

<body class="royal_preloader">
    
<section class="container">
<div id="page" class="site">

<div id="content" class="site-content">

    <section class="hone7-service">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="ot-heading text-center m-b40">
                        <h6><span>our services</span></h6>
                        <h2 class="main-heading">Introduce Best <br> Services for Business</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php
            $res=mysqli_query($con,"SELECT `pdf_path`, `name`, `short_description` FROM `pdf`");
            while($rows=mysqli_fetch_assoc($res)){
            ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 m-t50">
                    <div class="icon-box s3 box-hover-gradient text-center">
                        <div class="bg-s3"></div>
                        <div class="bg-before" style="background: url('images/bg1-box2.png') top left no-repeat #fff;"></div>
                        <div class="bg-after"></div>
                        <div class="icon-main">
                            <span>PDF</span>
                        </div>
                        <div class="content-box">
                            <h5><?php echo $rows['name'] ?></h5>
                            <p><?php echo $rows['short_description'] ?></p>
                        </div>
                        <div class="action-box">
                            <a href="<?php echo $rows['pdf_path'] ?>" class="octf-btn octf-btn-icon octf-btn-white" target="_blank">View<i class="flaticon-right-arrow-1"></i></a>
                        </div>        
                    </div>
                </div>
                <?php } ?>


            </div>
        </div>
    </section>

    
</div><!-- #page -->
</section>
<script>
    const menuBtn = document.querySelector(".menu-btn");
    const navigation = document.querySelector(".navigation");
        
    menuBtn.addEventListener("click", () => {
        menuBtn.classList.toggle("active");
        navigation.classList.toggle("active");
    });
</script>
</body>
</html>
<?php
include('footer.php');
?>