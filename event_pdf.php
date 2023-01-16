<?php
include('config/config.php');
include('track.php');
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Our Events</title>
    <link rel="stylesheet" href="css/event_pdf.css" />
    <link rel="stylesheet" href="css/header.css" />
  </head>
  <body>
    <div class="event-container">


        <?php
        $res=mysqli_query($con,"SELECT `date`, `month`, `event_titel`, `event_desc_short`, `event_desc`, `pdf_link`, `poster_or_paper`, `time_from`, `time_to` FROM `event_manage`");
        while($rows=mysqli_fetch_assoc($res)){
            $date=$rows['date'];
            $month=$rows['month'];
            $event_titel=$rows['event_titel'];
            $event_desc_short=$rows['event_desc_short'];
            $event_desc=$rows['event_desc'];
            $path=$rows['pdf_link'];
            $poster_or_paper=$rows['poster_or_paper'];
            $time_from=$rows['time_from'];
            $time_to=$rows['time_to'];
            ?>
              <div class="event">
              <div class="event-left">
                <div class="event-date">
                  <div class="date"><?php echo $date; ?></div>
                  <div class="month"><?php echo $month; ?></div>
                  <br><br>
                  <div class="event-time" style="font-size: 14px;">
                    <div class="start"><?php echo $time_from; ?></div>
                    <span class="to">to</span>
                    <div class="end"><?php echo $time_to; ?></div>
                  </div>
                </div>
              </div>
              <div class="event-right">
                <h3 class="event-title"><?php echo $event_titel; ?></h3>
                <div class="event-description"> <?php echo $event_desc_short; ?> </div>
                <br>
                <div class="event-description-large"><?php echo $event_desc; ?></div>
                <div class="event-timing">
                  <!-- <img src="images/time.png" alt="" /> 10:00 am -->
                  <a class="btn" href="<?php echo $path; ?>" target="_blank" >Details</a>
                  <?php
                  if($poster_or_paper=="POSTER"){
                    ?> <a class="btn" href="#" target="_blank" >Template</a> <?php
                  }if($poster_or_paper=="PAPER"){
                    ?> <a class="btn" href="#" target="_blank" >Template</a> <?php
                  }
                  ?>
                </div>
              </div>
            </div>
        <?php
        }
        ?>


      <!-- <div class="event">
        <div class="event-left">
          <div class="event-date">
            <div class="date">17</div>
            <div class="month">Jan</div>
            <br><br>
            <div class="event-time" style="font-size: 14px;">
              <div class="start">10:00 am</div>
              <span class="to">to</span>
              <div class="end">12:00 pm</div>
            </div>
          </div>
        </div>
        <div class="event-right">
          <h3 class="event-title">Event 2</h3>
          <div class="event-description">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus,
            ratione.
          </div>
          <br>
          <div class="event-description-large">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus,
            ratione. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit facilis distinctio quis quaerat? Ex amet dignissimos magnam saepe porro harum impedit libero, recusandae aperiam adipisci odit. Omnis necessitatibus porro eligendi.
          </div>
          <div class="event-timing">
            <a class="btn" href="#">Details</a>
            <a class="btn" href="#">Template</a>
          </div>
        </div>
      </div> -->


    </div>
  </body>
</html>
<?php
include('footer.php');
?>