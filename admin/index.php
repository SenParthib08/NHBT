<?php
$username_cookie='';
$password_cookie='';
if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
    $username_cookie=$_COOKIE['username'];
    $password_cookie=$_COOKIE['password'];
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
    <!-- <form action="" method="post"> -->
        <div class="container">

            <div class="top">
                <!-- <span>Have an account?</span> -->
                <header>Login</header>
            </div>
            <span id="error"></span>
            <div class="input-field">
                <input type="text" class="input" placeholder="Username" id="username" value="<?php echo $username_cookie ?>">
                <i class='bx bx-user' ></i>
            </div>

            <div class="input-field">
                <input type="Password" class="input" placeholder="Password" id="password" value="<?php echo $password_cookie ?>">
                <i class='bx bx-lock-alt'></i>
            </div>

            <div class="input-field">
                <input type="submit" class="submit" value="Login" onclick="login()" />
            </div>

            <div class="two-col">
                <div class="one">
                <input type="checkbox" id="check">
                <label > Remember Me</label>
                </div>
                <div class="two">
                    <label><a href="#">Forgot password?</a></label>
                </div>
            </div>
        </div>
    <!-- </form> -->
</div>  
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script>
    function login(){
        var username=jQuery('#username').val();
        var password=jQuery('#password').val();
        // var check=jQuery('#check').val();
        // alert(check);
        var is_error='';
        jQuery('#error').html('');
        if(username=='' || password==''){
            jQuery('#error').html('Please enter username or password');
            is_error='yes';
        }
        if(is_error==''){
            jQuery.ajax({
                url:'check.php',
                type:'post',
                data:'username='+username+'&password='+password+'&remember='+check,
                success:function(result){
                    if(result=='correct'){
                        window.location.href='dashboard.php';
                    }else{
                        jQuery('#error').html('Please enter correct login details');
                    }
                }
            });
        }
    }
</script>