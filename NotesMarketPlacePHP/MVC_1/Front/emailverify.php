<?php include "../includes/db.php"; ?>
<?php
if($_GET['key'])
{
global $connection;
$email = $_GET['key'];
$query = mysqli_query($connection,"SELECT * FROM `users` WHERE `EmailID`='{$email}';"
);
if(!$query) {
    die("Query Failed <br>". mysqli_error($connection)) ;
}
if (mysqli_num_rows($query) > 0) {
$row = mysqli_fetch_assoc($query);
if($row['IsEmailVerified'] == b'0'){
    $active = "UPDATE `users` SET `IsEmailVerified` = b'1', `IsActive` = b'1' WHERE `EmailID`='{$email}'";
mysqli_query($connection,$active);
    if(!$active) {
        echo ("Query Failed". mysqli_error($connection)) ;
    }
$msg = "<img src='images/check.png' width=20px height=20px>" . "Your account has been successfully created.";
}else{
$msg = "You have already verified your account with us";
}
} else {
$msg = "This email has been not registered with us";
}
}
else
{
$msg = "Danger! Your something goes to wrong.";
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

                    <?php echo $msg; ?>
                </div>
                <div class="form-group form-text">
                    <label for="firstname">First Name*</label>
                    <input type="text" class="form-control" name="firstname" placeholder="Enter your first name" pattern="[a-zA-Z]+" required>
                </div>
                <div class="form-group form-text">
                    <label for="lastname">Last Name*</label>
                    <input type="text" class="form-control" name="lastname" placeholder="Enter your last name" pattern="[a-zA-Z]+" required>
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
                <div id="message">
                    <p id="length" class="invalid">Password contains minimum <b>8 characters</b></p>
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