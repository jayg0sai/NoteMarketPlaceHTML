<?php include "../includes/db.php"; ?>
<?php ob_start(); ?>
<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$message = "";
$msg = "";
if(isset($_POST['signup'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    $firstname = mysqli_real_escape_string($connection, $firstname);
    $lastname = mysqli_real_escape_string($connection, $lastname);
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);
    $confirm_password = mysqli_real_escape_string($connection, $confirm_password);
    
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
    if(!email_exists($email)) {
if(isset($_POST['password'])) {
  $password = $_POST['password'];
  $number = preg_match('@[0-9]@', $password);
  $uppercase = preg_match('@[A-Z]@', $password);
  $lowercase = preg_match('@[a-z]@', $password);
  $specialChars = preg_match('@[^\w]@', $password);
 
  if(strlen($password) < 6 || strlen($password) > 24 || !$number || !$uppercase || !$lowercase || !$specialChars) {
    $msg = "Password must be between 6 and 24 characters in length and must contain at least one number,<br> one upper case letter,<br> one lower case letter and<br> one special character.";
  } else {
    
  
    if($password === $confirm_password) {
    
        $salt = '$2y$10$iusesomecrazystrings22';
        $password = crypt($password, $salt);
        $register = "INSERT INTO `users` (`RoleID`,`FirstName`,`LastName`,`EmailID`,`Password`,`CreatedDate`) VALUES (3,'{$firstname}','{$lastname}','{$email}','{$password}',now())";
            
        $register_query = mysqli_query($connection, $register);
            if(!$register_query) {
                die("Query Failed <br>". mysqli_error($connection)) ;
            }
            
            $user_id = mysqli_insert_id($connection);
    
        $update = "update users set CreatedBy = {$user_id} WHERE ID = {$user_id}";
        $update_query = mysqli_query($connection, $update);
            if(!$update_query) {
                die("Query Failed <br>". mysqli_error($connection)) ;
            }
            
$link = "localhost/NotesMarketPlace/Front/emailverify.php?key=".$_POST['email'];
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
 
    $config_email = 'gosaijay323@gmail.com';
    $mail->Username = $config_email; // YOUR gmail email which will be used as sender and PHPMailer configuration 
    $mail->Password = 'Jaygosai@323';
    $mail->setFrom($config_email, 'jay gosai'); 
    $mail->addAddress($email, $firstname);  // This email is where you want to send the email
    $mail->addReplyTo($config_email, 'jay gosai');   // If receiver replies to the email, it will be sent to this email address
 
    // Setting the email content
    $mail->IsHTML(true);  // You can set it to false if you want to send raw text in the body
    $mail->Subject = "Email Verification" ; //subject line of email
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
            <h3>Email Verification</h3>
        </div>
        <div id="message">
            <p><span>Dear, '. $firstname.$lastname .'</span></p>
            <p>Thank you for signing up with us. Please click on below button to verify your email address and to do login.</p>
        </div>
        <div class="btn-mail">
            <a href ='. $link .' class="btn" title="Verify Email Address" role="button">Verify Email Address</a>
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
        header("Location: thanks.php");
    } else {
        $message = "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
    }
    
} catch (Exception $e) {
    $message = "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}
    
}
    else {
        $message = "password is not match with confirm password";
    }
} } }
    else {
    $message = "You already have an account<br>please go below and click on login<br>or verify your email"; 
    } 
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
    <title>Sign Up</title>

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
    <link rel="stylesheet" href="css/signup.css?v=<?php echo time(); ?>">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/signup-responsive.css?v=<?php echo time(); ?>">

</head>

<body id="bg-img">
    <div class="center">
        <div id="logo">
            <div class="row text-center">
                <div class="col-md-12">
                    <a href="home.php"><img src="images/top-logo.png" alt="logo"></a>
                </div>
            </div>
        </div>
        <div id="content-box">
            <form action="signup.php" method="post">
                <div class="form-header text-center">
                    <h1 class="heading">Create an Account</h1>
                    <p class="text">Enter your details to signup</p>
                </div>

                <div class="up text-center" role="alert">

                    <?php echo $message; ?>
                </div>
                <div class="form-group form-text">
                    <label for="firstname">First Name*</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter your first name" required>
                </div>
                <div class="form-group form-text">
                    <label for="lastname">Last Name*</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter your last name" required>
                </div>
                <div id="form-email" class="form-group">
                    <label for="email">Email*</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group form-password">
                    <label for="password-field1">Password</label>
                    <div class="input-group">
                        <input id="password-field1" name="password" type="password" class="form-control" placeholder="Enter your password" required>
                        <span toggle="#password-field1" class="fa fa-fw fa-eye-slash field-icon toggle-password1"><img src="images/eye.png" class="eye1" alt="eye"></span>
                    </div>
                </div>
                <div style="color:#d9534f;"><?php echo $msg; ?></div>
                <div id="message">
                    <h6 style="margin-left:-30px;">Password must contain the following:</h6>
                    <p id="letter" class="invalid">At least one <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">At least one <b>capital (uppercase)</b> letter</p>
                    <p id="number" class="invalid">At least one <b>number</b></p>
                    <p id="special" class="invalid">At least one <b>special character</b></p>
                    <p id="length" class="invalid">Length between <b>6 to 24 characters</b></p>
                </div>
                <div class="form-group form-password">
                    <label for="password-field2">Confirm Password</label>
                    <div class="input-group">
                        <input id="password-field2" name="confirm_password" type="password" class="form-control" placeholder="Re-enter your password" required>
                        <span toggle="#password-field2" class="fa fa-fw fa-eye-slash field-icon toggle-password2"><img src="images/eye.png" class="eye2" alt="eye"></span>
                    </div>
                </div>
                <button type="submit" name="signup" class="btn">Sign up</button>
                <div class="footer text-center">
                    <p>Already have an account? <span class="login"><a href="login.php">Login</a></span></p>
                </div>
            </form>
        </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="js/signup.js?v=<?php echo time(); ?>"></script>
</body>

</html>
