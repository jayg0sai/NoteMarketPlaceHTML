<?php include "../includes/db.php"; ?>
<?php session_start(); ?>
<?php 
if(isset($_GET['n_id'])) {
    $note_id = $_GET['n_id'];
}
if(isset($_GET['isPaid'])) {
    $paid_free = $_GET['isPaid'];
}

$select = "SELECT * FROM seller_notes_attachment WHERE NoteID = '{$note_id}' ";
$query = mysqli_query($connection,$select);
if(!$query) {
    die("Query Failed".mysqli_error($connection));
}
$row = mysqli_fetch_assoc($query);
if($row > 0) {
$filepath = $row['FilePath'];
}
$note_select = "SELECT * FROM seller_notes WHERE ID = '{$note_id}' ";
$note_query = mysqli_query($connection,$note_select);
if(!$note_query) {
    die("Query Failed".mysqli_error($connection));
}
while($row = mysqli_fetch_assoc($note_query)) {
    $seller = $row['SellerID'];
    $ispaid = $row['IsPaid'];
    $price = $row['SellingPrice'];
    $title = $row['Title'];
    $category = $row['Category'];
}


if($paid_free == 0) {

if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        readfile($filepath);
    }

$insert_to_down = "INSERT INTO `downloads` (`NoteID`, `Seller`, `Downloader`, `IsSellerHasAllowedDownload`, `AttachmentPath`, `IsAttachmentDownload`, `AttachmentDownloadDate`, `IsPaid`, `PurchasedPrice`, `NoteTitle`, `NoteCategory`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`) VALUES ('{$note_id}', '{$seller}', '{$_SESSION['userid']}', b'1', '{$filepath}', b'1', now() , '{$ispaid}', '{$price}', '{$title}', '{$category}', now(), '{$_SESSION['userid']}', now(), '{$_SESSION['userid']}')";
$insert_query = mysqli_query($connection, $insert_to_down);
if(!$insert_query) {
    die("Query Failed".mysqli_error($connection));
}

} else {
    

$insert_only_down = "INSERT INTO `downloads` (`NoteID`, `Seller`, `Downloader`, `IsSellerHasAllowedDownload`, `IsAttachmentDownload`,`IsPaid`, `PurchasedPrice`, `NoteTitle`, `NoteCategory`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`) VALUES ('{$note_id}', '{$seller}', '{$_SESSION['userid']}', b'0',  b'0', '{$ispaid}', '{$price}', '{$title}', '{$category}', now(), '{$_SESSION['userid']}', now(), '{$_SESSION['userid']}')";
$insert_only_query = mysqli_query($connection, $insert_only_down);
if(!$insert_only_query) {
    die("Query Failed".mysqli_error($connection));
}
    
}

?>