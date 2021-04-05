<?php include "../includes/db.php"; ?>
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

global $connection;
if(isset($_POST['forgot'])) {
    $email = $_POST['email'];
    function email_exists($email) {
        global $connection;
        $query = "SELECT EmailID FROM users WHERE EmailID = '$email' ";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    if(email_exists($email)) {
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        $password = substr(str_shuffle($data), 0, 8);
        $salt = '$2y$10$iusesomecrazystrings22';
        $secure_password = crypt($password, $salt);
        $forgot = "UPDATE users SET Password = '{$secure_password}' WHERE EmailID = '{$email}' ";
        $forgot_query = mysqli_query($connection, $forgot);
        if(!$forgot_query) {
            die("Query Failed".mysqli_error($connection));
        }
        $select = "SELECT * FROM users WHERE EmailID = '{$email}' ";
        $select_query = mysqli_query($connection, $select);
        if(!$select_query) {
            die("Query Failed".mysqli_error($connection));
        }
        
        while($row = mysqli_fetch_assoc($select_query)) {
            $firstname = $row['FirstName'];
        }
        
//include PHPMailer classes to your PHP file for sending email
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
 
    $config_email = 'jaygosai2000@gmail.com';
    $mail->Username = $config_email; // YOUR gmail email which will be used as sender and PHPMailer configuration 
    $mail->Password = '9724725277';
    $mail->setFrom($config_email, 'jay gosai'); 
    $mail->addAddress($email, $firstname);  // This email is where you want to send the email
    $mail->addReplyTo($config_email, 'jay gosai');   // If receiver replies to the email, it will be sent to this email address
 
    // Setting the email content
    $mail->IsHTML(true);  // You can set it to false if you want to send raw text in the body
    $mail->Subject = "New Temporary Password has been created for you" ; //subject line of email
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
        <div id="heading">
            <h3>Forgot Password</h3>
        </div>
        <div id="message">
            <p><span>Hello,</span></p>
            <p>We have generated a new password for you.</p>
            <p>Password:'.$password.'</p>
        </div>
        <div class="footer">
            <p>Regards,</p>
            <p>Notes Marketplace</p>
            <p>Copyright &copy; Tatwasoft All rights reserved.</p>
        </div>
    </div>
</body>
</html>' ;   //Email body
    $mail->Body = $mailContent;
    $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';   //Alternate body of email
 
    if ($mail->send()) {
       $msg = "Your password has been changed successfully and newly generated password is sent on your registered email address."; 
    } else {
        $msg = "";
    }
    
} catch (Exception $e) {
    $msg = "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}

    }
    else {
        $msg = "Your email is not registered";
    }
} else {
    $msg = "";
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
    <title>Forgot Password</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/forgotpass.css?v=<?php echo time(); ?>">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/forgotpass-responsive.css?v=<?php echo time(); ?>">

</head>

<body id="bg-img">
    <div class="center">
        <div id="logo">
            <div class="row text-center">
                <div class="col-md-12">
                    <a href="#"><img src="images/top-logo.png" alt="logo"></a>
                </div>
            </div>
        </div>
        <div id="content-box">
            <form action="forgotpass.php" method="post">
                <div class="form-header text-center">
                    <h1 class="heading">Forgot Password?</h1>
                    <p class="text">Enter your email to reset your password</p>
                </div>

                <div class="up text-center" role="alert">

                    <?php echo $msg; ?>
                </div>
                <div id="form-email" class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" required>
                </div>
                <button type="submit" name="forgot" class="btn">Submit</button>
            </form>
        </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="js/forgotpass.js?v=<?php echo time(); ?>"></script>
</body>

</html>