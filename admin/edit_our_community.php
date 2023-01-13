<?php
include('admin_session.php');
include('../config/config.php');
$id=$_GET['updateid'];
$item=$_GET['item'];
$data=$_GET['data'];

if(isset($_POST['submit'])){
    $text=$_POST['text'];
    $result=mysqli_query($con,"UPDATE `our_community` SET `data`='$text' WHERE id='$id'");
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

    <div>
            <br>
            <h5 style="font-weight:100;">1. Do NOT use any special characters. </h5>
            <h5 style="font-weight:100;">2. Do NOT use any space between two &lt;li&gt; tag.</h5>
            <h5 style="font-weight:100;">3. Do NOT use ENTER KEY.</h5>
            <h5 style="font-weight:100;">4. Put your content this format "&lt;li&gt;content&lt;/li	&gt;&lt;li&gt;content&lt;/li&gt;".</h5>
        </div>

        <br><br>
        <form action="" method="post">
            <div class="form-group">
                <lebel><?php echo $item; ?></lebel>
                <textarea rows="10" cols="50" type="text" name="text" class="form-control" placeholder="input your <?php echo $item; ?>"><?php echo $data; ?></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
  </body>
</html>

