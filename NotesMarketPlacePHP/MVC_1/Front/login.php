<?php include "../includes/db.php"; ?>
<?php ob_start(); ?>
<?php session_start(); ?>
<?php 
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);
    
    $salt = '$2y$10$iusesomecrazystrings22';
    $password = crypt($password, $salt);
    $query = "SELECT * FROM users WHERE EmailID = '$email' AND IsEmailVerified = 1 ";
    $select = mysqli_query($connection, $query);
    if(!$select) {
        die("Query Failed"." ".mysqli_error($connection));
    }

    $row = mysqli_fetch_assoc($select);
    if($row > 0) {
        if($row['Password'] == $password) {
        $_SESSION['userid']=$row['ID'];
        if($row['RoleID'] == 3) {
            header("Location: search.php");
        }
        else {
            header("Location: ../Admin/dashboard.php");
        }
                if(!empty($_POST['remember'])) {
        setcookie("member_login",$_POST['email'],time()+(60*60*24*7));
        setcookie("member_password",$_POST['password'],time()+(60*60*24*7));
    } else {
        if(isset($_COOKIE['member_login'])) { 
            setcookie("member_login", ""); 
        }
        if(isset($_COOKIE['member_password'])) { 
            setcookie("member_password", ""); 
        }
    }
        } else {
            $msg = "The password you're entered is incorrect.";
            $invalid = "";
        }
    } else{
        $invalid = "<div class='up' style='margin-top:-10px;'>Your email is not registered or invalid.</div>";
        $msg = "";
    }
} else {
    $msg = "";
    $invalid = "";
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
    <title>Login</title>
    
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
    <link href="css/login.css?v=<?php echo time(); ?>" rel="stylesheet">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/login-responsive.css?v=<?php echo time(); ?>">

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
            <form action="login.php" method="post">
                <div class="form-header text-center">
                    <h1 class="heading">Login</h1>
                    <p class="text">Enter your email address and password to login</p>
                </div>

                <div id="form-email" class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php if(isset($_COOKIE['member_login'])) { echo $_COOKIE['member_login']; } ?>" id="email" placeholder="Enter your email" required>
                </div>
                <?php echo $invalid; ?>
                <div id="form-password" class="form-group">
                    <label for="password-field">Password</label>
                    <span class="psw"><a href="forgotpass.php">Forgot Password?</a></span>
                    <div class="input-group">
                        <input id="password-field" name="password" value="<?php if(isset($_COOKIE['member_password'])) { echo $_COOKIE['member_password']; } ?>" type="password" class="form-control" placeholder="Enter your password" required>
                        <span toggle="#password-field" class="fa fa-fw field-icon fa-eye-slash toggle-password">
                        <img class="eye" src="images/eye.png"></span>                        
                    </div>
                </div>
                <div class="up"><?php echo $msg; ?></div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="remember" id="Check" <?php if(isset($_COOKIE['member_login'])) { ?>checked<?php } ?> >
                    <label class="form-check-label" for="Check">Remember Me</label>
                </div>
                <button name="login" type="submit" class="btn">Login</button>
                <div class="footer text-center">
                    <p>Don't have an account? <span class="signup"><a href="signup.php">Sign Up</a></span></p>
                </div>
            </form>
        </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="js/login.js?v=<?php echo time(); ?>"></script>

</body>

</html>