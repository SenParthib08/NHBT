<?php
include('admin_session.php');
include('header.php');
include('../config/config.php');
if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $query_run=mysqli_query($con,"DELETE FROM `event_manage` WHERE id='$id'");
}
if(isset($_POST['submit'])){
    $date=$_POST['date'];
    $month=$_POST['month'];
    $event_titel=$_POST['event_titel'];
    $event_description=$_POST['event_description'];
    $event_short_description=$_POST['event_short_description'];
    $query= "INSERT INTO `event_manage` (`date`, `month`, `event_titel`, `event_desc_short`, `event_desc`) VALUES ('$date','$month','$event_titel','$event_description','$event_short_description')";
    mysqli_query($con,$query);
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
    <form action =""method="post" >
      <div class="description2">
        <input type="text" name="date" id="date" inputmode="text" placeholder=" Date">
        <input type="text" name="month" id="month" inputmode="text" placeholder=" Month">
        <input type="text" name="event_titel" id="event_titel" inputmode="text" placeholder=" Event Titel">
     </div>
      <div class="description2">
        <textarea type="text" name="event_description" id="event_description" placeholder= " Event Description" style="height:140px;" cols="20" rows="5"></textarea>
     </div>
      <div class="description2">
      <textarea type="text" name="event_short_description" id="event_short_description" placeholder= " Event Short Description" style="height:80px;" cols="20" rows="5"></textarea>
        <button class="btn" type="submit" name="submit" >Add</button>
     </div>
    </form>
    <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Month</th>
                    <th>Titel</th>
                    <th>Desc</th>
                    <th>Desc(S)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $res=mysqli_query($con,"SELECT `id`, `date`, `month`, `event_titel`, `event_desc_short`, `event_desc` FROM `event_manage`");
                $i=1;
                while($rows=mysqli_fetch_assoc($res)){
                    $id=$rows['id'];
                    $date=$rows['date'];
                    $month=$rows['month'];
                    $event_titel=$rows['event_titel'];
                    $event_desc_short=$rows['event_desc_short'];
                    $event_desc=$rows['event_desc'];
                    ?>
                <form action="" method="post" >
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $date ?></td>
                    <td><?php echo $month ?></td>
                    <td><?php echo $event_titel ?></td>
                    <td><?php echo $event_desc ?></td>
                    <td><?php echo $event_desc_short ?></td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
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
</body>
</html>