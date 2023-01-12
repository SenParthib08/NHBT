<?php
include('admin_session.php');
include('header.php');
include('../config/config.php');
if(isset($_POST['submit'])){
    foreach($_FILES['doc']['name'] as $key=>$val){
        $file=str_shuffle("abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890");
        $file=substr($file,0,25);
        $ext=pathinfo($_FILES['doc']['name'][$key],PATHINFO_EXTENSION);
        if($ext=='jpg' || $ext=='jpeg' || $ext=='png'){
            $year=$_POST['date'];
            if(!is_dir('../media/image/'.$year)){
                mkdir('../media/image/'.$year,0777,true);
            }
            move_uploaded_file($_FILES['doc']['tmp_name'][$key],'../media/image/'.$year.'/'.$file.'.'.$ext);
            $destination_path= 'media/image/'.$year.'/'.$file.'.'.$ext;
            $query= "INSERT INTO `media`(`image_path`, `date` ) VALUES ('$destination_path','$year')";
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
  <title>Image upload</title>
  <link rel="stylesheet" href="../css/image_upload.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<section class="home">
    <div class="text">Gallery Manage</div>
</section>
  <div class="wrapper">
    <!-- <header>Image Upload Page</header> -->
    <form method="post" enctype="multipart/form-data">
      <div class="upload">
        <input class="file-input" type="file" name="doc[]" accept="image/*" hidden multiple>
      <i class="fas fa-cloud-upload-alt"></i>
      <p>Browse File to Upload</p><p style="text-align: center;">Image size should be 370 x 370 pixels. jpg, jpeg and png are allowed.</p>
      </div>
      <div class="date">
        <input type="text" inputmode="numeric" name="date" id="date" placeholder=" YYYY">
        <button class="btn" type="submit" name="submit" >Add</button>
      </div>
  </div>
  <script src="../js/image_upload.js"></script>
</body>
</html>