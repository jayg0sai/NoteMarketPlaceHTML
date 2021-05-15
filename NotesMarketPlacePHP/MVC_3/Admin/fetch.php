<?php include "../includes/db.php"; ?>
<?php session_start(); ?>
<?php include "../includes/session_destroy.php"; ?>
<?php
//fetch.php
if(isset($_POST['seller'])) {
    $seller_search = $_POST['seller'];
    $download_count = "SELECT * FROM seller_notes WHERE Status IN (11,12) AND Seller = $seller_search ";
    $download_query = "SELECT * FROM seller_notes WHERE Status IN (11,12) AND Seller = $seller_search ORDER BY CreatedDate LIMIT $page1,5 ";
} else {
    $download_count = "SELECT * FROM seller_notes WHERE Status IN (11,12) ";
    $download_query = "SELECT * FROM seller_notes WHERE Status IN (11,12) ORDER BY CreatedDate LIMIT $page1,5 ";
}

?>