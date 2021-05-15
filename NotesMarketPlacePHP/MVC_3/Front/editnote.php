<?php include "../includes/db.php"; ?>
<?php session_start(); ?>
<?php include "../includes/session_destroy.php"; ?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function title_exists($title,$note_id) {
        global $connection;
        $te_query = "SELECT Title FROM `seller_notes` WHERE `SellerID` = '{$_SESSION['userid']}' AND `Title` = '{$title}' AND NOT ID = '{$note_id}' ";
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
if(isset($_GET['n_id'])) {
    $note_id = $_GET['n_id'];
}
    $display = "SELECT * FROM seller_notes WHERE ID = '{$note_id}' ";
    $display_query = mysqli_query($connection, $display);
    if(!$display_query) {
        die("Query Failed".mysqli_error($connection));
    }
while($row = mysqli_fetch_assoc($display_query)) {
        $d_picture = $row['DisplayPicture'];
        $d_title = $row['Title'];
        $d_type = $row['NoteType'];
        $d_category = $row['Category'];
        $d_description = $row['Description'];
        $d_course = $row['Course'];
        $d_course_code = $row['CourseCode'];
        $d_professor = $row['Professor'];
        $d_country = $row['Country'];
        $d_university = $row['UniversityName'];
        $d_pages = $row['NumberofPages'];
        $d_sell = $row['IsPaid'];
        $d_price = $row['SellingPrice'];
        $d_note_preview = $row['NotesPreview'];
        $define_cou_1 = mysqli_query($connection,"SELECT * FROM country WHERE ID = $d_country");
        if(!$define_cou_1){die("Query Failed".mysqli_error($connection));}
        $d1_cou_row = mysqli_fetch_assoc($define_cou_1);
        $cou_val = $d1_cou_row['Name'];
    
    $define_cat = mysqli_query($connection,"SELECT * FROM note_categories WHERE ID = $d_category");
    if(!$define_cat){die("Query Failed".mysqli_error($connection));}
    $d_cat_row = mysqli_fetch_assoc($define_cat);
    $v_category = $d_cat_row['Name'];
    
    $define_type = mysqli_query($connection,"SELECT * FROM note_types WHERE ID = $d_type");
    if(!$define_type){die("Query Failed".mysqli_error($connection));}
    $d_type_row = mysqli_fetch_assoc($define_type);
    $v_type = $d_type_row['Name'];
    
    }
    $unote_q = "SELECT * FROM seller_notes_attachment WHERE NoteID = '{$note_id}' ";
    $unote = mysqli_query($connection, $unote_q);
    if(!$unote) {
        die("Query Failed".mysqli_error($connection));
    }
    while($unote_row = mysqli_fetch_assoc($unote)) {
        $d_unote = $unote_row['FilePath'];
    }
    
if(isset($_POST['save'])) {
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $category = mysqli_real_escape_string($connection, $_POST['category']);
    $display_picture = mysqli_real_escape_string($connection, $_FILES['displayPicture']['name']);
    $display_picture_temp = $_FILES['displayPicture']['tmp_name'];
    $upload_notes = mysqli_real_escape_string($connection, $_FILES['uploadNotes']['name']);
    $upload_notes_temp = $_FILES['uploadNotes']['tmp_name'];
    $type = mysqli_real_escape_string($connection, $_POST['type']);
    $pages = mysqli_real_escape_string($connection, $_POST['numberofPages']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $country = mysqli_real_escape_string($connection, $_POST['country']);
    $university = mysqli_real_escape_string($connection, $_POST['universityName']);
    $course_name = mysqli_real_escape_string($connection, $_POST['course']);
    $course_code = mysqli_real_escape_string($connection, $_POST['courseCode']);
    $professor = mysqli_real_escape_string($connection, $_POST['professor']);
    $sell = $_POST['radio'];
    $sell_price = mysqli_real_escape_string($connection, $_POST['price']);
    $note_preview = mysqli_real_escape_string($connection, $_FILES['notePreview']['name']);
    $note_preview_temp = $_FILES['notePreview']['tmp_name'];
    
    if(empty($display_picture)) {
        $image_q = "SELECT * FROM seller_notes WHERE ID = '{$note_id}' ";
        $image = mysqli_query($connection, $image_q);
        if(!$image) {
            die("Query Failed".mysqli_error($connection));
        }
        while($image_row = mysqli_fetch_assoc($image)) {
        $display_picture = $image_row['DisplayPicture'];
        }
    }
    if($display_picture == $_FILES['displayPicture']['name']) {
    move_uploaded_file($display_picture_temp, "../Members/".$_SESSION['userid']."/$note_id/$display_picture");
    $display_picture = "../Members/".$_SESSION['userid']."/$note_id/$display_picture";
    }
    
    if(empty($note_preview)) {
        $np_q = "SELECT * FROM seller_notes WHERE ID = '{$note_id}' ";
        $np = mysqli_query($connection, $np_q);
        if(!$np) {
            die("Query Failed".mysqli_error($connection));
        }
        while($np_row = mysqli_fetch_assoc($np)) {
        $note_preview = $np_row['NotesPreview'];
        }
    }
    if($note_preview == $_FILES['notePreview']['name']) {
    move_uploaded_file($note_preview_temp, "../Members/".$_SESSION['userid']."/$note_id/$note_preview");
    $note_preview = "../Members/".$_SESSION['userid']."/$note_id/$note_preview";
    }
   
    if(empty($upload_notes)) {
        $upload_notes = $d_unote;
    }
    if($upload_notes == $_FILES['displayPicture']['name']) {
    move_uploaded_file($upload_notes_temp, "../Members/".$_SESSION['userid']."/$note_id/Attachments/$upload_notes");
    $upload_notes = "../Members/".$_SESSION['userid']."/$note_id/Attachments/$upload_notes";
    }
    
    $note_name = basename($upload_notes);
    
    if(!title_exists($title,$note_id)) {
    $edit = "UPDATE `seller_notes` SET `Title` = '{$title}',`Category` = '{$category}', `DisplayPicture` = '{$display_picture}',`NoteType` = '{$type}' , `NumberofPages` = '{$pages}', `Description` = '{$description}', `UniversityName` = '{$university}',`Country` = '{$country}', `Course` = '{$course_name}', `CourseCode` = '{$course_code}', `Professor`= '{$professor}',`IsPaid` = b'{$sell}', `SellingPrice` = '{$sell_price}', `NotesPreview` = '{$note_preview}', `ModifiedDate` = now(), `ModifiedBy` = '{$_SESSION['useid']}' WHERE ID = '{$note_id}' ";
    $edit_query = mysqli_query($connection, $edit);
    if(!$edit_query) {
        die("Query Failed". mysqli_error($connection));
    }
        
    $edit_attach_q = "UPDATE seller_notes_attachment SET FilePath = '{$upload_notes}', FileName = '{$note_name}' WHERE NoteID = '{$note_id}' ";
    $edit_attach = mysqli_query($connection, $edit_attach_q);
        if(!$edit_attach) {
            die("Query Failed".mysqli_error($connection));
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
    $upload_notes = mysqli_real_escape_string($connection, $_FILES['uploadNotes']['name']);
    $upload_notes_temp = $_FILES['uploadNotes']['tmp_name'];
    $type = mysqli_real_escape_string($connection, $_POST['type']);
    $pages = mysqli_real_escape_string($connection, $_POST['numberofPages']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $country = mysqli_real_escape_string($connection, $_POST['country']);
    $university = mysqli_real_escape_string($connection, $_POST['universityName']);
    $course_name = mysqli_real_escape_string($connection, $_POST['course']);
    $course_code = mysqli_real_escape_string($connection, $_POST['courseCode']);
    $professor = mysqli_real_escape_string($connection, $_POST['professor']);
    $sell = mysqli_real_escape_string($connection, $_POST['radio']);
    $sell_price = mysqli_real_escape_string($connection, $_POST['price']);
    $note_preview = mysqli_real_escape_string($connection, $_FILES['notePreview']['name']);
    $note_preview_temp = $_FILES['notePreview']['tmp_name'];
    
    if(empty($display_picture)) {
        $image_q = "SELECT * FROM seller_notes WHERE ID = '{$note_id}' ";
        $image = mysqli_query($connection, $image_q);
        if(!$image) {
            die("Query Failed".mysqli_error($connection));
        }
        while($image_row = mysqli_fetch_assoc($image)) {
        $display_picture = $image_row['DisplayPicture'];
        }
    }
    if($display_picture == $_FILES['displayPicture']['name']) {
    move_uploaded_file($display_picture_temp, "../Members/".$_SESSION['userid']."/$note_id/$display_picture");
    $display_picture = "../Members/".$_SESSION['userid']."/$note_id/$display_picture";
    }
    
    if(empty($note_preview)) {
        $np_q = "SELECT * FROM seller_notes WHERE ID = '{$note_id}' ";
        $np = mysqli_query($connection, $np_q);
        if(!$np) {
            die("Query Failed".mysqli_error($connection));
        }
        while($np_row = mysqli_fetch_assoc($np)) {
        $note_preview = $np_row['NotesPreview'];
        }
    }
    if($note_preview == $_FILES['notePreview']['name']) {
    move_uploaded_file($note_preview_temp, "../Members/".$_SESSION['userid']."/$note_id/$note_preview");
    $note_preview = "../Members/".$_SESSION['userid']."/$note_id/$note_preview";
    }
   
    if(empty($upload_notes)) {
        $upload_notes = $d_unote;
    }
    if($upload_notes == $_FILES['displayPicture']['name']) {
    move_uploaded_file($upload_notes_temp, "../Members/".$_SESSION['userid']."/$note_id/Attachments/$upload_notes");
    $upload_notes = "../Members/".$_SESSION['userid']."/$note_id/Attachments/$upload_notes";
    }
    
    $note_name = basename($upload_notes);
    
    if(!title_exists($title,$note_id)) {
    $edit = "Update `seller_notes` SET `Title` = '{$title}',`Category` = '{$category}', `Status` = 11, `DisplayPicture` = '{$display_picture}',`NoteType` = '{$type}', `NumberofPages` = '{$pages}', `Description` = '{$description}', `UniversityName` = '{$university}',`Country` = '{$country}', `Course` = '{$course_name}', `CourseCode` = '{$course_code}', `Professor`= '{$professor}', `IsPaid` = b'{$sell}', `SellingPrice` = '{$sell_price}', `NotesPreview` = '{$note_preview}', `ModifiedDate` = now(), `ModifiedBy` = '{$_SESSION['useid']}' WHERE ID = '{$note_id}' ";
    $edit_query = mysqli_query($connection, $edit);
    if(!$edit_query) {
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
        
        $edit_attach_q = "UPDATE seller_notes_attachment SET FilePath = '{$upload_notes}', FileName = '{$note_name}' WHERE NoteID = '{$note_id}' ";
    $edit_attach = mysqli_query($connection, $edit_attach_q);
        if(!$edit_attach) {
            die("Query Failed".mysqli_error($connection));
        }
        
    header("Location:dashboard.php");
        } else {
        $msg = "Please use another title, it should be unique.";
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
    <title>Edit Note</title>

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
                    <h3>Edit Notes</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Details -->
    <section id="details">
        <div class="container-fluid">
            <form action="editnote.php?n_id=<?php echo $note_id; ?>" method="post" enctype="multipart/form-data">
                <!-- Basic Details -->
                <div class="form-header">
                    <h3>Basic Note Details</h3>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-text">
                            <label for="title">Title*</label>
                            <input type="text" class="form-control" name="title" value="<?php echo $d_title; ?>" id="title" placeholder="Enter your notes title">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div id="form-category" class="form-group">
                            <label for="category">Category*</label>
                            <div class="cos">
                                <select class="form-control" id="category" name="category">
                                    <option value="<?php if(isset($d_category)) { echo $d_category; } else { echo ""; } ?>"><?php if(isset($d_category)) { echo $v_category; } else { echo "Select your notes category"; } ?></option>
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
                            <?php echo basename($d_picture); ?>
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
                                <input type="file" class="form-control" name="uploadNotes" id="file-input2">
                            </div>
                            <?php echo basename($d_unote); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="form-type" class="form-group">
                            <label for="type">Type</label>
                            <div class="cos">
                                <select class="form-control" id="type" name="type">
                                    <option value="<?php if(isset($d_type)) { echo $d_type; } else { echo ""; } ?>"><?php if(isset($v_type)) { echo $d_type; } else { echo "Select your notes type"; } ?></option>
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
                            <input type="number" class="form-control" name="numberofPages" min="0" id="pages" value="<?php echo $d_pages; ?>" placeholder="Enter number of note pages">
                        </div>
                    </div>
                    <div class="col-md-12 textarea">
                        <label for="description">Description*</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Enter your description" rows="5"><?php echo $d_description; ?></textarea>
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
                                    <option value="<?php if(isset($d_country)) { echo $d_country; } else { echo ""; } ?>"><?php if(isset($d_country)) { echo $cou_val; } else { echo "Select your country"; } ?></option>
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
                            <input type="text" class="form-control" id="institution" name="universityName" value="<?php echo $d_university; ?>" placeholder="Enter your institution name">
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
                            <input type="text" class="form-control" id="cname" name="course" value="<?php echo $d_course; ?>" placeholder="Enter your course name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-text">
                            <label for="ccode">Course Code</label>
                            <input type="text" class="form-control" id="ccode" name="courseCode" value="<?php echo $d_course_code; ?>" placeholder="Enter your course code">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-text">
                            <label for="pname">Professor / Lecturer</label>
                            <input type="text" class="form-control" id="pname" name="professor" value="<?php echo $d_professor; ?>" placeholder="Enter your professor name">
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
                                <input onclick="handleClick(this);" type="radio" id="free" name="radio" value="0" <?php if($d_sell == 0){echo" checked";} ?> >
                                <span class="checkmark"></span>
                            </label>
                            <label class="check">Paid
                                <input onclick="handleClick(this);" type="radio" id="paid" name="radio" value="1" <?php if($d_sell == 1){echo" checked";} ?>>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="form-group form-text">
                            <label for="price">Sell Price*</label>
                            <input type="text" class="form-control" id="price" name="price" min="0" value="<?php echo $d_price; ?>" placeholder="Enter your price" <?php if($d_price==0){echo "disabled";} ?>>
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
                            <?php echo basename($d_note_preview); ?>
                        </div>
                    </div>

                </div>

                <button id="save-btn" type="submit" class="btn btn-form" name="save">Save</button>
                <button id="publish-btn" type="submit" class="btn btn-form" name="publish" onclick="return confirm('“Publishing this note will send note to administrator for review, once administrator review and approve then this note will be published to portal. Press yes to continue.”');">Publish</button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <img src="images/close.png">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="thank text-center">
                                    <p>“Publishing this note will send note to administrator for review, once administrator review and approve then this note will be published to portal. Press yes to continue.”</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal" name="yes">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>
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
    <script src="js/addnote.js?v=<?php echo time(); ?>"></script>

</body>

</html>
