<?php
if(!isset($_SESSION['userid']) || $_SESSION['userid'] == ''){
    header("Location: login.php");
}
?>