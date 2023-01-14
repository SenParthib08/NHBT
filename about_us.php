<?php
include('config/config.php');
include('track.php');
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/about_us.css">
    <link rel="stylesheet" href="css/header.css">
    <title>About Us</title>
</head>
<body>
    <section class="about" id="about">
        <div class="main">
            <div class="image">
                <img src="images/history.jpg" alt="">
            </div>
            <div class="all-text">
                <!-- <h4>About Us</h4> -->
                <h1>About Our Department</h1>
                <p style="text-align: justify;">The Department of Biotechnology was established in 2001 within then umbrella of Haldia Institute of Technology, with a vision to develop a “Centre of excellence” in Biotechnology for providing education and training facilities, to carry out application-oriented research, to develop in-house technologies, and to promote consultancy services in various areas of Biotechnology. <span id="dots">...</span><span id="more">Department of Biotechnology had been successfully conducting a seminar namely New Horizons in Biotechnology (NHBT) since the year 2013. It has been a symposium, hosting various distinguished speakers shedding light, on various attributes of the field of Biotechnology with our student community.</span></p>
                <div class="btn">
                    <button type="button" onclick="window.location.href='our_community.php';">Our Community</button>
                    <button onclick = "moreContent()" type="button" id="learnMore">Learn More</button>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        function changeHeight(){
            var element = document.getElementById("about");
            if (moreContent()){
                element.style.height = '100%';
            }
        }
    </script>
    <script type="text/javascript">
        function moreContent() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("learnMore");
            
            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Learn More";
                moreText.style.display = "none";
            }else{
                dots.style.display = "none";
                btnText.innerHTML = "Collapse";
                moreText.style.display = "inline";
                // changeHeight();
            }
        }
        </script>
</body>
</html>
<?php
include('footer.php');
?>