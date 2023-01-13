<?php
include('admin_session.php');
include('../config/config.php');
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard.css">
    <!-- <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'> -->
    <title>Dashboard</title>
</head>
<body>
<main>
    <section class="home">
        <div class="text">Dashboard</div>
    </section>
        <div class="cards">

            <div class="card-single">
                <div>
                    <?php $year_unique_visite=mysqli_fetch_assoc(mysqli_query($con,"SELECT `year_visit` FROM `visitor`")); ?>
                    <h1><?php echo $year_unique_visite['year_visit']; ?></h1>
                    <span>Yearly unique visit</span>
                </div>
                <div>
                    <span>l</span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <?php $today_unique_visit=mysqli_fetch_assoc(mysqli_query($con,"SELECT `today_visit` FROM `visitor`")) ?>
                    <h1><?php echo $today_unique_visit['today_visit']; ?></h1>
                    <span>Today unique visit</span>
                </div>
                <div>
                    <span>l</span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <?php $success_payment=mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(id) FROM payment WHERE payment_status='complete'")); ?>
                    <h1><?php echo $success_payment['COUNT(id)']; ?></h1>
                    <span>Success Payment</span>
                </div>
                <div>
                    <span>l</span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <?php $income=mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(amount) FROM payment WHERE payment_status='complete'")); ?>
                    <h1>₹<?php echo $income['SUM(amount)']; ?></h1>
                    <span>income</span>
                </div>
                <div>
                    <span>l</span>
                </div>
            </div>

        </div>

    <div class="second-cards">
        <div class="card-singlee">
            <div>
                <h2>Site Configuration</h2>
                <br>
                <div class="second-body">
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Data</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $res=mysqli_query($con,"SELECT `id`, `item`, `data`, `status` FROM `site_config`");
                            while($site_config=mysqli_fetch_assoc($res)){
                            ?>
                            <form action="" method="post">
                            <tr>
                                <td><?php echo $site_config['item']; ?></td>
                                <td><?php echo $site_config['data']; ?></td>
                                <td><button class="status" type="submit"> <a href="edit_site_config.php?updateid=<?php echo $site_config['id'];?>&item=<?php echo $site_config['item']; ?>&data=<?php echo $site_config['data']; ?>" style="color:rgb(93, 2, 2);">edit</a> </button></td>
                            </tr>
                            </form>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card-singlee">
            <div>
                <h2>Recent Payment  (Amount <?php echo $amount; ?>)</h2> 
                <br>
                <div class="second-body">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Payment ID</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $res=mysqli_query($con,"SELECT `name`, `payment_id`, `payment_status` FROM payment ORDER BY id DESC LIMIT 6");
                            while($site_config=mysqli_fetch_assoc($res)){
                            ?>
                            <tr>
                                <td><?php echo $site_config['name']; ?></td>
                                <td><?php echo $site_config['payment_id']; ?></td>
                                <td><input class="<?php echo $site_config['payment_status']; ?>" type="submit" value="<?php echo $site_config['payment_status']; ?>"/></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="second-cards">
        <div class="card-singlee">
            <div>
                <h2>Social Media and Contact Info</h2>
                <br>
                <div class="second-body">
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Data</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $res=mysqli_query($con,"SELECT `id`, `item`, `data`  FROM `contact_info`");
                            while($contact_info=mysqli_fetch_assoc($res)){
                                if(strlen($contact_info['data'])>30){
                                    $link="Big LINK, to see the link hit edit";
                                }else{
                                    $link=$contact_info['data'];
                                }
                            ?>
                            <form action="" method="post">
                            <tr>
                                <td><?php echo $contact_info['item']; ?></td>
                                <td><?php echo $link; ?></td>
                                <td><button class="status" type="submit"> <a href="edit_social_media_info.php?updateid=<?php echo $contact_info['id'];?>&item=<?php echo $contact_info['item']; ?>&data=<?php echo $contact_info['data']; ?>" style="color:rgb(93, 2, 2);">edit</a> </button></td>
                            </tr>
                            </form>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card-singlee">
            <div>
                <h2>Our Community Info</h2>
                <br>
                <div class="second-body">
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Data</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $res=mysqli_query($con,"SELECT `id`, `item`, `data` FROM `our_community`");
                            while($our_community=mysqli_fetch_assoc($res)){
                                if(strlen($our_community['data'])>30){
                                    $data="Big DATA, to see the data hit edit";
                                }else{
                                    $data=$contact_info['data'];
                                }
                            ?>
                            <form action="" method="post">
                            <tr>
                                <td><?php echo $our_community['item']; ?></td>
                                <td><?php echo $data; ?></td>
                                <td><button class="status" type="submit"> <a href="edit_our_community.php?updateid=<?php echo $our_community['id'];?>&item=<?php echo $our_community['item']; ?>&data=<?php echo $our_community['data']; ?>" style="color:rgb(93, 2, 2);">edit</a> </button></td>
                            </tr>
                            </form>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="second-cards">
        <div class="card-singlee">
            <div>
                <h2>Social Media and Contact Info</h2>
                <br>
                <div class="second-body">
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Data</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $res=mysqli_query($con,"SELECT `id`, `item`, `data`  FROM `contact_info`");
                            while($contact_info=mysqli_fetch_assoc($res)){
                                if(strlen($contact_info['data'])>30){
                                    $link="Big LINK, to see the link hit edit";
                                }else{
                                    $link=$contact_info['data'];
                                }
                            ?>
                            <form action="" method="post">
                            <tr>
                                <td><?php echo $contact_info['item']; ?></td>
                                <td><?php echo $link; ?></td>
                                <td><button class="status" type="submit"> <a href="edit_social_media_info.php?updateid=<?php echo $contact_info['id'];?>&item=<?php echo $contact_info['item']; ?>&data=<?php echo $contact_info['data']; ?>" style="color:rgb(93, 2, 2);">edit</a> </button></td>
                            </tr>
                            </form>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card-singlee">
            <div>
                <h2>Our Community Info</h2>
                <br>
                <div class="second-body">
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Data</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $res=mysqli_query($con,"SELECT `id`, `item`, `data` FROM `our_community`");
                            while($our_community=mysqli_fetch_assoc($res)){
                                if(strlen($our_community['data'])>30){
                                    $data="Big DATA, to see the data hit edit";
                                }else{
                                    $data=$contact_info['data'];
                                }
                            ?>
                            <form action="" method="post">
                            <tr>
                                <td><?php echo $our_community['item']; ?></td>
                                <td><?php echo $data; ?></td>
                                <td><button class="status" type="submit"> <a href="edit_our_community.php?updateid=<?php echo $our_community['id'];?>&item=<?php echo $our_community['item']; ?>&data=<?php echo $our_community['data']; ?>" style="color:rgb(93, 2, 2);">edit</a> </button></td>
                            </tr>
                            </form>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>