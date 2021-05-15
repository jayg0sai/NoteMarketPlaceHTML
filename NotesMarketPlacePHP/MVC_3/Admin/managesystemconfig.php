<?php include "../includes/db.php"; ?>
<?php session_start(); ?>
<?php include "../includes/session_destroy.php"; ?>
<?php 

function exist($key) {
        global $connection;
        $key_exist = mysqli_query($connection,"SELECT * FROM system_configurations WHERE Ke = '{$key}' ");
        if(!$key_exist) { 
            die("Query Failed".mysqli_error($connection));
        }
        if(mysqli_num_rows($key_exist) > 0) {
            return true;
        } else {
            return false;
        }
    }

if(isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $semail = mysqli_real_escape_string($connection, $_POST['semail']);
    $furl = mysqli_real_escape_string($connection, $_POST['furl']);
    $turl = mysqli_real_escape_string($connection, $_POST['turl']);
    $lurl = mysqli_real_escape_string($connection, $_POST['lurl']);
    $note = $_FILES['note']['name'];
    $note_temp = $_FILES['note']['tmp_name'];
    $profile = $_FILES['profile']['name'];
    $profile_temp = $_FILES['profile']['tmp_name'];
    
    if(empty($note)) {
        $image_q = "SELECT * FROM system_configurations WHERE Ke = 'note_picture' ";
        $image = mysqli_query($connection, $image_q);
        if(!$image) {
            die("Query Failed".mysqli_error($connection));
        }
        while($image_row = mysqli_fetch_assoc($image)) {
        $note = $image_row['Val'];
        }
    }
    if($note == $_FILES['note']['name']) {
    move_uploaded_file($note_temp, "Members/Default/".$note);
    $note = "Members/Default/".$note;
    }
    
    if(empty($profile)) {
        $np_q = "SELECT * FROM system_configurations WHERE Ke = 'profile_picture' ";
        $np = mysqli_query($connection, $np_q);
        if(!$np) {
            die("Query Failed".mysqli_error($connection));
        }
        while($np_row = mysqli_fetch_assoc($np)) {
        $profile = $np_row['Val'];
        }
    }
    if($profile == $_FILES['profile']['name']) {
    move_uploaded_file($profile_temp, "Members/Default/".$profile);
    $profile = "Members/Default/".$profile;
    }
    
    
    function myFunction($key,$value) {
        
        if(isset($key)) {
            
            if(exist($key)) {
                
                $query = "UPDATE system_configurations SET Val = '$value', ModifiedDate = now(), ModifiedBy = '{$_SESSION['userid']}' WHERE Ke = '$key' ";
                $result = mysqli_query($connection,$query);
                if(!$result) {
                    die("Query Failed".mysqli_error($connection));
                }
            } else {
                $query = "INSERT INTO system_configurations (Ke,Val,CreatedDate,CreatedBy,IsActive) VALUES('$key','$value',now(),'{$_SESSION['userid']}',b'1') ";
                $result = mysqli_query($connection,$query);
                if(!$result) {
                    die("Query Failed".mysqli_error($connection));
                }
            }
        }
    }
    
    myFunction('support_email',$email);
    myFunction('phone_no',$phone);
    myFunction('notify_email',$semail);
    myFunction('facebook_url',$furl);
    myFunction('twitter_url',$turl);
    myFunction('linkedin_url',$lurl);
    myFunction('note_picture',$note);
    myFunction('profile_picture',$profile);
    
}

function displayFun($key,$display) {
    if(exist($key)) {
        global $connection;
        $key_exist = mysqli_query($connection,"SELECT * FROM system_configurations WHERE Ke = '{$key}' ");
        if(!$key_exist) { 
            die("Query Failed".mysqli_error($connection));
        }
        $dis_row = mysqli_fetch_assoc($key_exist);
        $display = $dis_row['Val'];
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
    <title>Manage System Configuration</title>

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
    <link rel="stylesheet" href="css/managesystemconfig.css?v=<?php echo time(); ?>">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/managesystemconfig-responsive.css?v=<?php echo time(); ?>">

</head>

<body data-spy="scroll" data-target=".navbar">

    <!-- Navigation -->
    <?php include "navigation.php"; ?>

    <!-- Details -->
    <section id="details">
        <div class="container-fluid">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- Basic Details -->
                <div class="form-header">
                    <h3>Manage System Configuration</h3>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div id="form-email" class="form-group">
                            <label for="email">Support email adderess*</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email address" value="<?php if(isset($support_val)) { echo $support_val; } ?>" required>
                        </div>

                        <div id="form-number" class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" name="phone" class="form-control" id="phone" placeholder="Enter your phone number" pattern="[0-9]{10}" value="<?php if(isset($phone_no_val)) { echo $phone_no_val; } ?>">
                        </div>

                        <div id="form-semail" class="form-group">
                            <label for="semail">Email address(es)(for various events system will send notifications to these users)*</label>
                            <input type="email" name="semail" class="form-control" id="semail" placeholder="Enter your email address" value="<?php if(isset($notify_email_val)) { echo $notify_email_val; } ?>" required>
                        </div>


                        <div class="form-group">
                            <label for="fb">Facebook URL</label>
                            <input type="url" name="furl" class="form-control" id="fb" placeholder="Enter facebook url" value="<?php if(isset($facebook_url_val)) { echo $facebook_url_val; } ?>">
                        </div>

                        <div class="form-group">
                            <label for="tw">Twitter URL</label>
                            <input type="url" name="turl" class="form-control" id="tw" placeholder="Enter twitter url" value="<?php if(isset($twitter_url_val)) { echo $twitter_url_val; } ?>">
                        </div>

                        <div class="form-group">
                            <label for="lin">Linkedin URL</label>
                            <input type="url" name="lurl" class="form-control" id="lin" placeholder="Enter linkedin url" value="<?php if(isset($linkedin_val)) { echo $linkedin_val; } ?>">
                        </div>

                        <div id="form-pic1" class="form-group">
                            <label>Default Image for notes(if seller do not upload)</label>
                            <div class="image-upload form-control text-center">
                                <label for="file-input1">
                                    <img src="images/upload.png" alt="upload"><br>
                                    Upload a picture
                                </label>
                                <input type="file" name="note" class="form-control" id="file-input1" accept="image/*">
                            </div>
                            <?php if(isset($note_picture_val)) { echo $note_picture_val; } ?>
                        </div>
                        
                        <div id="form-pic2" class="form-group">
                            <label>Default Profile picture(if seller do not upload)</label>
                            <div class="image-upload form-control text-center">
                                <label for="file-input2">
                                    <img src="images/upload.png" alt="upload"><br>
                                    Upload a picture
                                </label>
                                <input type="file" name="profile" class="form-control" id="file-input2" accept="image/*" required>
                            </div>
                            <?php if(isset($profile_picture_val)) { echo $profile_picture_val; } ?>
                        </div>
                        
                    </div>
                </div>

                <button id="btn-form" name="submit" type="submit" class="btn">Submit</button>
            </form>
        </div>
    </section>

    <!-- footer -->
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-8 col-12">
                    <p>Version : 1.1.24</p>
                </div>
                <div class="col-md-6 col-sm-4 col-12">
                    <div id="copyright">
                        <p>
                            Copyright &copy; Tatwasoft All rights reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="js/managesystemconfig.js?v=<?php echo time(); ?>"></script>

</body>

</html>
