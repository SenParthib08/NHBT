<?php
session_start();
if(isset($_POST['data']) && $_POST['data']=='time_out'){
    if((time()-$_SESSION['LastActiveTime'])>1800){
        echo "logout";
    }
}else{
    if(isset($_SESSION['LastActiveTime'])){
        if((time()-$_SESSION['LastActiveTime'])>1800){
            header('Location:logout.php');
            die();
        }
    }
    $_SESSION['LastActiveTime']=time();
    if(!isset($_SESSION['IsLogin'])){
        header('Location:index.php');
        die();
    }
}
?>