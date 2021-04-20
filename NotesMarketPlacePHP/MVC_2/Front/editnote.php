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
if(isset($_GET['n_id'])) {
    $note_id = $_GET['n_id'];
}
global $connection;
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
        $d_price = $row['SellingPrice'];
        $d_note_preview = $row['NotesPreview'];
    }

    

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
    $sell = mysqli_real_escape_string($connection, $_POST['radio']);
    $sell_price = mysqli_real_escape_string($connection, $_POST['price']);
    $note_preview = mysqli_real_escape_string($connection, $_FILES['notePreview']['name']);
    $note_preview_temp = $_FILES['notePreview']['tmp_name'];
    
    move_uploaded_file($display_picture_temp, "images/Members/".$_SESSION['userid']."/$note_id/$display_picture");
    move_uploaded_file($note_preview_temp, "images/Members/".$_SESSION['userid']."/$note_id//$note_preview");
    $display_picture = "images/Members/".$_SESSION['userid']."/$note_id/$display_picture";
    $note_preview = "images/Members/".$_SESSION['userid']."/$note_id/$note_preview";
    
    if(!title_exists($title)) {
    $edit = "Update `seller_notes` SET `Title` = '{$title}', `DisplayPicture` = '{$display_picture}', `NumberofPages` = '{$pages}', `Description` = '{$description}', `UniversityName` = '{$university}', `Course` = '{$course_name}', `CourseCode` = '{$course_code}', `Professor`= '{$professor}', `SellingPrice` = '{$sell_price}', `NotesPreview` = '{$note_preview}', `ModifiedDate` = now(), `ModifiedBy` = '{$_SESSION['useid']}' WHERE ID = '{$note_id}' ";
    $edit_query = mysqli_query($connection, $edit);
    if(!$edit_query) {
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
    $sell = mysqli_real_escape_string($connection, $_POST['radio']);
    $sell_price = mysqli_real_escape_string($connection, $_POST['price']);
    $note_preview = mysqli_real_escape_string($connection, $_FILES['notePreview']['name']);
    $note_preview_temp = $_FILES['notePreview']['tmp_name'];
    
    move_uploaded_file($display_picture_temp, "images/Members/".$_SESSION['userid']."/$note_id/$display_picture");
    move_uploaded_file($note_preview_temp, "images/Members/".$_SESSION['userid']."/$note_id//$note_preview");
    $display_picture = "images/Members/".$_SESSION['userid']."/$note_id/$display_picture";
    $note_preview = "images/Members/".$_SESSION['userid']."/$note_id/$note_preview";
    
    if(!title_exists($title)) {
    $edit = "Update `seller_notes` SET `Title` = '{$title}', `Status` = 11, `DisplayPicture` = '{$display_picture}', `NumberofPages` = '{$pages}', `Description` = '{$description}', `UniversityName` = '{$university}', `Course` = '{$course_name}', `CourseCode` = '{$course_code}', `Professor`= '{$professor}', `SellingPrice` = '{$sell_price}', `NotesPreview` = '{$note_preview}', `ModifiedDate` = now(), `ModifiedBy` = '{$_SESSION['useid']}' WHERE ID = '{$note_id}' ";
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
                                    <option value="<?php echo $d_category; ?>"><?php echo $d_category; ?></option>
                                    <option>IT</option>
                                    <option>CA</option>
                                    <option>CS</option>
                                    <option>Designer</option>
                                    <option>MBA</option>
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
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="form-type" class="form-group">
                            <label for="type">Type</label>
                            <div class="cos">
                                <select class="form-control" id="type" name="type">
                                    <option value="<?php echo $d_type; ?>"><?php echo $d_type; ?></option>
                                    <option>Handwritten notes</option>
                                    <option>University notes</option>
                                    <option>Notebook</option>
                                    <option>Novel</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-text">
                            <label for="pages">Number of Pages</label>
                            <input type="number" class="form-control" name="numberofPages" id="pages" value="<?php echo $d_pages; ?>" placeholder="Enter number of note pages">
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
                                    <option value="<?php echo $d_country; ?>"><?php echo $d_country; ?></option>
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Åland Islands">Åland Islands</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antarctica">Antarctica</option>
                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Bouvet Island">Bouvet Island</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote D'ivoire">Cote D'ivoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Territories">French Southern Territories</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guernsey">Guernsey</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guinea-bissau">Guinea-bissau</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                    <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="India">India</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jersey">Jersey</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                    <option value="Korea, Republic of">Korea, Republic of</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macao">Macao</option>
                                    <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                    <option value="Moldova, Republic of">Moldova, Republic of</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montenegro">Montenegro</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Namibia">Namibia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau">Palau</option>
                                    <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Pitcairn">Pitcairn</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russian Federation">Russian Federation</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="Saint Helena">Saint Helena</option>
                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                    <option value="Saint Lucia">Saint Lucia</option>
                                    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                    <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Serbia">Serbia</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                    <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Timor-leste">Timor-leste</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States">United States</option>
                                    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Viet Nam">Viet Nam</option>
                                    <option value="Virgin Islands, British">Virgin Islands, British</option>
                                    <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                    <option value="Wallis and Futuna">Wallis and Futuna</option>
                                    <option value="Western Sahara">Western Sahara</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
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
                                <input type="radio" checked="checked" name="radio" value="Free">
                                <span class="checkmark"></span>
                            </label>
                            <label class="check">Paid
                                <input type="radio" name="radio" value="Paid">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="form-group form-text">
                            <label for="price">Sell Price*</label>
                            <input type="text" class="form-control" id="price" name="price" value="<?php echo $d_price; ?>" placeholder="Enter your price">
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
                            <?php echo $d_note_preview; ?>
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
