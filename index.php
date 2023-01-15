<?php
include('config/db.php');
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
        <a href="index.php">Home</a>
        <a href="about_us.php">About</a>
        <a href="pdf.php">Proceedings</a>
        <a href="guest.php">Guests</a>
        <a href="gallery.php">Gallery</a>
        <a href="contact.php">Contact</a>
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
        <p>Application of Biotechnology for a sustainable living has amplified over the past few decades by addressing the diverse domains including agriculture, food, health care, livestock management, energy, environment, waste management and a
        multitude of other areas. It may not be incorrect to say that the world needs to move towards a sustainable bio-economy for human race to continue on this planet. New Horizons in Biotechnology (NHBT) are a series of national conferences organized by the Department of Biotechnology, Haldia Institute of Technology with this theme in focus, where global challenges in multiple sectors are discussed and debated in the biotechnological context.</p>
        <a href="#section2-about">Explore</a>
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
                <p>The event consists of various interactive sessions. They are the guest lectures, poster presentation, paper presentation quiz etc. The main focuses of this year's discussions are microbial and environmental biotechnology, omics biotechnology, biopharmaceutical product development & quality control, bioethics & patent biotechnology etc.</p>
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
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Velit laboriosam ullam tempore impedit autem voluptatem, consequ</p>
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
                    <p>To bring to the students the latest advancements in biotechnology both in academic and industrial areas and their application in multifarious fields. To bridge the gap between industry and academia through an exchange of knowledge between industry personnel, scientists & academicians and NGOs in an open environment through wide discussions. To develop the skills for a sound scientific communication and interaction amongst the participants and speakers alike.</p>
                </div>
            </div>
        </div>
        <br><br><br><br>
        <div class="section-container">
            <div class="columns contents">
                <div class="content-container card2">
                    <h2>Our Vision</h2>
                    <p>To bring together students, academicians, and industrial personnel from different parts of the country to share their comprehension pertaining to the developments in the emerging areas of biotechnology and associated fields. To promote and encourage the research work and entrepreneurship among student so that they can contribute to the field of their studies.</p>
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
                    <p>New Horizons in Biotechnology was initially aimed to bring togather some of the recent developments in Biotechnology in India. It was initiated by Prof. Pranab Roy, faculty of the department at that time. It was also whole-heartedly welcomed by Dr. Siraj Dutta, HoD of the department of that time. Soon a national advisory committee was developed. And after a decade of the initiation, the conference is highly successful in its motive.</p>
                </div>
            </div>
        </div>
    </section>
  </body>
  <footer class="footer" id="footer" style="background: linear-gradient(to bottom, #330867 10%,#167070 90%);">
      <div class="footer-container">
        <div class="row">
          <div class="footer-col">
            <!-- <h4>company</h4> -->
            <img src="images/logo_circle.png" alt="">
            <!-- <ul>
              <li><a href="#">about us</a></li>
              <li><a href="#">our services</a></li>
              <li><a href="#">privacy policy</a></li>
              <li><a href="#">affiliate program</a></li>
            </ul> -->
          </div>
          <div class="footer-col">
            <h4>Details:</h4>
            <ul>
              <li><a href="#">Department of Biotechnology</a></li>
              <li><a href="#">HIT, ICARE Complex, Hatiberia</a></li>
              <li><a href="#">Haldia, Purba Medinipore, WB, 721657</a></li>
              <?php $email=mysqli_fetch_assoc(mysqli_query($con,"SELECT `data` FROM `contact_info` WHERE item='email'"))['data']; ?>
              <li><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></li>
              <?php $phone=mysqli_fetch_assoc(mysqli_query($con,"SELECT `data` FROM `contact_info` WHERE item='phone'"))['data'];
                $phone_ouner=mysqli_fetch_assoc(mysqli_query($con,"SELECT `data` FROM `contact_info` WHERE item='phone_owner'"))['data']; ?>
              <li><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?> (<?php echo $phone_ouner; ?>)</a></li>
            </ul>
          </div>
          <!-- <div class="footer-col">
            <h4>online shop</h4>
            <ul>
              <li><a href="#">watch</a></li>
              <li><a href="#">bag</a></li>
              <li><a href="#">shoes</a></li>
              <li><a href="#">dress</a></li>
            </ul>
          </div> -->
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
  </footer>
</html>
