<?php
include('config/config.php');
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/our_community.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <title>Our Community</title>
</head>
<body>
    <section class="container">
        <div class="community">
            <h3 class="heading">Conference Committee:</h3>
            <br>
            <ul class="Areas area2">
                <h3>Chief Patron:</h3>
                <?php  echo mysqli_fetch_assoc(mysqli_query($con,"SELECT `data` FROM `our_community` WHERE item='Chief Patron'"))['data']; ?>
            </ul>
            <br><br><br>
            <h3 class="heading">National Advisory Committee:</h3>
            <br>
            <ul class="Areas area3">
            <?php  echo mysqli_fetch_assoc(mysqli_query($con,"SELECT `data` FROM `our_community` WHERE item='NAC'"))['data']; ?>
            </ul>
            <br><br><br>

            <h3 class="heading">Organising Committee: </h3>
            <br>
            <ul class="Areas area2">
                <h3>Chairman:</h3>
                <?php  echo mysqli_fetch_assoc(mysqli_query($con,"SELECT `data` FROM `our_community` WHERE item='Chairman'"))['data']; ?>
                <br>
                <h3>Convenor, NHBT 2023:</h3>
                <?php  echo mysqli_fetch_assoc(mysqli_query($con,"SELECT `data` FROM `our_community` WHERE item='Convenor'"))['data']; ?>
                <br>
                <h3>Co Convenor, NHBT 2023:</h3>
                <?php  echo mysqli_fetch_assoc(mysqli_query($con,"SELECT `data` FROM `our_community` WHERE item='Co Convenor'"))['data']; ?>
                <br>
                <h3>Treasurers:</h3>
                <?php  echo mysqli_fetch_assoc(mysqli_query($con,"SELECT `data` FROM `our_community` WHERE item='Treasurers'"))['data']; ?>
                <br>
                <h3>Members:</h3>
                <?php  echo mysqli_fetch_assoc(mysqli_query($con,"SELECT `data` FROM `our_community` WHERE item='Members'"))['data']; ?>
            </ul>
        </div>
    </section>
    <div class="footer-container">
        <div class="row">
          <div class="footer-col">
            <h4>Dr. Suvroma Gupta</h4>
            <div class="social-links">
                <a href="mailto: suvroma.gupta@gmail.com? cc=nationalseminarhit@gmail.com" target="_blank"><i class="fa fa-envelope"></i></a>
                <a href="https://www.linkedin.com/in/suvroma-gupta-92138735" target="_blank"><i class="fab fa-linkedin-in"></i></a>
              </div>
          </div>
          <div class="footer-col">
            <h4>Dr. Keya Sau</h4>
            <div class="social-links">
                <a href="mailto: keyasau07@gmail.com? cc=nationalseminarhit@gmail.com" target="_blank"><i class="fa fa-envelope"></i></a>
                <a href="https://www.linkedin.com/in/keya-sau-63b87aab" target="_blank"><i class="fab fa-linkedin-in"></i></a>
              </div>
          </div>
          <div class="footer-col">
            <h4>Souradipto Choudhuri</h4>
            <div class="social-links">
                <a href="mailto: sourochaudhuri@gmail.com? cc=nationalseminarhit@gmail.com" target="_blank"><i class="fa fa-envelope"></i></a>
                <a href="https://www.linkedin.com/in/souradipto-choudhuri" target="_blank"><i class="fab fa-linkedin-in"></i></a>
              </div>
          </div>
          <div class="footer-col">
            <h4>Eshna Dutta</h4>
            <div class="social-links">
                <a href="mailto: eshnadutta@gmail.com? cc=nationalseminarhit@gmail.com" target="_blank"><i class="fa fa-envelope"></i></a>
                <a href="https://www.linkedin.com/in/eshna-dutta-2b42214b" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
        </div>
    </div>
    <br><br><br>
</body>
</html>