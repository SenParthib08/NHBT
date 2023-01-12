<?php
session_start();
include('../config/config.php');
unset($_SESSION['IsLogin']);
header('Location:index.php');
?>