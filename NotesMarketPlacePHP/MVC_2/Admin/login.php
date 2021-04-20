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
    <link rel="stylesheet" href="css/login.css">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/login-responsive.css">

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
            <form>
                <div class="form-header text-center">
                    <h1 class="heading">Login</h1>
                    <p class="text">Enter your email address and password to login</p>
                </div>

                <div id="form-email" class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email" value="notesmarketplace77@gmail.com" required>
                </div>
                <div id="form-password" class="form-group">
                    <label for="password-field">Password</label>
                    <span class="psw"><a href="#">Forgot Password?</a></span>
                    <div class="input-group">
                        <input id="password-field" type="password" class="form-control" value="secret" placeholder="Enter your password" required>
                        <span toggle="#password-field" class="fa fa-fw field-icon fa-eye-slash toggle-password">
                        <img class="eye" src="images/eye.png"></span>                        
                    </div>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="Check">
                    <label class="form-check-label" for="Check">Remember Me</label>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="footer text-center">
                    <p>Don't have an account? <span class="signup"><a href="#">Sign Up</a></span></p>
                </div>
            </form>
        </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="js/login.js"></script>
</body>

</html>