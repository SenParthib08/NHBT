<?php
include('config/config.php');
include('track.php');
include('header.php');
?>
<style>
    .size{
        height:330px;
        width: 330px;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Our Team</title>
    <!-- <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" /> -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/font-awesome.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/header.css" />
</head>

<body class="royal_preloader">
    <div id="page" class="site">
        <div id="content" class="site-content">
            <div class="page-header dtable text-center" style="background-image: url(images/bg-page-header.jpg);">
                <div class="dcell">
                    <div class="container">
                        <h1 class="page-title">Professional Team</h1>
                    </div>
                </div>
            </div>

            <section class="p-tb110 bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 m-b35 text-center">
                            <div class="ot-heading">
                                <h6><span>professional people</span></h6>
                                <h2 class="main-heading">Our Leadership Team</h2>
                            </div>
                            <p class="m-b0">We have experience working with large and small businesses and are ready to<br>develop a targeted strategy and plan that’s just right for you.</p>
                        </div>
                    </div>


                    <div class="row">

                    <?php
                        $res=mysqli_query($con,"SELECT `image_path`, `name`, `short_description`, `guest_email`, `guest_linkedin` FROM `guest`");
                        while($rows=mysqli_fetch_assoc($res)){
                            $path=$rows['image_path'];
                            $name=$rows['name'];
                            $description=$rows['short_description'];
                            $email='mailto:'.$rows['guest_email'];
                            $linkedin=$rows['guest_linkedin'];
                            ?>

                        <div class="col-md-4 col-sm-6 col-xs-12 m-b55">
                            <div class="team-wrap">
                                <div class="team-thumb">
                                    <img class="size" src="<?php echo $path ?>" alt="" >
                                </div>
                                <div class="team-info">
                                    <h4><?php echo $name ?></h4>
                                    <span><?php echo $description ?></span>
                                    <div class="team-social">
                                        <a class="facebook" target="_blank" href="<?php echo $linkedin ?>"><i class="fab fa-linkedin"></i></a>
                                        <a class="pinterest" target="_blank" href="<?php echo $email ?>"><i class="fa fa-envelope"></i></a>
                                        <span class="flaticon-add-1"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php      
                        }
                    ?>

                    </div>
                </div>
            </section>
            
            
    </div><!-- #page -->
    <a id="back-to-top" href="#" class="show"><i class="flaticon-arrow-pointing-to-up"></i></a>
        <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/scripts.js"></script>
</html>
<?php
include('footer.php') 
?>