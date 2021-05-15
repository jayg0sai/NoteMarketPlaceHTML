<?php include "../includes/db.php"; ?>
<?php session_start(); ?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_GET['n_id']) && $_GET['d_id']) {
    $note_id = $_GET['n_id'];
    $downloader = $_GET['d_id'];
    
    $buyer_query = "SELECT * FROM users WHERE ID = '{$downloader}' ";
    $buyer_details = mysqli_query($connection,$buyer_query);
    if(!$buyer_details) {
        die("Query Failed ".mysqli_error($connection));
    }
    $buyer_row = mysqli_fetch_assoc($buyer_details);
    $buyer_name = $buyer_row['FirstName'].$buyer_row['LastName'];
    $buyer_email = $buyer_row['EmailID'];
    
    $attach_path_query = "SELECT * FROM seller_notes_attachment WHERE NoteID = '{$note_id}' ";
    $attach_path = mysqli_query($connection, $attach_path_query);
    if(!$attach_path) {
        die("Query Failed".mysqli_error($connection));
    }
    $path_row = mysqli_fetch_assoc($attach_path);
    $path = $path_row['FilePath'];
    
    $allow_query = "UPDATE downloads SET IsSellerHasAllowedDownload = b'1', AttachmentPath = '{$path}' WHERE NoteID = '{$note_id}' AND Downloader = '{$downloader}' ";
    $allow = mysqli_query($connection, $allow_query);
    if(!$allow) {
        die("Query Failed".mysqli_error($connection));
    }
    
    
    $seller_name = $_SESSION['firstname'].$_SESSION['lastname'];
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
                                    $mail->addAddress($buyer_email, $buyer_name);  // This email is where you want to send the email
                                    $mail->addReplyTo($config_email, 'Jay Gosai');   // If receiver replies to the email, it will be sent to this email address

                                    // Setting the email content
                                    $mail->IsHTML(true);  // You can set it to false if you want to send raw text in the body
                                    $mail->Subject = $seller_name." Allows you to download a note"; //subject line of email
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
                                            <p><span>Hello '.$buyer_name.',</span></p>
                                            <p>We would like to inform you that, '.$seller_name.' Allows you to download a note.Please login and see My Download tabs to download particular note.</p>
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
    
    
                    header("Location:buyerrequest.php");
}

?>