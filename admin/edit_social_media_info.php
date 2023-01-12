<?php
include('admin_session.php');
include('../config/config.php');
$id=$_GET['updateid'];
$item=$_GET['item'];
$data=$_GET['data'];

if(isset($_POST['submit'])){
    $text=$_POST['text'];
    $result=mysqli_query($con,"UPDATE `contact_info` SET `data`='$text' WHERE id='$id'");
    if($result){
        header('Location:dashboard.php');
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">

        

        
        <br><br>
        <form action="" method="post">
            <div class="form-group">
                <lebel><?php echo $item; ?></lebel>
                <input type="text" name="text" class="form-control" placeholder="input your <?php echo $item; ?>" value="<?php echo $data; ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
  </body>
</html>

