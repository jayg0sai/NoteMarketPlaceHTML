<?php include "../includes/db.php"; ?>
<?php session_start(); ?>
<?php include "../includes/session_destroy.php"; ?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function title_exists($title) {
        global $connection;
        $te_query = "SELECT Title FROM `seller_notes` WHERE `SellerID` = '{$_SESSION['userid']}' AND `Title` = '{$title}' ";
        $te_result = mysqli_query($connection, $te_query);
        if(!$te_result) {
            die("Query Failed".mysqli_error($connection));
        }
        if(mysqli_num_rows($te_result) > 0) {
            return true;
        } else {
            return false;
        }
    }
?>
<?php
if(isset($_POST['save'])) {
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $category = mysqli_real_escape_string($connection, $_POST['category']);
    $display_picture = mysqli_real_escape_string($connection, $_FILES['displayPicture']['name']);
    $display_picture_temp = $_FILES['displayPicture']['tmp_name'];
    $type = mysqli_real_escape_string($connection, $_POST['type']);
    $pages = mysqli_real_escape_string($connection, $_POST['numberofPages']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $country = mysqli_real_escape_string($connection, $_POST['country']);
    $university = mysqli_real_escape_string($connection, $_POST['universityName']);
    $course_name = mysqli_real_escape_string($connection, $_POST['course']);
    $course_code = mysqli_real_escape_string($connection, $_POST['courseCode']);
    $professor = mysqli_real_escape_string($connection, $_POST['professor']);
    $ispaid = $_POST['radio'];
    if(isset($_POST['price'])) {
        $sell_price = mysqli_real_escape_string($connection, $_POST['price']);
    } else {
        $sell_price = "";
    }
    
    $note_preview = mysqli_real_escape_string($connection, $_FILES['notePreview']['name']);
    $note_preview_temp = $_FILES['notePreview']['tmp_name'];
    $notes_name = mysqli_real_escape_string($connection, $_FILES['uploadNotes']['name']);
    $notes_temp = $_FILES['uploadNotes']['tmp_name'];
    
    if(!title_exists($title)) {
    $add = "INSERT INTO `seller_notes` (`SellerID`, `Status`, `Title`,`Category`,`DisplayPicture`,`NoteType`,`NumberofPages`, `Description`, `UniversityName`,`Country`, `Course`, `CourseCode`, `Professor`, `IsPaid`, `SellingPrice`, `NotesPreview`, `CreatedDate`,CreatedBy,IsActive) VALUES ({$_SESSION['userid']}, 10, '{$title}','{$category}', '{$display_picture}','{$type}', '{$pages}', '{$description}', '{$university}','{$country}', '{$course_name}', '{$course_code}', '{$professor}', b'{$ispaid}', '{$sell_price}', '{$note_preview}', now(), '{$_SESSION['userid']}',b'1')";
    $add_query = mysqli_query($connection, $add);
    if(!$add_query) {
        die("Query Failed". mysqli_error($connection));
    }
    
    $note_id = mysqli_insert_id($connection);
    if (!file_exists("images/Members/".$_SESSION['userid']."/$note_id")) {
        mkdir("../Members/".$_SESSION['userid']."/$note_id", 0777, true);
        mkdir("../Members/".$_SESSION['userid']."/$note_id/Attachments", 0777, true);
    }
    move_uploaded_file($display_picture_temp, "../Members/".$_SESSION['userid']."/$note_id/$display_picture");
    move_uploaded_file($note_preview_temp, "../Members/".$_SESSION['userid']."/$note_id/$note_preview");
    move_uploaded_file($notes_temp, "../Members/".$_SESSION['userid']."/$note_id/Attachments/$notes_name");
    
    $display_picture = "../Members/".$_SESSION['userid']."/$note_id/$display_picture";
    $note_preview = "../Members/".$_SESSION['userid']."/$note_id/$note_preview";
    $notes = "../Members/".$_SESSION['userid']."/$note_id/Attachments/$notes_name";
    
    $path = "UPDATE seller_notes SET `DisplayPicture`='{$display_picture}' ,`NotesPreview`= '{$note_preview}' WHERE ID = '{$note_id}' ";
    if(!mysqli_query($connection, $path)) {
        die("Query Failed". mysqli_error($connection));
    }
    $notes_attach = "INSERT INTO `seller_notes_attachment` (`NoteID`, `FileName`, `FilePath`, `CreatedDate`, `CreatedBy`,IsActive) VALUES ({$note_id}, '{$notes_name}', '{$notes}', now(), '{$_SESSION['userid']}',b'1' ) ";
    
    if(!mysqli_query($connection, $notes_attach)) {
        die("Query Failed". mysqli_error($connection));
    }
    header("Location:dashboard.php");
    } else {
        $msg = "Please use another title, it should be unique.";
    }
}
if(isset($_POST['publish'])) {
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $category = mysqli_real_escape_string($connection, $_POST['category']);
    $display_picture = mysqli_real_escape_string($connection, $_FILES['displayPicture']['name']);
    $display_picture_temp = $_FILES['displayPicture']['tmp_name'];
    $type = mysqli_real_escape_string($connection, $_POST['type']);
    $pages = mysqli_real_escape_string($connection, $_POST['numberofPages']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $country = mysqli_real_escape_string($connection, $_POST['country']);
    $university = mysqli_real_escape_string($connection, $_POST['universityName']);
    $course_name = mysqli_real_escape_string($connection, $_POST['course']);
    $course_code = mysqli_real_escape_string($connection, $_POST['courseCode']);
    $professor = mysqli_real_escape_string($connection, $_POST['professor']);
    $ispaid = $_POST['radio'];
    if(isset($_POST['price'])) {
        $sell_price = mysqli_real_escape_string($connection, $_POST['price']);
    } else {
        $sell_price = "";
    }
    
    $note_preview = mysqli_real_escape_string($connection, $_FILES['notePreview']['name']);
    $note_preview_temp = $_FILES['notePreview']['tmp_name'];
    $notes_name = mysqli_real_escape_string($connection, $_FILES['uploadNotes']['name']);
    $notes_temp = $_FILES['uploadNotes']['tmp_name'];
    
    if(!title_exists($title)) {
    $add = "INSERT INTO `seller_notes` (`SellerID`, `Status`, `Title`,`Category`,`DisplayPicture`,`NoteType`,`NumberofPages`, `Description`, `UniversityName`,`Country`, `Course`, `CourseCode`, `Professor`, `IsPaid`, `SellingPrice`, `NotesPreview`, `CreatedDate`,CreatedBy,IsActive) VALUES ({$_SESSION['userid']}, 11, '{$title}','{$category}', '{$display_picture}','{$type}', '{$pages}', '{$description}', '{$university}','{$country}', '{$course_name}', '{$course_code}', '{$professor}', b'{$ispaid}', '{$sell_price}', '{$note_preview}', now(),'{$_SESSION['userid']}',b'1')";
    $add_query = mysqli_query($connection, $add);
    if(!$add_query) {
        die("Query Failed". mysqli_error($connection));
    }
    
    $note_id = mysqli_insert_id($connection);
    if (!file_exists("../Members/".$_SESSION['userid']."/$note_id")) {
        mkdir("../Members/".$_SESSION['userid']."/$note_id", 0777, true);
        mkdir("../Members/".$_SESSION['userid']."/$note_id/Attachments", 0777, true);
    }
    move_uploaded_file($display_picture_temp, "../Members/".$_SESSION['userid']."/$note_id/$display_picture");
    move_uploaded_file($note_preview_temp, "../Members/".$_SESSION['userid']."/$note_id/$note_preview");
    move_uploaded_file($notes_temp, "../Members/".$_SESSION['userid']."/$note_id/Attachments/$notes_name");
    
    $display_picture = "../Members/".$_SESSION['userid']."/$note_id/$display_picture";
    $note_preview = "../Members/".$_SESSION['userid']."/$note_id/$note_preview";
    $notes = "../Members/".$_SESSION['userid']."/$note_id/Attachments/$notes_name";
    
    $path = "UPDATE seller_notes SET `DisplayPicture`='{$display_picture}' ,`NotesPreview`= '{$note_preview}' WHERE ID = '{$note_id}' ";
    
    if(!mysqli_query($connection, $path)) {
        die("Query Failed". mysqli_error($connection));
    }
    $notes_attach = "INSERT INTO `seller_notes_attachment` (`NoteID`, `FileName`, `FilePath`, `CreatedDate`, `CreatedBy`) VALUES ({$note_id}, '{$notes_name}', '{$notes}', now(), '{$_SESSION['userid']}' ) ";
    
    if(!mysqli_query($connection, $notes_attach)) {
        die("Query Failed". mysqli_error($connection));
    }
    
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
                                    $mail->Subject = $_SESSION['firstname'].$_SESSION['lastname']." sent his note for review"; //subject line of email
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
                                            <p>We want to inform you that, '.$_SESSION['firstname'].$_SESSION['lastname'].' sent his note '.$title.' for review. Please look at the notes and take required actions.</p>
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
    
     header("Location:dashboard.php");
    } else {
        $msg = "Please use another title.";
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
    <title>Add Note</title>

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
    <link rel="stylesheet" href="css/addnote.css?v=<?php echo time(); ?>">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/addnote-responsive.css?v=<?php echo time(); ?>">

</head>

<body data-spy="scroll" data-target=".navbar">

    <!-- Navigation -->
    <?php include "navigation.php"; ?>

    <!-- home -->
    <section id="home">
        <div id="home-content">
            <div class="container-fluid">
                <div class="text-center">
                    <h3>Add Notes</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Details -->
    <section id="details">
        <div class="container-fluid">
            <form action="addnote.php" method="post" enctype="multipart/form-data">
                <!-- Basic Details -->
                <div class="form-header">
                    <h3>Basic Note Details</h3>
                </div>
                <div style="color:#d9534f;"><?php if(isset($msg)) {echo $msg;} ?></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-text">
                            <label for="title">Title*</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter your notes title" required>
                        </div>
                        
                    </div>
                    
                    
                    <div class="col-md-6">
                        <div id="form-category" class="form-group">
                            <label for="category">Category*</label>
                            <div class="cos">
                                <select class="form-control" id="category" name="category" required>
                                    <option value="">Select your category</option>
                                    <?php 
                                    $cat = mysqli_query($connection,"SELECT * FROM note_categories WHERE IsActive = b'1' ");
                                    if(!$cat) {die("Query Failed".mysqli_error($connection));}
                                    while($cat_row = mysqli_fetch_assoc($cat)) {
                                    $cat_id = $cat_row['ID'];
                                    $cat_n = $cat_row['Name'];
                                    ?>
                                    <option value="<?php echo $cat_id; ?>"><?php echo $cat_n; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="form-pic" class="form-group">
                            <label>Display Picture</label>
                            <div class="image-upload form-control text-center">
                                <label for="file-input1">
                                    <img src="images/upload-file.png" alt="upload"><br>
                                    Upload a picture
                                </label>
                                <input type="file" class="form-control" name="displayPicture" id="file-input1" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="form-note" class="form-group">
                            <label>Upload Notes*</label>
                            <div class="image-upload form-control text-center">
                                <label for="file-input2">
                                    <img src="images/upload-note.svg" alt="upload"><br>
                                    Upload your notes
                                </label>
                                <input type="file" class="form-control" name="uploadNotes" id="file-input2" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="form-type" class="form-group">
                            <label for="type">Type</label>
                            <div class="cos">
                                <select class="form-control" id="type" name="type">
                                    <option value="">Select your note type</option>
                                    <?php 
                                    $type = mysqli_query($connection,"SELECT * FROM note_types WHERE IsActive = b'1' ");
                                    if(!$type) {die("Query Failed".mysqli_error($connection));}
                                    while($type_row = mysqli_fetch_assoc($type)) {
                                    $type_id = $type_row['ID'];
                                    $type_n = $type_row['Name'];
                                    ?>
                                    <option value="<?php echo $type_id; ?>"><?php echo $type_n; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-text">
                            <label for="pages">Number of Pages</label>
                            <input type="number" class="form-control" name="numberofPages" id="pages" placeholder="Enter number of note pages" min="0">
                        </div>
                    </div>
                    <div class="col-md-12 textarea">
                        <label for="description">Description*</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Enter your description" rows="5" required></textarea>
                    </div>
                </div>


                <!-- Institution Details -->
                <div class="form-header">
                    <h3>Institution Information</h3>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-country">
                            <label for="country">Country</label>
                            <div class="cos">
                                <select id="country" name="country" class="form-control">
                                    <option value="">Select your country</option>
                                    <?php 
                                    $cou = mysqli_query($connection,"SELECT * FROM country WHERE IsActive = b'1' ");
                                    if(!$cou) {die("Query Failed".mysqli_error($connection));}
                                    while($cou_row = mysqli_fetch_assoc($cou)) {
                                    $cou_id = $cou_row['ID'];
                                    $cou_n = $cou_row['Name'];
                                    ?>
                                    <option value="<?php echo $cou_id; ?>"><?php echo $cou_n; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-text">
                            <label for="institution">Institution Name</label>
                            <input type="text" class="form-control" id="institution" name="universityName" placeholder="Enter your institution name">
                        </div>
                    </div>
                </div>
                <!-- Course Details -->
                <div class="form-header">
                    <h3>Course Details</h3>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-text">
                            <label for="cname">Course Name</label>
                            <input type="text" class="form-control" id="cname" name="course" placeholder="Enter your course name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-text">
                            <label for="ccode">Course Code</label>
                            <input type="text" class="form-control" id="ccode" name="courseCode" placeholder="Enter your course code">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-text">
                            <label for="pname">Professor / Lecturer</label>
                            <input type="text" class="form-control" id="pname" name="professor" placeholder="Enter your professor name">
                        </div>
                    </div>
                </div>

                <!-- Selling Details -->
                <div class="form-header">
                    <h3>Selling Information</h3>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div id="check">
                            <div>
                                <label>Sell For*</label>
                            </div>

                            <label class="check">Free
                                <input onclick="handleClick(this);" type="radio" id="free" name="radio" value="0" checked>
                                <span class="checkmark"></span>
                            </label>
                            <label class="check">Paid
                                <input onclick="handleClick(this);" type="radio" id="paid" name="radio" value="1">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="form-group form-text">
                            <label for="price">Sell Price*</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Enter your price" value="" min="0" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="form-file" class="form-group">
                            <label>Note Preview</label>
                            <div class="file-upload form-control text-center">
                                <label for="file-input3">
                                    <img src="images/upload-file.png" alt="upload"><br>
                                    Upload a file
                                </label>
                                <input type="file" class="form-control" name="notePreview" id="file-input3">
                            </div>
                        </div>
                    </div>

                </div>

                <button id="save-btn" class="btn btn-form" type="submit" name="save">Save</button>
                <button id="publish-btn" class="btn btn-form" name="publish" onclick="return confirm('“Publishing this note will send note to administrator for review, once administrator review and approve then this note will be published to portal. Press yes to continue.”');">Publish</button>

                
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

    <!-- Custom JS -->
    <script src="js/addnote.js?v=<?php echo time(); ?>"></script>

</body>

</html>
