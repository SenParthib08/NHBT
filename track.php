<?php
include('config/config.php');
$today_date=date("d");
$this_year=date("Y");
$check_date=mysqli_fetch_assoc(mysqli_query($con,"SELECT today_date FROM `visitor`"))['today_date'];
$check_year=mysqli_fetch_assoc(mysqli_query($con,"SELECT this_year FROM `visitor`"))['this_year'];

if ($check_year!=$this_year){
    mysqli_query($con,"UPDATE `visitor` SET year_visit=0");
    mysqli_query($con,"UPDATE `visitor` SET this_year='$this_year'");
}
if ($check_date!=$today_date){
    mysqli_query($con,"UPDATE `visitor` SET today_visit=0");
    mysqli_query($con,"UPDATE `visitor` SET today_date='$today_date'");
}
if(!isset($_COOKIE[$today_date])){
    setcookie($today_date,'yes',time()+(60*60*24));
    mysqli_query($con,"UPDATE `visitor` SET today_visit=today_visit+1, today_date='$today_date'");
}
if(!isset($_COOKIE[date("Y")])){
    setcookie(date("Y"),'yes',time()+(60*60*24*365));
    mysqli_query($con,"UPDATE `visitor` SET year_visit=year_visit+1, this_year='$this_year'");
}
?>
<?php


?>