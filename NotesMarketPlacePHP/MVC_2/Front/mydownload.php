<?php include "../includes/db.php"; ?>
<?php session_start(); ?>
<?php include "../includes/session_destroy.php"; ?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tag -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <!-- Title -->
    <title>My Download</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <!-- International CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css" integrity="sha512-yye/u0ehQsrVrfSd6biT17t39Rg9kNc+vENcCXZuMz2a+LWFGvXUnYuWUW6pbfYj1jcBb/C39UZw2ciQvwDDvg==" crossorigin="anonymous" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/mydownload.css?v=<?php echo time(); ?>">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/mydownload-responsive.css?v=<?php echo time(); ?>">

</head>

<body data-spy="scroll" data-target=".navbar">

    <!-- Navigation -->
    <?php include "navigation.php"; ?>

    <!-- Download -->
    <section id="download">
        <div class="container-fluid">
            <div class="row">
                <div class="tab-heading col-md-6 col-sm-12 col-xs-12">
                    <h5>My Download</h5>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <form class="form-inline" action="mydownload_search.php" method="post">
                        <div class="form-group form-text">
                            <span class="form-control-feedback"><img src="images/search-icon.png" alt="search"></span>
                            <input type="text" class="form-control" id="search1" placeholder="Search" name="search-input" required>
                        </div>
                        <button type="submit" class="btn btn-submit search" name="search">Search</button>
                    </form>
                </div>
            </div>
            <div style="overflow-x:auto;">
            <table class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Sr No.</th>
                        <th scope="col">Note Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Seller</th>
                        <th scope="col">Sell Type</th>
                        <th scope="col">Price</th>
                        <th scope="col">Downloaded Date/Time</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                   
                    <?php
                    
                        if(isset($_GET['page'])) {
                            $page = $_GET['page'];
                        } else {
                            $page = 1;
                        }
                        if($page == "" || $page == 1) {
                            $page1 = 0;
                        } else {
                            $page1 = ($page*10) - 10;
                        }
                        $download_count = "SELECT * FROM downloads WHERE Downloader = '{$_SESSION['userid']}' AND IsSellerHasAllowedDownload = b'1' ";
                        $find_count = mysqli_query($connection, $download_count);
                        if(!$find_count) {
                                die("Query Failed".mysqli_error($connection));
                            }
                        $down_count = mysqli_num_rows($find_count);

                        $page_count = ceil($down_count / 10);
                        $download_query = "SELECT * FROM downloads WHERE Downloader = '{$_SESSION['userid']}' AND IsSellerHasAllowedDownload = b'1' ORDER BY AttachmentDownloadDate DESC LIMIT $page1,10 ";
                        $download = mysqli_query($connection, $download_query);
                        if(!$download) {
                            die("Query Failed".mysqli_error($connection));
                        }
                        $count = 0;
                        while($row = mysqli_fetch_assoc($download)) {
                            $download_id = $row['ID'];
                            $note_id = $row['NoteID'];
                            $title = $row['NoteTitle'];
                            $category = $row['NoteCategory'];
                            $seller = $row['Seller'];
                            $seller_email_query = mysqli_query($connection,"SELECT * FROM users WHERE ID = '{$seller}' ");
                            if(!$seller_email_query) {
                                die("Query Failed".mysqli_error($connection));
                            }
                            $email_fetch = mysqli_fetch_assoc($seller_email_query);
                            $seller_email = $email_fetch['EmailID'];
                            $seller_name = $email_fetch['FirstName'].$email_fetch['LastName'];
                            $selltype = $row['IsPaid'];
                            $price = $row['PurchasedPrice'];
                            $date = $row['AttachmentDownloadDate'];
                            

?>
                    <tr>
                        <td><?php echo ++$count+$page1; ?></td>
                        <td><a href="notedetails.php?n_id=<?php echo $note_id; ?>"><?php echo $title; ?></a></td>
                        <td><?php echo $category; ?></td>
                        <td><?php echo $seller_email; ?></td>
                        <td><?php if($selltype == 0) { echo "Free"; } else {
                                echo "Paid";
                            } ?></td>
                        <td><?php echo "$".$price; ?></td>
                        <td><?php echo $date; ?></td>
                        <td class="act">
                            <a href="notedetails.php?n_id=<?php echo $note_id; ?>" class="eye"><img src="images/eye.png" alt="eye"></a>
                        </td>
                        <td class="act">
                            <div class="dropdown">
                                <a class="btn" role="button" id="dropdownDotLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="images/dots.png" alt="dots"></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownDotLink1">
                                    <a class="dropdown-item same" href="file_download.php?n_id=<?php echo $note_id; ?>">Download Note</a>
                                    <!-- Button trigger modal -->
                                    <a href="#" class="dropdown-item same" data-toggle="modal" data-target="#review<?php echo $count; ?>">Add Review/Feedback</a>
                                    <a class="dropdown-item same" href="#" data-toggle="modal" data-target="#spam<?php echo $count; ?>">Report as inappropriate/spam</a>
                                </div>
                            </div> 
                            
                            <!-- Modal -->
                            <div class="modal fade" id="review<?php echo $count; ?>" tabindex="-1" role="dialog" aria-labelledby="review<?php echo $count; ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <img src="images/close.png">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="mydownload.php?n_id=<?php echo $note_id; ?>" method="post">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div id="form-header">
                                                                <h5>Add Review</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="rate">
                                                                <input type="radio" id="<?php echo $count; ?>star5" name="rate" value="5" />
                                                                <label for="<?php echo $count; ?>star5" title="text">5 stars</label>
                                                                <input type="radio" id="<?php echo $count; ?>star4" name="rate" value="4" />
                                                                <label for="<?php echo $count; ?>star4" title="text">4 stars</label>
                                                                <input type="radio" id="<?php echo $count; ?>star3" name="rate" value="3" />
                                                                <label for="<?php echo $count; ?>star3" title="text">3 stars</label>
                                                                <input type="radio" id="<?php echo $count; ?>star2" name="rate" value="2" />
                                                                <label for="<?php echo $count; ?>star2" title="text">2 stars</label>
                                                                <input type="radio" id="<?php echo $count; ?>star1" name="rate" value="1" />
                                                                <label for="<?php echo $count; ?>star1" title="text">1 star</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="comments">Comments*</label>
                                                                <textarea type="text" class="form-control" id="comments" name="comment" placeholder="Comments..." required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" name="submit" class="btn btn-submit mb-2">Submit</button>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="spam<?php echo $count; ?>" tabindex="-1" role="dialog" aria-labelledby="spam<?php echo $count; ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <img src="images/close.png">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="mydownload.php?n_id=<?php echo $note_id; ?>" method="post">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div id="form-header">
                                                                <h5><?php echo $title; ?></h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="comments">Remarks*</label>
                                                                <textarea type="text" class="form-control" id="remarks" name="remark" placeholder="Remarks..." required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" name="spam" class="btn btn-spam" onclick="return confirm('Are you sure you want to do that?');">Report an issue</button>
                                                    <button class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cancel</button>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
                    <?php } if($count == 0) { echo "<h2>No record found</h2>";}
                    if(isset($_GET['n_id'])) {
                        $note_id = $_GET['n_id'];
                            
                        function review_exists($note_id) {
                        global $connection;
                        $re_query = "SELECT * FROM seller_notes_reviews WHERE NoteID = '{$note_id}' AND ReviewedByID = {$_SESSION['userid']} ";
                        $re_result = mysqli_query($connection, $re_query);
                        if(mysqli_num_rows($re_result) > 0) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                        
                            if(isset($_POST['submit'])) {
                                
                                
                                $rate = $_POST['rate'];
                                $comment = $_POST['comment'];
                                if(!review_exists($note_id)) {
                                $review_query = "INSERT INTO `seller_notes_reviews` (`NoteID`, `ReviewedByID`, `AgainstDownloadsID`, `Ratings`, `Comments`, `CreatedDate`, `CreatedBy`) VALUES ('{$note_id}', '{$_SESSION['userid']}', '{$download_id}', '{$rate}', '{$comment}', now(), '{$_SESSION['userid']}') ";
                                $review = mysqli_query($connection,$review_query);
                                if(!$review) {
                                    die("Query Failed".mysqli_error($connection));
                                }
                                } else {
                                    $re_update_query = "UPDATE `seller_notes_reviews` SET `Ratings` = '{$rate}', `Comments` = '{$comment}', `ModifiedDate` = now(), `ModifiedBy` = '{$_SESSION['userid']}' WHERE NoteID = '{$note_id}' AND ReviewedByID = '{$_SESSION['userid']}' ";
                                    $re_update = mysqli_query($connection,$re_update_query);
                                    if(!$re_update) {
                                    die("Query Failed".mysqli_error($connection));
                                }
                                    
                                }
                            }
                        
                            if(isset($_POST['spam'])) {
                                $remark = $_POST['remark'];
                                
                                $spam_query = "INSERT INTO `seller_notes_reportedissues` (`NoteID`, `ReportedByID`, `AgainstDownloadsID`, `Remarks`, `CreatedDate`, `CreatedBy`) VALUES ('{$note_id}', '{$_SESSION['userid']}', '{$download_id}', '{$remark}', now(), '{$_SESSION['userid']}') ";
                                $spam = mysqli_query($connection,$spam_query);
                                if(!$spam) {
                                    die("Query Failed".mysqli_error($connection));
                                }
                                $reviewer_query = "SELECT * FROM users WHERE ID = '{$_SESSION['userid']}' ";
                                $reviewer = mysqli_query($connection, $reviewer_query);
                                if(!$reviewer) {
                                    die("Query Failed".mysqli_error($connection));
                                }
                                $reviewer_row = mysqli_fetch_assoc($reviewer);
                                $reviewer_name = $reviewer_row['FirstName'].$reviewer_row['LastName'];
                                
                                
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
                                    $mail->addAddress($config_email, 'Jay Gosai');  // This email is where you want to send the email
                                    $mail->addReplyTo($config_email, 'Jay Gosai');   // If receiver replies to the email, it will be sent to this email address

                                    // Setting the email content
                                    $mail->IsHTML(true);  // You can set it to false if you want to send raw text in the body
                                    $mail->Subject = $reviewer_name." Reported an issue for ".$title; //subject line of email
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
                                            <p><span>Hello Admins,</span></p>
                                            <p>We want to inform you that, '.$reviewer_name.' Reported an issue for '.$seller_name.'’s Note with title <Note Title>. Please look at the notes and take required actions.</p>
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
                            }
                        }
                    
                    ?>
            </table>
            </div>
        </div>
    </section>
    <!-- Pagination -->
    <nav id="pagination" class="download-p" aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            if($page>=2) {
                   echo '<li id="prev" class="page-item"><a class="page-link" href="mydownload.php?page='.($page - 1).'"><img src="images/left-arrow.png" alt="arrow"></a></li>';
            }
            
            for($i = 1; $i <= $page_count; $i++) {
                if($i == $page) {
                    echo '<li class="page-item number active"><a class="page-link" href="mydownload.php?page='.$i.'">'.$i.'</a></li>';
                } else {
                    echo '<li class="page-item number"><a class="page-link" href="mydownload.php?page='.$i.'">'.$i.'</a></li>';
                }
                
                
            }
            if($page<$page_count)
                   echo '<li id="next" class="page-item"><a class="page-link" href="mydownload.php?page='.($page + 1).'"><img src="images/right-arrow.png" alt="arrow"></a></li>';
                      
            ?>
        </ul>
    </nav>

    <!-- footer -->
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-8 col-12">
                    <div id="copyright">
                        <p>
                            Copyright &copy; Tatwasoft All rights reserved.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-4 col-12">
                    <ul class="social-list">
                        <li><a href="#"><img src="images/facebook.png" alt="facebook" class="img-responsive img-circle"></a></li>
                        <li><a href="#"><img src="images/twitter.png" alt="twitter" class="img-responsive img-circle"></a></li>
                        <li><a href="#"><img src="images/linkedin.png" alt="linkedin" class="img-responsive img-circle"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- International JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js" integrity="sha512-DNeDhsl+FWnx5B1EQzsayHMyP6Xl/Mg+vcnFPXGNjUZrW28hQaa1+A4qL9M+AiOMmkAhKAWYHh1a+t6qxthzUw==" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" integrity="sha512-BNZ1x39RMH+UYylOW419beaGO0wqdSkO7pi1rYDYco9OL3uvXaC/GTqA5O4CVK2j4K9ZkoDNSSHVkEQKkgwdiw==" crossorigin="anonymous"></script>


    <!-- Custom JS -->
    <script src="js/mydownload.js?v=<?php echo time(); ?>"></script>

</body>

</html>
