<?php
include('admin_session.php');
include('header.php');
include('../config/config.php');
if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $file_path=$_POST['path'];
    unlink("../".$file_path);
    $query_run=mysqli_query($con,"DELETE FROM `guest` WHERE id='$id'");
}
if(isset($_POST['submit'])){
    foreach($_FILES['doc']['name'] as $key=>$val){
        $file=str_shuffle("abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890");
        $file=substr($file,0,25);
        $ext=pathinfo($_FILES['doc']['name'][$key],PATHINFO_EXTENSION);
        if($ext=='jpg' || $ext=='jpeg' || $ext=='png'){
            if(!is_dir('../media/guest')){
                mkdir('../media/guest',0777,true);
            }
            $guest_name=$_POST['name'];
            $guest_description=$_POST['description'];
            $guest_email=$_POST['email'];
            $guest_linkedin=$_POST['linkedin'];
            $destination_path= 'media/guest/'.$file.'.'.$ext;
            move_uploaded_file($_FILES['doc']['tmp_name'][$key],'../media/guest/'.$file.'.'.$ext);
            $query= "INSERT INTO `guest` (`image_path`, `name`, `short_description`, `guest_email`, `guest_linkedin`) VALUES ('$destination_path','$guest_name','$guest_description','$guest_email','$guest_linkedin')";
            mysqli_query($con,$query);
        }
    }
}
?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guest Upload</title>
  <link rel="stylesheet" href="../css/guest_upload.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
    <section class="home">
        <div class="text">Guest Manage</div>
    </section>
  <div class="wrapper header_fixed">
    <form method="post" enctype="multipart/form-data" >
      <div class="upload">
        <header>image size should be 370 x 370</header>
        <br>
        <input class="file-input" type="file" name="doc[]" accept="image/*" hidden multiple >
        <i class="fas fa-cloud-upload-alt"></i>
        <p>Browse File to Upload</p>
      </div>
      <div class="description1">
        <input type="text" name="name" id="name" inputmode="text" placeholder=" Guest Name">
        <textarea type="text" name="description" id="description" placeholder= " Guest Description" id="" cols="20" rows="5"></textarea>
        <!-- <input type="text" inputmode="text"> -->
     </div>
      <div class="description2">
        <input type="text" name="email" id="email" inputmode="email" placeholder=" Guest email">
        <input type="text" name="linkedin" id="linkedin" inputmode="text" placeholder=" Guest LinkedIn">
        <!-- <input type="text" inputmode="text"> -->
        <button class="btn" type="submit" name="submit" >Add</button>
     </div>
    </form>
    <table>
            <thead>
                <tr>
                    <th>S No</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Desc</th>
                    <th>Email</th>
                    <th>Linkedin</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $res=mysqli_query($con,"SELECT `id`, `image_path`, `name`, `short_description`, `guest_email`, `guest_linkedin` FROM `guest`");
                $i=1;
                while($rows=mysqli_fetch_assoc($res)){
                    $id=$rows['id'];
                    $path=$rows['image_path'];
                    $name=$rows['name'];
                    $description=$rows['short_description'];
                    $email='mailto:'.$rows['guest_email'];
                    $linkedin=$rows['guest_linkedin'];
                    ?>
                <form action="" method="post" >
                <tr>
                    <td><?php echo $i ?></td>
                    <td><img src="../<?php echo $path ?>" alt=""></td>
                    <td><?php echo $name ?></td>
                    <td><?php echo $description ?></td>
                    <td><?php echo $email ?></td>
                    <td><?php echo $linkedin ?></td>
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
  </div>
  <script src="../js/guest_upload.js"></script>
</body>
</html>