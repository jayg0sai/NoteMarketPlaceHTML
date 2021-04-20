<?php include "../includes/db.php"; ?>
<?php session_start(); ?>
<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
function download_exists($note_id) {
        global $connection;
        $download_exists_query = "SELECT * FROM downloads WHERE NoteID = '$note_id' AND Downloader = '{$_SESSION['userid']}' ";
        $download_exists = mysqli_query($connection, $download_exists_query);
        if(mysqli_num_rows($download_exists) > 0) {
            return true;
        } else {
            return false;
        }
    }
if(!download_exists($note_id)) {    

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

$seller_query = "SELECT * FROM users WHERE ID = '{$seller}' ";
$seller_details = mysqli_query($connection,$seller_query);
if(!$seller_details) {
    die("Query Failed ".mysqli_error($connection));
}
    $seller_row = mysqli_fetch_assoc($seller_details);
    $seller_name = $seller_row['FirstName'].$seller_row['LastName'];
    $seller_email = $seller_row['EmailID'];

if($_SESSION['userid'] == $seller) {
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
} else {
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

$insert_to_down = "INSERT INTO `downloads` (`NoteID`, `Seller`, `Downloader`, `IsSellerHasAllowedDownload`, `AttachmentPath`, `IsAttachmentDownload`, `AttachmentDownloadDate`, `IsPaid`, `PurchasedPrice`, `NoteTitle`, `NoteCategory`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`) VALUES ('{$note_id}', '{$seller}', '{$_SESSION['userid']}', b'1', '{$filepath}', b'1', now() , b'{$ispaid}', '{$price}', '{$title}', '{$category}', now(), '{$_SESSION['userid']}', now(), '{$_SESSION['userid']}')";
$insert_query = mysqli_query($connection, $insert_to_down);
if($insert_query) {
    die("Query Failed".mysqli_error($connection));
}

} else {
    

$insert_only_down = "INSERT INTO `downloads` (`NoteID`, `Seller`, `Downloader`, `IsSellerHasAllowedDownload`, `IsAttachmentDownload`,`IsPaid`, `PurchasedPrice`, `NoteTitle`, `NoteCategory`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`) VALUES ('{$note_id}', '{$seller}', '{$_SESSION['userid']}', b'0',  b'0', '{$ispaid}', '{$price}', '{$title}', '{$category}', now(), '{$_SESSION['userid']}', now(), '{$_SESSION['userid']}')";
$insert_only_query = mysqli_query($connection, $insert_only_down);
if(!$insert_only_query) {
    die("Query Failed".mysqli_error($connection));
}
    $buyer_name = $_SESSION['firstname'].$_SESSION['lastname'];
    require_once __DIR__ . '/../src/Exception.php';
                                require_once __DIR__ . '/../src/PHPMailer.php';
                                require_once __DIR__ . '/../src/SMTP.php';
                                
                                
                                $mail = new PHPMailer(true);

                                try {

                                    $mail->isSMTP();
                                    $mail->Host = 'smtp.gmail.com';
                                    $mail->SMTPAuth = true;
                                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                                    $mail->Port = 587;  // This is fixed port for gmail SMTP

                                    $config_email = 'gosaijay323@gmail.com';
                                    $mail->Username = $config_email; // YOUR gmail email which will be used as sender and PHPMailer configuration 
                                    $mail->Password = 'Jaygosai@323';
                                    $mail->setFrom($config_email, 'Jay Gosai'); 
                                    $mail->addAddress($seller_email, $seller_name);  // This email is where you want to send the email
                                    $mail->addReplyTo($config_email, 'Jay Gosai');   // If receiver replies to the email, it will be sent to this email address

                                    // Setting the email content
                                    $mail->IsHTML(true);  // You can set it to false if you want to send raw text in the body
                                    $mail->Subject = $buyer_name." wants to purchase your notes"; //subject line of email
                                    $mail->AddEmbeddedImage('images/logo.png', 'logo');
                                    $mailContent = 
                                        '
                                <!DOCTYPE html>
                                <html lang="en">
                                <head>
                                    <!-- Meta tag -->
                                    <meta charset="UTF-8">
                                    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                                    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
                                    <!-- Google Fonts -->
                                    <link rel="preconnect" href="https://fonts.gstatic.com">
                                    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
                                    <style>
                                        body {
                                    font-family: "Open Sans", sans-serif;
                                }
                                .mail {
                                padding: 30px ;
                                margin:auto;
                                }
                                .mail h3 {
                                    font-size: 26px;
                                    line-height: 30px;
                                    font-weight: 600;
                                    color: #6255a5;
                                    margin: 50px 0 20px;
                                }

                                #message p {
                                    font-size: 16px;
                                    line-height: 20px;
                                    font-weight: 400;
                                    color: #333333;
                                    margin: 10px 0;
                                }

                                #message p span {
                                    font-size: 18px;
                                    line-height: 22px;
                                    font-weight: 600;
                                    color: #333333;
                                }
                                        .btn-mail {
                                                margin: 20px 0;
                                        }
                                a.btn {
                                    color: #fff;
                                    background-color: #6255a5;
                                    border-radius: 3px;
                                    padding: 7px 20px;
                                    font-weight: 500;
                                    font-size: 18px;
                                    line-height: 30px;
                                    text-transform: uppercase;
                                    text-decoration:none
                                }
                                 </style>

                                </head>

                                <body>
                                    <div class="container mail">
                                        <div id="logo">
                                            <a href="#"><img src="cid:logo" alt="logo"></a>
                                        </div>
                                        <div id="message">
                                            <p><span>Hello '.$seller_name.',</span></p>
                                            <p>We would like to inform you that, '.$buyer_name.' wants to purchase your notes. Please see Buyer Requests tab and allow download access to Buyer if you have received the payment from him.</p>
                                        </div>
                                        <div class="footer">
                                            <p>Regards,</p>
                                            <p>Notes Marketplace</p>
                                        </div>
                                    </div>
                                </body>
                                </html>' ;   //Email body
                                    $mail->Body = $mailContent;
                                    $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';   //Alternate body of email

                                    $mail->send();

                                } catch (Exception $e) {
                                    $message = "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
                                }
                                if(isset($message)) {echo $message;}
    
    
    header("Location: notedetails.php?n_id=".$note_id);
    
} }
} else {
    function Isallowed($note_id) {
        global $connection;
        $Isallowed_query = "SELECT * FROM downloads WHERE NoteID = '$note_id' AND Downloader = '{$_SESSION['userid']}' AND IsSellerHasAllowedDownload = b'1' ";
        $isallowed_result = mysqli_query($connection, $Isallowed_query);
        if(mysqli_num_rows($isallowed_result) > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    if(Isallowed($note_id)) {
    
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
    
    $date_update = "UPDATE downloads SET IsAttachmentDownload = b'1', AttachmentDownloadDate = now() WHERE NoteID = '{$note_id}' AND Downloader = '{$_SESSION['userid']}' ";
    $date = mysqli_query($connection,$date_update);
        if(!$date) {
            die("Query Failed".mysqli_error($connection));
        }
    
    header("Location: notedetails.php?n_id=".$note_id);
    } else {
        header("Location: notedetails.php?n_id=".$note_id);
    }
}
?>