<?php
include('config/db.php');
include('header.php');
$facebook=mysqli_fetch_assoc(mysqli_query($con,"SELECT `data` FROM `contact_info` WHERE item='facebook_link'"))['data'];
$linkedin=mysqli_fetch_assoc(mysqli_query($con,"SELECT `data` FROM `contact_info` WHERE item='linkedin_link'"))['data'];
$youtube=mysqli_fetch_assoc(mysqli_query($con,"SELECT `data` FROM `contact_info` WHERE item='youtube_link'"))['data'];
$website=mysqli_fetch_assoc(mysqli_query($con,"SELECT `data` FROM `contact_info` WHERE item='website_link'"))['data'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>nhbt4</title> -->
    <link rel="stylesheet" href="css/home_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>

<header>
        <a href="#" class="brand">NHBT</a>
        <div class="menu-btn"></div>
        <div class="navigation">
        <div class="navigation-items">
            <a href="#">Home</a>
            <a href="#section2-about">About</a>
            <a href="pdf.php">Explore</a>
            <a href="#">Gallery</a>
            <a href="#footer">Contact</a>
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


  <body>
    <section class="home">
      <video class="video" src="video/bgVideo4.mp4" autoplay muted loop></video>
      <div class="content active">
        <h1>New Horizons<br>in Biotechnology</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure.</p>
        <a href="Explore.html">Explore</a>
      </div>
      <div class="media-icons">
        <a href="<?php echo $facebook; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a href="<?php echo $linkedin; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
        <a href="<?php echo $youtube; ?>" target="_blank"><i class="fab fa-youtube"></i></a>
        <a href="<?php echo $website; ?>" target="_blank"><i class="fa fa-globe"></i></a>
      </div>
    </section>

    <section class="section" id="section">
        <div class="leftBox">
            <div class="content">
                <h1>EVENTS AND ANNOUNCEMENTS</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet voluptates aut, eaque possimus rem, laboriosam consequatur fugiat exercitationem veritatis vel reprehenderit voluptate nulla ad quis nostrum quisquam. Cum qui neque cupiditate fuga minus dicta eos asperiores reiciendis, debitis ullam consequuntur doloribus voluptate rerum mollitia quibusdam eligendi sequi quo soluta. Sit expedita suscipit nulla odit commodi harum autem nemo similique distinctio?</p>
            </div>
        </div>
        <div class="events">
            <ul>
                <li>
                    <div class="time">
                        <h1>07<br><span>DEC</span>
                        </h1>
                    </div>
                    <div class="details">
                        <h3>Event 1</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, praesentium? Maxime tempore fugiat culpa voluptas!</p>
                        <a href="#">View Details</a>
                    </div>
                    <div style="clear: both;"></div>
                </li>
                <li>
                    <div class="time">
                        <h1>08<br><span>DEC</span>
                        </h1>
                    </div>
                    <div class="details">
                        <h3>Event 2</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, praesentium? Maxime tempore fugiat culpa voluptas!</p>
                        <a href="#">View Details</a>
                    </div>
                    <div style="clear: both;"></div>
                </li>
                <li>
                    <div class="time">
                        <h1>09<br><span>DEC</span>
                        </h1>
                    </div>
                    <div class="details">
                        <h3>Event 3</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, praesentium? Maxime tempore fugiat culpa voluptas!</p>
                        <a href="#">View Details</a>
                    </div>
                    <div style="clear: both;"></div>
                </li>
            </ul>
        </div>
    </section>

    <section class="section2" id="section2-about">
        <div class="section-container">
            <div class="columns image" style="background-image: url('images/mission.jpg')">
                &nbsp;
            </div>
            <div class="columns contents">
                <div class="content-container card1">
                    <h2>Our Mission</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem suscipit tenetur nobis autem officia ullam possimus, saepe assumenda. Mollitia labore ut vitae exercitationem facere, atque deleniti dicta nemo. Eligendi quos quo dolore! Sint repellendus quis dicta recusandae non, sequi voluptas!</p>
                </div>
            </div>
        </div>
        <br><br><br><br>
        <div class="section-container">
            <div class="columns contents">
                <div class="content-container card2">
                    <h2>Our Vision</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem suscipit tenetur nobis autem officia ullam possimus, saepe assumenda. Mollitia labore ut vitae exercitationem facere, atque deleniti dicta nemo. Eligendi quos quo dolore! Sint repellendus quis dicta recusandae non, sequi voluptas!.</p>
                </div>
            </div>
            <div class="columns image" style="background-image: url('images/vision.jpg')">
                &nbsp;
            </div>
        </div>
        <br><br><br><br>
        <div class="section-container">
            <div class="columns image" style="background-image: url('images/history.jpg')">
                &nbsp;
            </div>
            <div class="columns contents">
                <div class="content-container card1">
                    <h2>Our History</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem suscipit tenetur nobis autem officia ullam possimus, saepe assumenda. Mollitia labore ut vitae exercitationem facere, atque deleniti dicta nemo. Eligendi quos quo dolore! Sint repellendus quis dicta recusandae non, sequi voluptas!</p>
                </div>
            </div>
        </div>
    </section>
  </body>
  <footer class="footer" id="footer" style="background: linear-gradient(to bottom, #330867 10%,#167070 90%);">
      <div class="footer-container">
        <div class="row">
          <div class="footer-col">
            <h4>company</h4>
            <ul>
              <li><a href="#">about us</a></li>
              <li><a href="#">our services</a></li>
              <li><a href="#">privacy policy</a></li>
              <li><a href="#">affiliate program</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h4>get help</h4>
            <ul>
              <li><a href="#">FAQ</a></li>
              <li><a href="#">shipping</a></li>
              <li><a href="#">returns</a></li>
              <li><a href="#">order status</a></li>
              <li><a href="#">payment options</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h4>online shop</h4>
            <ul>
              <li><a href="#">watch</a></li>
              <li><a href="#">bag</a></li>
              <li><a href="#">shoes</a></li>
              <li><a href="#">dress</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h4>follow us</h4>
            <div class="social-links">
              <a href="<?php echo $facebook; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
              <a href="<?php echo $linkedin; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
              <a href="<?php echo $youtube; ?>" target="_blank"><i class="fab fa-youtube"></i></a>
              <a href="<?php echo $website; ?>" target="_blank"><i class="fa fa-globe"></i></a>
            </div>
          </div>
        </div>
      </div>
</html>
