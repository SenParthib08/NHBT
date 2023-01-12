<?php
include('admin_session.php');
include('header.php');
include('../config/config.php');
if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $res=mysqli_query($con,"SELECT `email`, `name` FROM `contact_us` WHERE id='".$id."'");
    $row=mysqli_fetch_assoc($res);
    $query_run=mysqli_query($con,"DELETE FROM `contact_us` WHERE id='$id'");
    $name=$row['name'];
    $email=$row['email'];
    if($query_run){
        ?>
        <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
        <script>
            var mgstext="Hi <?php echo "$name"; ?>. We solved your message";
            var email_id="<?php echo "$email";?>";
            var email_subject="Succesfully Solved";
            jQuery.ajax({
                type:'post',
                url:'../send_email.php',
                data: "mgstext="+mgstext+"&email_id="+email_id+"&email_subject="+email_subject,
                success:function(result){
                    window.location.href="contact_manage.php";
                }
            });
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Table Design || Future Web</title> -->
    <link rel="stylesheet" href="../css/contact_manage.css">
</head>
<body>
    <section class="home">
        <div class="text">Contact Manage</div>
    </section>
    <div class="header_fixed">
        <table>
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $res=mysqli_query($con,"SELECT `id`, `name`, `email`, `message`, `added_on`FROM `contact_us` ORDER BY id DESC");
                while($rows=mysqli_fetch_assoc($res)){
                ?>
                <form action="" method="post">
                <tr>
                    <td><?php echo $rows['added_on']; ?></td>
                    <td><?php echo $rows['name']; ?></td>
                    <td><?php echo $rows['email']; ?></td>
                    <td><?php echo $rows['message']; ?></td>
                    <input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
                    <td><button type="submit" id="delete" name="delete">Resolve</button></td>
                </tr>
                </form>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>