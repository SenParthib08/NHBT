<?php
session_start();
include('../config/db.php');
$username_cookie='';
$password_cookie='';
$error="";
if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
    $username_cookie=$_COOKIE['username'];
    $password_cookie=$_COOKIE['password'];
}
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $data=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `login` WHERE user_name='$username' and user_pass='$password'"));
    if($data){
        if(isset($_POST['check'])){
            setcookie('username',$username,time()+30);
            setcookie('password',$password,time()+30);
        }else{
            setcookie('username',$username,30);
            setcookie('password',$password,30);
        }
        $_SESSION['IsLogin']='yes';
        header('Location:dashboard.php');
        die();
    }
    else{
        if($username=="" or $password==""){
            $error="Please enter username or password";
        }else{
            $error="Please enter correct login details";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_index.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <title>Login</title>

</head>
<body>
   <div class="box">
    <form action="" method="post">
        <div class="container">

            <div class="top">
                <!-- <span>Have an account?</span> -->
                <header>Login</header>
            </div>
            <span><?php echo $error; ?></span>
            <div class="input-field">
                <input type="text" class="input" name="username" placeholder="Username" id="username" value="<?php echo $username_cookie ?>">
                <i class='bx bx-user' ></i>
            </div>

            <div class="input-field">
                <input type="Password" class="input" name="password" placeholder="Password" id="password" value="<?php echo $password_cookie ?>">
                <i class='bx bx-lock-alt'></i>
            </div>

            <div class="input-field">
                <input type="submit" class="submit" name="submit" value="Login" onclick="login()" />
            </div>

            <div class="two-col">
                <div class="one">
                <input type="checkbox" id="check" name="check">
                <label > Remember Me</label>
                </div>
                <div class="two">
                    <label><a href="#">Forgot password?</a></label>
                </div>
            </div>
        </div>
    </form>
</div>  
</body>
</html>