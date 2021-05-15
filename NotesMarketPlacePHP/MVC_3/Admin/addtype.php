<?php include "../includes/db.php"; ?>
<?php session_start(); ?>
<?php include "../includes/session_destroy.php"; ?>
<?php 

function user_exists($type) {
        global $connection;
        $query = "SELECT * FROM note_types WHERE Name = '{$type}' ";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

if(isset($_GET['type'])) {
    $type_id = $_GET['type'];
    $display_r = mysqli_query($connection,"SELECT * FROM note_types WHERE ID = '{$type_id}' ");
    if(!$display_r){
        die("Query Failed".mysqli_error($connection));
    }
    $dis_row = mysqli_fetch_assoc($display_r);
    $t_val = $dis_row['Name'];
    $d_val = $dis_row['Description'];
    
    if(isset($_POST['submit'])) {
    $type = mysqli_real_escape_string($connection, $_POST['type']);
    $desc = mysqli_real_escape_string($connection, $_POST['desc']);
    
    $user_query = "UPDATE note_types SET Name = '{$type}',Description = '{$desc}',ModifiedDate = now(),ModifiedBy = '{$_SESSION['userid']}',IsActive = b'1' WHERE ID = '{$type_id}' ";
    $user_result = mysqli_query($connection, $user_query);
    if(!$user_result) {
        die("Query Failed".mysqli_error($connection));
    }
    
    header("Location:managetype.php");
    
}
    
    
} else {
if(isset($_POST['submit'])) {
    $type = mysqli_real_escape_string($connection, $_POST['type']);
    $desc = mysqli_real_escape_string($connection, $_POST['desc']);
    
    if(!user_exists($type)) {
    $user_query = "INSERT INTO `note_types` (Name,Description,CreatedDate,CreatedBy,IsActive) VALUES ('{$type}', '{$desc}', now(), '{$_SESSION['userid']}',b'1' )";
    $user_result = mysqli_query($connection, $user_query);
    if(!$user_result) {
        die("Query Failed".mysqli_error($connection));
    }
    header("Location:managetype.php");
    } else {
        $message = "This type name already defined";
    }
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
    <title><?php if(isset($_GET['cat'])) { ?>Edit Type<?php }else {?>Add Type<?php } ?></title>

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
    <link rel="stylesheet" href="css/addtype.css?v=<?php echo time(); ?>">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/addtype-responsive.css?v=<?php echo time(); ?>">

</head>

<body data-spy="scroll" data-target=".navbar">

    <!-- Navigation -->
    <?php include "navigation.php"; ?>
    
    <!-- Details -->
    <section id="details">
        <div class="container-fluid">
            <form action="" method="post">
                <!-- Basic Details -->
                <div class="form-header">
                    <h3><?php if(isset($_GET['cat'])) { ?>Edit Type<?php }else {?>Add Type<?php } ?></h3>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-text">
                            <label for="type">Type*</label>
                            <input type="text" class="form-control" id="type" placeholder="Enter your type" name="type" value="<?php if(isset($t_val)){echo $t_val;} ?>" required>
                        </div>
                        <div class="up" role="alert">
                            <?php if(isset($message)){echo $message;} ?>
                        </div>
                        <div class="form-group form-text">
                            <label for="desc">Description*</label>
                            <textarea type="text" class="form-control" name="desc" id="desc" placeholder="Enter your description" required><?php if(isset($d_val)){echo $d_val;} ?></textarea>
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
    <script src="js/addtype.js?v=<?php echo time(); ?>"></script>

</body>

</html>
