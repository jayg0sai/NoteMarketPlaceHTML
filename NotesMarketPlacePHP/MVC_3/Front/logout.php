<?php 
session_start();
unset($_SESSION["userid"]);
unset($_SESSION["firstname"]);
unset($_SESSION["lastname"]);
session_destroy();
header("Location: login.php");

?>