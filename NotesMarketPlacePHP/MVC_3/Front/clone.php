<?php include "../includes/db.php"; ?>
<?php session_start(); ?>
<?php
if(isset($_GET['n_id'])) {
    $note_id = $_GET['n_id'];
}
$clone_q = "UPDATE seller_notes SET Status = 10, CreatedDate = now() WHERE ID = '{$note_id}' ";
$clone = mysqli_query($connection, $clone_q);
if(!$clone) {
    die("Query Failed".mysqli_error($connection));
}
header("Location:dashboard.php");

?>