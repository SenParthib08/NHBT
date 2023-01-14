<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Document</title>
</head>
<body>
<footer class="footer" id="footer">
      <div class="footer-container">
        <div class="row">
          <div class="footer-col">
            <!-- <h4>company</h4> -->
            <img src="images/logo.png" alt="">
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
</body>
</html>