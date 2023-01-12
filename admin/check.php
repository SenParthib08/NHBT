<?php
session_start();
include('../config/db.php');
$username=$_POST['username'];
$password=$_POST['password'];
$data=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `login` WHERE user_name='$username' and user_pass='$password'"));
if(isset($data['id'])){
    // if(isset($_POST['remember'])){
    //     setcookie('username',$username,time()+30);
    //     setcookie('password',$password,time()+30);
    // }else{
    //     setcookie('username',$username,30);
    //     setcookie('password',$password,30);
    // }
    $_SESSION['IsLogin']='yes';
    echo 'correct';
}else{
    echo "wrong";
}
?>