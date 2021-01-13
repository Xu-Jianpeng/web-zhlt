<?php
session_save_path("C:\ComsenzEXP\PHP5\\temp");
ob_start();
session_start();
session_destroy();
header("location:index.php");
?>