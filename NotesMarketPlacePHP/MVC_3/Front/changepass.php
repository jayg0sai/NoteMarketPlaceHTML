<?php include "../includes/db.php"; ?>
<?php session_start();?>
<?php 
if(isset($_POST['submit'])) {
    $old = mysqli_real_escape_string($connection, $_POST['oldPass']);
    $new = mysqli_real_escape_string($connection, $_POST['newPass']);
    $confirm = mysqli_real_escape_string($connection, $_POST['cPass']);
    $salt = '$2y$10$iusesomecrazystrings22';
    $old = crypt($old, $salt);
    
    $select_query = "SELECT * FROM users WHERE `ID` = '{$_SESSION['userid']}'";
    $select = mysqli_query($connection, $select_query);
    if(!$select) {
        die("Query Failed".mysqli_error($connection));
    }
    $row = mysqli_fetch_assoc($select);
    
    $password = $row['Password'];
    
    if($old === $password) {
        if(isset($_POST['newPass'])) {
          $new = $_POST['newPass'];
          $number = preg_match('@[0-9]@', $new);
          $uppercase = preg_match('@[A-Z]@', $new);
          $lowercase = preg_match('@[a-z]@', $new);
          $specialChars = preg_match('@[^\w]@', $new);

          if(strlen($new) < 6 || strlen($new) > 24 || !$number || !$uppercase || !$lowercase || !$specialChars) {
            $invalid = "Password must be between 6 and 24 characters in length and must contain at least one number,<br> one upper case letter,<br> one lower case letter and<br> one special character";
          } else {
            $msg = "Your password is strong.";
              
        if($new === $confirm) {
            $new = crypt($new, $salt);
            $update_query = "UPDATE users SET Password = '{$new}' WHERE ID = {$_SESSION['userid']} ";
            $update = mysqli_query($connection, $update_query);
            if(!$update) {
                die("Query Failed".mysqli_error($connection));
            }
            $msg = "Password has been changed successfully<br><a href='login.php'>Login</a> please";
            session_destroy();
        } else {
            $msg = "Your confirm password is mismatch";
        }
        
    } 
    
}
    } else {
        $msg = "Your old password is incorrect";
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
    <title>Change Password</title>
    
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
    <link rel="stylesheet" href="css/changepass.css?v=<?php echo time(); ?>">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/changepass-responsive.css?v=<?php echo time(); ?>">

</head>

<body id="bg-img">
    <div class="center">
        <div id="logo">
            <div class="row text-center">
                <div class="col-md-12">
                   <?php 
                    $user_q = "SELECT * FROM users WHERE ID = '{$_SESSION['userid']}' ";
                    $user = mysqli_query($connection, $user_q);
                    if(!$user) {
                        die("Query Failed".mysqli_error($connection));
                    }
                    $user_row = mysqli_fetch_assoc($user);
                    $role = $user_row['RoleID'];
                    ?>
                    <a href="<?php if($role == 3) {echo "search.php";} else {echo "../Admin/dashboard.php";} ?>"><img src="images/top-logo.png" alt="logo"></a>
                </div>
            </div>
        </div>
        <div id="content-box">
            <form action="" method="post">
                <div class="form-header text-center">
                    <h1 class="heading">Change Password</h1>
                    <p class="text">Enter your new password to change your password</p>
                </div>
                
                <?php if(isset($msg)) { echo "<div class='up'>".$msg."</div>"; } ?>
                <div class="form-group form-password">
                    <label for="password-field1">Old Password</label>
                    <div class="input-group">
                        <input id="password-field1" type="password" class="form-control" placeholder="Enter your old password" name="oldPass" required>
                        <span toggle="#password-field1" class="fa fa-fw field-icon fa-eye-slash toggle-password1"><img src="images/eye.png" class="eye1" alt="eye"></span>
                    </div>
                </div>
                <div class="form-group form-password">
                    <label for="password-field2">New Password</label>
                    <div class="input-group">
                        <input id="password-field2" type="password" class="form-control" placeholder="Enter your new password" name="newPass" required>
                        <span toggle="#password-field2" class="fa fa-fw field-icon fa-eye-slash toggle-password2"><img src="images/eye.png" class="eye2" alt="eye"></span>
                    </div>
                </div>
                <?php if(isset($invalid)) { echo "<div style='color:#d9534f;'>".$invalid."</div>"; } ?>
                <div id="message">
                    <h6 style="margin-left:-30px;">Password must contain the following:</h6>
                    <p id="letter" class="invalid">At least one <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">At least one <b>capital (uppercase)</b> letter</p>
                    <p id="number" class="invalid">At least one <b>number</b></p>
                    <p id="special" class="invalid">At least one <b>special character</b></p>
                    <p id="length" class="invalid">Length between <b>6 to 24 characters</b></p>
                </div>
                <div class="form-group form-password">
                    <label for="password-field3">Confirm Password</label>
                    <div class="input-group">
                        <input id="password-field3" type="password" class="form-control" placeholder="Enter your confirm password" name="cPass" required>
                        <span toggle="#password-field3" class="fa fa-fw field-icon fa-eye-slash toggle-password3"><img src="images/eye.png" class="eye3" alt="eye"></span>
                    </div>
                </div>
                <button type="submit" class="btn" name="submit">Submit</button>

            </form>
        </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="js/changepass.js?v=<?php echo time(); ?>"></script>
</body>

</html>