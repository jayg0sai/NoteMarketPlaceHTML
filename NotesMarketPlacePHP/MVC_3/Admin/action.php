<?php include "../includes/db.php"; ?>
<?php session_start(); ?>
<?php include "../includes/session_destroy.php"; ?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_GET['n_id'])) {
    $note_id = $_GET['n_id'];
}
if(isset($_GET['user'])) {
    $userid = $_GET['user'];
}
if(isset($_GET['cat'])) {
    $catid = $_GET['cat'];
}
if(isset($_GET['type'])) {
    $typeid = $_GET['type'];
}
if(isset($_GET['country'])) {
    $countryid = $_GET['country'];
}
if($_GET['action']=="approve") {
    $inr_q = "UPDATE seller_notes SET Status = 13,PublishedDate = now(), ActionedBy = '{$_SESSION['userid']}', ModifiedDate = now(), ModifiedBy = '{$_SESSION['userid']}' WHERE ID = '{$note_id}' ";
    $inr = mysqli_query($connection, $inr_q);
    if(!$inr) {
        die("Query Failed".mysqli_error($connection));
    }
    header("Location:notesunderreview.php");
}
if($_GET['action']=="delete") {
    $inr_q = "DELETE FROM seller_notes_reportedissues WHERE NoteID = '{$note_id}' AND ReportedByID = '{$userid}' ";
    $inr = mysqli_query($connection, $inr_q);
    if(!$inr) {
        die("Query Failed".mysqli_error($connection));
    }
    header("Location:spamreport.php");
}
if($_GET['action']=="deactive") {
    $d_user = mysqli_query($connection, "UPDATE users SET IsActive = b'0', ModifiedBy = '{$_SESSION['userid']}', ModifiedDate = now() WHERE ID = $userid ");
    if(!$d_user) {
        die("Query Failed".mysqli_error($connection));
    }
    
    $remove_q = "UPDATE seller_notes SET Status = 15, ActionedBy = '{$_SESSION['userid']}', ModifiedBy = '{$_SESSION['userid']}', ModifiedDate = now(),IsActive = b'0' WHERE SellerID = '{$userid}' ";
    $remove = mysqli_query($connection, $remove_q);
    if(!$remove) {
        die("Query Failed".mysqli_error($connection));
    }
    header("Location:member.php");
}
if($_GET['action']=="inactive") {
    $d_user = mysqli_query($connection, "UPDATE users SET IsActive = b'0', ModifiedBy = '{$_SESSION['userid']}', ModifiedDate = now() WHERE ID = $userid ");
    if(!$d_user) {
        die("Query Failed".mysqli_error($connection));
    }
    
    header("Location:manageadmin.php");
}
if($_GET['action']=="inactive_c") {
    $d_user = mysqli_query($connection, "UPDATE note_categories SET IsActive = b'0', ModifiedBy = '{$_SESSION['userid']}', ModifiedDate = now() WHERE ID = $catid ");
    if(!$d_user) {
        die("Query Failed".mysqli_error($connection));
    }
    
    header("Location:managecategory.php");
}
if($_GET['action']=="inactive_t") {
    $d_user = mysqli_query($connection, "UPDATE note_types SET IsActive = b'0', ModifiedBy = '{$_SESSION['userid']}', ModifiedDate = now() WHERE ID = $typeid ");
    if(!$d_user) {
        die("Query Failed".mysqli_error($connection));
    }
    
    header("Location:managetype.php");
}
if($_GET['action']=="inactive_co") {
    $d_user = mysqli_query($connection, "UPDATE country SET IsActive = b'0', ModifiedBy = '{$_SESSION['userid']}', ModifiedDate = now() WHERE ID = $countryid ");
    if(!$d_user) {
        die("Query Failed".mysqli_error($connection));
    }
    
    header("Location:managecountry.php");
}
if($_GET['action']=="approve1") {
    $inr_q = "UPDATE seller_notes SET Status = 13,PublishedDate = now(), ActionedBy = '{$_SESSION['userid']}', ModifiedDate = now(), ModifiedBy = '{$_SESSION['userid']}' WHERE ID = '{$note_id}' ";
    $inr = mysqli_query($connection, $inr_q);
    if(!$inr) {
        die("Query Failed".mysqli_error($connection));
    }
    header("Location:rejected.php");
}
if($_GET['action']=="reject") {
    $remark = $_POST['remark'];
    $inr_q = "UPDATE seller_notes SET Status = 14, ActionedBy = '{$_SESSION['userid']}', AdminRemarks = '{$remark}', ModifiedDate = now(), ModifiedBy = '{$_SESSION['userid']}' WHERE ID = '{$note_id}' ";
    $inr = mysqli_query($connection, $inr_q);
    if(!$inr) {
        die("Query Failed".mysqli_error($connection));
    }
    header("Location:notesunderreview.php");
}
if($_GET['action']=="inreview") {
    $inr_q = "UPDATE seller_notes SET Status = 12, ActionedBy = '{$_SESSION['userid']}', ModifiedDate = now(), ModifiedBy = '{$_SESSION['userid']}' WHERE ID = '{$note_id}' ";
    $inr = mysqli_query($connection, $inr_q);
    if(!$inr) {
        die("Query Failed".mysqli_error($connection));
    }
    header("Location:notesunderreview.php");
}
if($_GET['action']=="unpublish") {
    $remark = $_POST['remark'];
    $inr_q = "UPDATE seller_notes SET Status = 15, ActionedBy = '{$_SESSION['userid']}', AdminRemarks = '{$remark}', ModifiedDate = now(), ModifiedBy = '{$_SESSION['userid']}' WHERE ID = '{$note_id}' ";
    $inr = mysqli_query($connection, $inr_q);
    if(!$inr) {
        die("Query Failed".mysqli_error($connection));
    }
    $seller_name = $_GET['name'];
    $seller_email = $_GET['email'];
    $title_q = mysqli_query($connection, "SELECT * FROM seller_notes WHERE ID = '{$note_id}' ");
    $row = mysqli_fetch_assoc($title_q);
    $title = $row['Title'];
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
        $mail->Subject = "Sorry! We need to remove your notes from our portal."; //subject line of email
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
                    <p>We want to inform you that, your note '.$title.' has been removed from the portal.Please find our remarks as below - <br>'.$remark.'</p>
                </div>
                <div class="footer">
                    <p>Regards,</p>
                    <p>Notes Marketplace</p>
                </div>
            </div>
        </body>
    </html>' ;   //Email body
    $mail->Body = $mailContent;
    $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.'; //Alternate body of email
    $mail->send();
} catch (Exception $e) {
    $message = "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}
    if(isset($message)) {echo $message;}
    header("Location:published.php");
}
if($_GET['action']=="unpublish1") {
    $remark = $_POST['remark'];
    $inr_q = "UPDATE seller_notes SET Status = 15, ActionedBy = '{$_SESSION['userid']}', AdminRemarks = '{$remark}', ModifiedDate = now(), ModifiedBy = '{$_SESSION['userid']}' WHERE ID = '{$note_id}' ";
    $inr = mysqli_query($connection, $inr_q);
    if(!$inr) {
        die("Query Failed".mysqli_error($connection));
    }
    $seller_name = $_GET['name'];
    $seller_email = $_GET['email'];
    $title_q = mysqli_query($connection, "SELECT * FROM seller_notes WHERE ID = '{$note_id}' ");
    $row = mysqli_fetch_assoc($title_q);
    $title = $row['Title'];
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
        $mail->Subject = "Sorry! We need to remove your notes from our portal."; //subject line of email
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
                    <p>We want to inform you that, your note '.$title.' has been removed from the portal.Please find our remarks as below - <br>'.$remark.'</p>
                </div>
                <div class="footer">
                    <p>Regards,</p>
                    <p>Notes Marketplace</p>
                </div>
            </div>
        </body>
    </html>' ;   //Email body
    $mail->Body = $mailContent;
    $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.'; //Alternate body of email
    $mail->send();
} catch (Exception $e) {
    $message = "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}
    if(isset($message)) {echo $message;}
    header("Location:dashboard.php");
}


?>