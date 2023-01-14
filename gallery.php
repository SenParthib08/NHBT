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
    <title>Portfolio Grid</title>
    <!-- <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" /> -->
    <link rel="stylesheet" href="css/bootstrap.css" />
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
                        <h1 class="page-title">Portfolio Grid</h1>
                    </div>
                </div>
            </div>

            <section class="p-t110 p-b90">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 m-b20">
                            <div class="ot-heading text-center">
                                <h6><span>our projects</span></h6>
                                <h2 class="main-heading">View Some of Our Works <br>and Case Studies for Clients</h2>
                            </div>
                        </div>
                    </div>
                    <div class="project-filter-wrapper">
                        <div class="container">
                            <ul class="project_filters">
                                <li><a href="#" data-filter="*" class="selected">All</a></li>
                                <?php
                                $res=mysqli_query($con,"SELECT DISTINCT date FROM nhbt_db.media;");
                                while($rows=mysqli_fetch_assoc($res)){
                                $string="";
                                $arr=str_split($rows['date']);
                                foreach($arr as $key=>$val){
                                    $string=$string.chr(65+$val);
                                }
                                    ?><li><a href="#" data-filter=".<?php echo $string; ?>"><?php echo $rows['date']; ?></a></li><?php
                                }
                                ?>                   
                            </ul>
                        </div>
                        <div class="projects-grid">

                            <?php
                            $res=mysqli_query($con,"SELECT `image_path`, `date`FROM `media`");
                            while($rows=mysqli_fetch_assoc($res)){
                                $string="";
                                $arr=str_split($rows['date']);
                                foreach($arr as $key=>$val){
                                    $string=$string.chr(65+$val);
                                }
                            ?>
                            <div class="project-item <?php echo $string; ?> ">
                                <div class="projects-box">
                                    <div class="projects-thumbnail">
                                            <img src="<?php echo $rows['image_path']; ?>" class="" alt="image not found">
                                    </div>
                                    <div class="portfolio-info s1">
                                        <div class="portfolio-info-inner">
                                            <h5><?php echo $rows['date']; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div><!-- #page -->
    <a id="back-to-top" href="#" class="show"><i class="flaticon-arrow-pointing-to-up"></i></a>
        <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
<?php
include('footer.php');
?>