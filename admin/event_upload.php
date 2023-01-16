<?php
include('admin_session.php');
include('header.php');
include('../config/config.php');
if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $file_path=$_POST['path'];
    unlink("../".$file_path);
    $query_run=mysqli_query($con,"DELETE FROM `event_manage` WHERE id='$id'");
}
if(isset($_POST['submit'])){
    foreach($_FILES['doc']['name'] as $key=>$val){
        $file=str_shuffle("abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890");
        $file=substr($file,0,25);
        $ext=pathinfo($_FILES['doc']['name'][$key],PATHINFO_EXTENSION);
        if($ext=='pdf'){
            if(!is_dir('../media/event')){
                mkdir('../media/event',0777,true);
            }
            $date=$_POST['date'];
            $month=$_POST['month'];
            $event_titel=$_POST['event_titel'];
            $event_description=$_POST['event_description'];
            $event_short_description=$_POST['event_short_description'];
            $destination_path= 'media/event/'.$file.'.'.$ext;
            move_uploaded_file($_FILES['doc']['tmp_name'][$key],'../media/event/'.$file.'.'.$ext);
            $query= "INSERT INTO `event_manage` (`date`, `month`, `event_titel`, `event_desc_short`, `event_desc`, `pdf_link`) VALUES ('$date','$month','$event_titel','$event_description','$event_short_description','$destination_path')";
            mysqli_query($con,$query);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event Upload</title>
  <link rel="stylesheet" href="../css/guest_upload.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
    <section class="home">
        <div class="text">Event Manage</div>
    </section>
  <div class="wrapper header_fixed">
    <form action ="" method="post" enctype="multipart/form-data">
    <div class="upload">
        <header>Event PDF</header>
        <br>
        <input class="file-input" type="file" name="doc[]" hidden multiple >
        <i class="fas fa-cloud-upload-alt"></i>
        <p>Browse File to Upload</p>
      </div>
      <div class="description2">
        <input type="text" name="date" id="date" inputmode="text" placeholder=" Date">
        <input type="text" name="month" id="month" inputmode="text" placeholder=" Month">
        <input type="text" name="event_titel" id="event_titel" inputmode="text" placeholder=" Event Title">
        <textarea type="text" name="event_short_description" id="event_short_description" placeholder= " Event Short Description 80 word" style="height:40px;" cols="20" rows="5"></textarea>
     </div>
      <div class="description2">
        <textarea type="text" name="event_description" id="event_description" placeholder= " Event Description" style="height:80px;" cols="20" rows="5"></textarea>
        <div class="times" style="display: flex; flex-direction: row;">
            <input type="text" name="name" id="name" inputmode="text" placeholder="Start Time" style="margin-right: 15px; width: 140px;">
            <input type="text" name="name" id="name" inputmode="text" placeholder="End Time" style="width: 140px;">
        </div>
        <input type="text" name="name" id="name" inputmode="text" placeholder="POSTER/PAPER/NULL">
        <button class="btn" type="submit" name="submit" >Add</button>
        <!-- <input type="text" name="date" id="date" inputmode="text" placeholder=" Date"> -->
     </div>
    </form>
  </div>
  <table style="width: 90%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Month</th>
                    <th>Title</th>
                    <th>Desc(S)</th>
                    <th>Desc</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $res=mysqli_query($con,"SELECT `id`, `date`, `month`, `event_titel`, `event_desc_short`, `event_desc`, `pdf_link` FROM `event_manage`");
                $i=1;
                while($rows=mysqli_fetch_assoc($res)){
                    $id=$rows['id'];
                    $date=$rows['date'];
                    $month=$rows['month'];
                    $event_titel=$rows['event_titel'];
                    $event_desc_short=$rows['event_desc_short'];
                    $event_desc=$rows['event_desc'];
                    $path=$rows['pdf_link'];
                    ?>
                <form action="" method="post" >
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $date ?></td>
                    <td><?php echo $month ?></td>
                    <td><?php echo $event_titel ?></td>
                    <td><?php echo $event_desc_short ?></td>
                    <td><?php echo $event_desc ?></td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="path" value="<?php echo $path; ?>">
                    <td><button type="submit" id="delete" name="delete">Delete</button></td>
                </tr>
                </form>
                <?php
                $i++;
                }
                ?>
            </tbody>
        </table>
  <script src="../js/guest_upload.js"></script>
</body>
</html>