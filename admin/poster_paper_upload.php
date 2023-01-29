<?php
include('admin_session.php');
include('header.php');
include('../config/config.php');

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
  <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<section class="home">
        <div class="text">Poster Paper Upload</div>
    </section>
<main>
    <div class="second-cards">
    <div class="card-singlee" style="margin-right: 10px; width: 550px; height: 250px;">
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
    <div class="card-singlee" style="width: 550px; height: 250px; margin-top: -15px;">
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
    </body>
</html>