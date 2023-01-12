<?php
session_start();
if(!isset($_SESSION['IsLogin'])){
    header('Location:index.php');
    die();
}
?>