<?php include "../includes/db.php"; ?>
<?php
if(isset($_GET['n_id'])) {
    $note_id = $_GET['n_id'];
}

$delete_query = " UPDATE seller_notes SET Status = 15 WHERE ID = '{$note_id}' ";
$delete = mysqli_query($connection, $delete_query);
if(!$delete) {
    die("Query Failed".mysqli_error($connection));
}

header("Location:dashboard.php");

?>