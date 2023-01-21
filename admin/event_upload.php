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
            $start_time=$_POST['start_time'];
            $end_time=$_POST['end_time'];
            $type=$_POST['type'];
            move_uploaded_file($_FILES['doc']['tmp_name'][$key],'../media/event/'.$file.'.'.$ext);
            $query= "INSERT INTO `event_manage` (`date`, `month`, `event_titel`, `event_desc_short`, `event_desc`, `pdf_link`, `poster_or_paper`, `time_from`, `time_to`) VALUES ('$date','$month','$event_titel','$event_description','$event_short_description','$destination_path','$type','$start_time','$end_time')";
            mysqli_query($con,$query);
        }
    }
}
if(isset($_POST['update_paper_pdf'])){
    $file_path=mysqli_fetch_assoc(mysqli_query($con,"SELECT `data` FROM `paper_poster_pdf_link` WHERE type='PAPER'"))['data'];
    unlink("../".$file_path);
    foreach($_FILES['doc']['name'] as $key=>$val){
        $file=str_shuffle("abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890");
        $file=substr($file,0,25);
        $ext=pathinfo($_FILES['doc']['name'][$key],PATHINFO_EXTENSION);
        if($ext=='pdf'){
            if(!is_dir('../media/paper')){
                mkdir('../media/paper',0777,true);
            }
            $destination_path= 'media/paper/'.$file.'.'.$ext;
            move_uploaded_file($_FILES['doc']['tmp_name'][$key],'../media/paper/'.$file.'.'.$ext);
            $query= "UPDATE `paper_poster_pdf_link` SET data='$destination_path' WHERE type='PAPER'";
            mysqli_query($con,$query);
        }
    }
}
if(isset($_POST['update_poster_pdf'])){
    $file_path=mysqli_fetch_assoc(mysqli_query($con,"SELECT `data` FROM `paper_poster_pdf_link` WHERE type='POSTER'"))['data'];
    unlink("../".$file_path);
    foreach($_FILES['doc']['name'] as $key=>$val){
        $file=str_shuffle("abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890");
        $file=substr($file,0,25);
        $ext=pathinfo($_FILES['doc']['name'][$key],PATHINFO_EXTENSION);
        if($ext=='pdf'){
            if(!is_dir('../media/poster')){
                mkdir('../media/poster',0777,true);
            }
            $destination_path= 'media/poster/'.$file.'.'.$ext;
            move_uploaded_file($_FILES['doc']['tmp_name'][$key],'../media/poster/'.$file.'.'.$ext);
            $query= "UPDATE `paper_poster_pdf_link` SET data='$destination_path' WHERE type='POSTER'";
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
  <link rel="stylesheet" href="../css/event_upload.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>

    <main>
    <div class="second-cards">
    <div class="card-singlee">
            <div>
                <h2>Paper Presentation</h2>
                <br>
                <div class="second-body">
                    <table style="width: 90%;">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Pdf Upload</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $res=mysqli_query($con,"SELECT `id` FROM `paper_poster_pdf_link`  WHERE type='PAPER'");
                            $i=1;
                            while($rows=mysqli_fetch_assoc($res)){
                                $id=$rows['id'];
                            ?>
                            <form action ="" method="post" enctype="multipart/form-data">
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><input class="file-input" type="file" name="doc[]" multiple  ></td>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <td><button type="submit" name="update_paper_pdf">Save</button></td>
                            </tr>
                            </form>
                            <?php
                                $i++;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="second-cards">
    <div class="card-singlee">
            <div>
                <h2>Poster Presentation</h2>
                <br>
                <div class="second-body">
                    <table style="width: 90%;">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Pdf Upload</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $res=mysqli_query($con,"SELECT `id` FROM `paper_poster_pdf_link`  WHERE type='POSTER'");
                            $i=1;
                            while($rows=mysqli_fetch_assoc($res)){
                                $id=$rows['id'];
                            ?>
                            <form action ="" method="post" enctype="multipart/form-data">
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><input class="file-input" type="file" name="doc[]" multiple  ></td>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <td><button type="submit" name="update_poster_pdf">Save</button></td>
                            </tr>
                            </form>
                            <?php
                                $i++;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

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
        <textarea type="text" name="event_short_description" id="event_short_description" placeholder= " Event Short Description 80 word" style="height:40px;" cols="20" rows="10"></textarea>
     </div>
      <div class="description2">
        <textarea type="text" name="event_description" id="event_description" placeholder= " Event Description" style="height:80px;" cols="20" rows="5"></textarea>
        <div class="times" style="display: flex; flex-direction: row;">
            <input type="text" name="start_time" id="start_time" inputmode="text" placeholder=" Start Time" style="margin-right: 15px; width: 140px;">
            <input type="text" name="end_time" id="end_time" inputmode="text" placeholder=" End Time" style="width: 140px;">
        </div>
        <input type="text" name="type" id="type" inputmode="text" placeholder=" POSTER/PAPER/NULL">
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
                    <th>Start</th>
                    <th>End</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $res=mysqli_query($con,"SELECT `id`, `date`, `month`, `event_titel`, `event_desc_short`, `event_desc`, `pdf_link`, `time_from`, `time_to` FROM `event_manage`");
                $i=1;
                while($rows=mysqli_fetch_assoc($res)){
                    $id=$rows['id'];
                    $date=$rows['date'];
                    $month=$rows['month'];
                    $event_titel=$rows['event_titel'];
                    $event_desc_short=$rows['event_desc_short'];
                    $event_desc=$rows['event_desc'];
                    $path=$rows['pdf_link'];
                    $time_from=$rows['time_from'];
                    $time_to=$rows['time_to'];
                    ?>
                <form action="" method="post" >
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $date ?></td>
                    <td><?php echo $month ?></td>
                    <td><?php echo $event_titel ?></td>
                    <td><?php echo $event_desc_short ?></td>
                    <td><?php echo $event_desc ?></td>
                    <td><?php echo $time_from ?></td>
                    <td><?php echo $time_to ?></td>
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