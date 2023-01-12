<?php
include('admin_session.php');
include('header.php');
include('../config/config.php');
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
<body >
    <section class="home">
        <div class="text">Payments</div>
    </section>
    
    <div class="header_fixed">
        <table>
        <main>
        <div class="cards">

            <div class="card-single">
                <div>
                    <?php $payment_count=mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(id) FROM payment")); ?>
                    <h1><?php echo $payment_count['COUNT(id)']; ?></h1>
                    <span>Payment Count</span>
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
                    <?php $pending_payment=mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(id) FROM payment WHERE payment_status='pending'")); ?>
                    <h1><?php echo $pending_payment['COUNT(id)']; ?></h1>
                    <span>Pending Payment</span>
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
    </main>
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Payment id</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $res=mysqli_query($con,"SELECT `name`, `email`, `amount`, `payment_status`, `payment_id`, `added_on` FROM `payment` ORDER BY id DESC");
                while($rows=mysqli_fetch_assoc($res)){
                ?>
                <tr>
                    <td><?php echo $rows['added_on']; ?></td>
                    <td><?php echo $rows['name']; ?></td>
                    <td><?php echo $rows['email']; ?></td>
                    <td><?php echo $rows['amount']; ?></td>
                    <td><?php echo $rows['payment_status']; ?></td>
                    <td><?php echo $rows['payment_id']; ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>