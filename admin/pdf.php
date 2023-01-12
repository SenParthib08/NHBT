<?php
include('admin_session.php');
include('../config/config.php');
include('header.php');
if(isset($_POST['submit'])){
    foreach($_FILES['doc']['name'] as $key=>$val){
        $file=str_shuffle("abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890");
        $file=substr($file,0,25);
        $ext=pathinfo($_FILES['doc']['name'][$key],PATHINFO_EXTENSION);
        if($ext=='pdf'){
            $name=$_POST['name'];
            $description=$_POST['description'];
            if(!is_dir('../media/pdf')){
                mkdir('../media/pdf',0777,true);
            }
            move_uploaded_file($_FILES['doc']['tmp_name'][$key],'../media/pdf/'.$file.'.'.$ext);
            $destination_path= 'media/pdf/'.$file.'.'.$ext;
            $query= "INSERT INTO `pdf`(`pdf_path`, `short_description`, `name`) VALUES ('$destination_path','$description','$name')";
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
  <title>PDF upload</title>
  <link rel="stylesheet" href="../css/pdf_upload.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<section class="home">
    <div class="text">Pdf Manage</div>
</section>
  <div class="wrapper">
    <!-- <header>PDF Upload Page</header> -->
    <form method="post" enctype="multipart/form-data">
      <div class="upload">
        <input class="file-input" type="file" name="doc[]" hidden multiple>
        <i class="fas fa-cloud-upload-alt"></i>
        <p>Browse File to Upload</p><p  style="text-align: center;">Only pdf is allowed</p>
      </div>
      <div class="description">
        <input type="text" name="name" id="name" placeholder=" Please enter the pdf name within 23 words">
        <textarea type="text" name="description" id="description" cols="20" rows="5"  placeholder= " Please enter the pdf description within 80 words" ></textarea>
        <!-- <input type="text" inputmode="text"> -->
        <button class="btn" type="submit" name="submit" >Add</button>
     </div>
    </form>
  </div>
  <script src="../js/pdf_upload.js"></script>
</body>
</html>