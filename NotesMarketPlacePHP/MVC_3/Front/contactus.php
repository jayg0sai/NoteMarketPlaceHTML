<?php include "../includes/db.php"; ?>
<?php session_start(); ?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


    if(isset($_SESSION['userid'])) {
        $select = "SELECT * FROM users WHERE ID = '{$_SESSION['userid']}' ";
        $query = mysqli_query($connection, $select);
        if(!$query) {
            die("Query Failed".mysqli_error($connection));
        }
        
        while($row = mysqli_fetch_assoc($query)) {
            $fullname = $row['FirstName'].$row['LastName'];
            $email = $row['EmailID'];            
        }
    }

if(isset($_POST['submit'])) {
    
    if(!isset($_SESSION['userid'])) {
    $fullname = mysqli_real_escape_string($connection, $_POST['fullname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    }
    $subject = mysqli_real_escape_string($connection, $_POST['subject']);
    $comment = mysqli_real_escape_string($connection, $_POST['comment']);
    
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
    $mail->setFrom($email, $fullname); 
    $mail->addAddress($config_email, 'Jay Gosai');  // This email is where you want to send the email
    $mail->addReplyTo($email, $fullname);   // If receiver replies to the email, it will be sent to this email address
 
    // Setting the email content
    $mail->IsHTML(true);  // You can set it to false if you want to send raw text in the body
    $mail->Subject = $fullname." ".$subject; //subject line of email
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
            <p><span>Hello,</span></p>
            <p>'.$comment.'</p>
        </div>
        <div class="footer">
            <p>Regards,</p>
            <p>'.$fullname.'</p>
        </div>
    </div>
</body>
</html>' ;   //Email body
    $mail->Body = $mailContent;
    $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';   //Alternate body of email
 
    if ($mail->send()) {
        $message = "";
    }
    
} catch (Exception $e) {
    $message = "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}
    
}
else {
    $message = "";
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tag -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <!-- Title -->
    <title>Contact Us</title>

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
    <link rel="stylesheet" href="css/contactus.css?v=<?php echo time(); ?>">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/contactus-responsive.css?v=<?php echo time(); ?>">

</head>

<body data-spy="scroll" data-target=".navbar">

    <!-- Navigation -->
    <?php include "navigation.php"; ?>
    
    <!-- home -->
    <section id="home">
        <div id="home-content">
            <div class="container-fluid">
                <div class="text-center">
                    <h3>Contact Us</h3>
                    <p><?php echo $message; ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact">
        <div class="container-fluid">

            <div class="form-header">
                <h3>Get in Touch</h3>
                <p>Let us know how to get back to you</p>
            </div>
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Full Name*</label>
                            <input type="text" class="form-control" id="name" name="fullname" placeholder="Enter your full name" <?php if(isset($_SESSION['userid'])) { echo "value=".$fullname." disabled"; } ?> >
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address*</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" <?php if(isset($_SESSION['userid'])) { echo "value=".$email." disabled"; } ?>>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject*</label>
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter your subject">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="comment">Comments/Questions*</label>
                            <textarea class="form-control" id="comment" name="comment" placeholder="Comments..."></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-submit">Submit</button>
            </form>
        </div>
    </section>


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
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- International JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js" integrity="sha512-DNeDhsl+FWnx5B1EQzsayHMyP6Xl/Mg+vcnFPXGNjUZrW28hQaa1+A4qL9M+AiOMmkAhKAWYHh1a+t6qxthzUw==" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" integrity="sha512-BNZ1x39RMH+UYylOW419beaGO0wqdSkO7pi1rYDYco9OL3uvXaC/GTqA5O4CVK2j4K9ZkoDNSSHVkEQKkgwdiw==" crossorigin="anonymous"></script>


    <!-- Custom JS -->
    <script src="js/contactus.js?v=<?php echo time(); ?>"></script>

</body>

</html>
