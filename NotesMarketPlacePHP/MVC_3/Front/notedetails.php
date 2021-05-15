<?php include "../includes/db.php"; ?>
<?php session_start(); ?>
<?php
if(isset($_GET['n_id'])) {
    $note_id = $_GET['n_id'];
}
    global $connection;
    if(isset($_SESSION['userid'])) {
        $display = "SELECT * FROM seller_notes WHERE ID = '{$note_id}' AND Status = 13 UNION SELECT * FROM seller_notes WHERE ID = '{$note_id}' AND SellerID = '{$_SESSION['userid']}' ";
    } else {
    $display = "SELECT * FROM seller_notes WHERE ID = '{$note_id}' AND Status = 13 ";
    }
    $display_query = mysqli_query($connection, $display);
    if(!$display_query) {
        die("Query Failed".mysqli_error($connection));
    }
    while($row = mysqli_fetch_assoc($display_query)) {
        $note_id = $row['ID'];
        $picture = $row['DisplayPicture'];
        $title = $row['Title'];
        $category = $row['Category'];
        $description = $row['Description'];
        $course = $row['Course'];
        $course_code = $row['CourseCode'];
        $professor = $row['Professor'];
        $published_date = $row['PublishedDate'];
        $country = $row['Country'];
        $university = $row['UniversityName'];
        $pages = $row['NumberofPages'];
        $note_preview = $row['NotesPreview'];
        $price = $row['SellingPrice'];
        $ispaid = $row['IsPaid'];
        $define_cat = mysqli_query($connection,"SELECT * FROM note_categories WHERE ID = $category");
        if(!$define_cat){die("Query Failed".mysqli_error($connection));}
        $d_cat_row = mysqli_fetch_assoc($define_cat);
        $category = $d_cat_row['Name'];
        
        
    }

        
    $dis_re_q = "SELECT * FROM seller_notes_reviews WHERE NoteID = '{$note_id}' ";
    $dis_re = mysqli_query($connection, $dis_re_q);
    if(!$dis_re) {
        die("Query Failed".mysqli_error($connection));
    }
    $r_count = 0;
    $ratings = 0;
    while($re_row = mysqli_fetch_assoc($dis_re)) {
        $r_count++;
        $ratings += $re_row['Ratings'];
    }
    if($r_count > 0) {
        $ratings = ceil($ratings/$r_count);
    }
    $inapp_q = "SELECT * FROM seller_notes_reportedissues WHERE NoteID = '{$note_id}' ";
    $inapp_re = mysqli_query($connection, $inapp_q);
    if(!$inapp_re) {
        die("Query Failed".mysqli_error($connection));
    }
    $inapp_count = mysqli_num_rows($inapp_re);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tag -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <!-- Title -->
    <title>Note Details</title>

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
    <link rel="stylesheet" href="css/notedetails.css?v=<?php echo time(); ?>">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/notedetails-responsive.css?v=<?php echo time(); ?>">

</head>

<body data-spy="scroll" data-target=".navbar">

    <!-- Navigation -->
    <?php include "navigation.php"; ?>

    <!-- About Note -->
    <section id="about-note">
        <div class="container-fluid">
            <div id="details1">
                <div class="details-heading">
                    <h5>Notes Details</h5>
                </div>
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="note-img col-md-3 col-sm-3">
                                <img src="<?php echo $picture; ?>" alt="cs">
                            </div>
                            <div class="note-desc col-md-9 col-sm-9">
                                <div id="note-heading">
                                    <h3><?php echo $title; ?></h3>
                                    <p><?php echo $category; ?></p>
                                </div>
                                <p id="text"><?php echo $description; ?></p>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-desc" <?php if(isset($_SESSION['userid'])) { if($ispaid == 0) { echo ' onclick="window.location.href=`file_download.php?n_id='. $note_id.'&isPaid='.$ispaid.'`"'; } else { echo ' data-toggle="modal" data-target="#exampleModalCenter" '; } } else { echo ' data-toggle="modal" data-target="#registerModalCenter" '; } ?> >
                                    Download <?php if(!empty($price)) { echo "| $".$price;} ?>
                                </button><?php /* ?>
                                <!-- Modal -->
                                <div class="modal fade" id="thank" tabindex="-1" role="dialog" aria-labelledby="thankTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <img src="images/close.png">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="thank text-center">
                                                    <span><i class="fa fa-check"></i></span>
                                                    <h5>Thank you for purchasing!</h5>
                                                </div>
                                                <div class="message">
                                                    <span>Dear Smith,</span>
                                                    <p>As this is paid notes - you need to pay to seller Rahil Shah offline. We will send him an email that you want to download this note. He may contact you further for payment process completion.</p>
                                                    <p>In case, you have urgency,<br>Please contact us on +9195377345959.</p>
                                                    <p>Once he receives the payment and acknowledge us - selected notes you can see over my downloads tab for download.</p>
                                                    <p>Have a good day.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><?php */ ?>
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

                                                <div class="message">
                                                    <p>“Are you sure you want to download this Paid note. Please confirm.”</p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type= "submit" name="yes" class="btn btn-secondary" onclick = "window.location.href='file_download.php?n_id=<?php echo $note_id; ?>&isPaid=<?php echo $ispaid; ?>'">Yes</button>
                                                <button class="btn btn-primary" data-dismiss="modal" type="button" name="no">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="modal fade" id="registerModalCenter" tabindex="-1" role="dialog" aria-labelledby="registerModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <img src="images/close.png">
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="message">
                                                    <p>Please <a href="login.php" style="text-decoration:none;">sign in/register</a> to download this note.</p>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>

                    </div>
                    <?php
                    function note_details($label,$value) {
                        if($value != "") {
                        echo '<div class="note-details">
                            <div class="label">
                                '.$label.':
                            </div>
                            <div class="value">
                                '.$value.'
                            </div>
                        </div>';
                        }
                    }
                    
                    
                    ?>
                    
                    <div class="details1-2 col-lg-5 col-md-12 col-sm-12">
                        <?php note_details("Institution",$university); ?>
                        <?php note_details("Country",$country); ?>
                        <?php note_details("Course Name",$course); ?>
                        <?php note_details("Course Code",$course_code); ?>
                        <?php note_details("Professor",$professor); ?>
                        <?php note_details("Number of pages",$pages); ?>
                        <?php note_details("Approved Date",$published_date); ?>
                        
                        <div class="note-details for-bm">
                            <div class="label">
                                Rating:
                            </div>
                            <div class="value">
                                <div class="rate">
                                    <?php 
                                for($i=1;$i<=5;$i++) {
                                    if($i<=$ratings) {
                                    echo '<img src="images/star.png" alt="star">';
                                    }
                                    if($i>$ratings) {
                                        echo '<img src="images/star-white.png" alt="star">';
                                    }
                                }
                                ?>
                                    <span class="reviewcount"><?php echo $r_count; ?> Reviews</span>
                                </div>
                            </div>
                        </div>
                        <?php if(!$inapp_count == "") { ?>
                        <span class="inappro"><?php echo $inapp_count; ?> Users marked this note as inappropriate</span>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div id="details2">
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <div id="preview">
                            <div class="details-heading">
                                <h5>Notes Preview</h5>
                            </div>

                            <div id="Iframe-Cicis-Menu-To-Go" class="set-margin-cicis-menu-to-go set-padding-cicis-menu-to-go set-border-cicis-menu-to-go set-box-shadow-cicis-menu-to-go center-block-horiz">
                                <div class="responsive-wrapper responsive-wrapper-padding-bottom-90pct">
                                    <iframe src="<?php echo $note_preview; ?>">

                                    </iframe>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-sm-12">
                        <div id="review">
                            <div class="details-heading">
                                <h5>Customer Reviews</h5>
                            </div>
                            <div id="main">
                               <?php
                                $c_review_q = "SELECT * FROM seller_notes_reviews WHERE NoteID = '{$note_id}' ORDER BY Ratings DESC ";
                                $c_review = mysqli_query($connection, $c_review_q);
                                if(!$c_review) {
                                    die("Query Failed".mysqli_error($connection));
                                }
                                while($c_row = mysqli_fetch_assoc($c_review)) {
                                    $c_ratings = $c_row['Ratings'];
                                    $reviewer = $c_row['ReviewedByID'];
                                    $comment = $c_row['Comments'];
                                    $c_name_q = "SELECT * FROM users WHERE ID = '{$reviewer}'";
                                    $c_name = mysqli_query($connection, $c_name_q);
                                    if(!$c_name) {
                                        die("Query Failed".mysqli_error($connection));
                                    }
                                    while($c_name_row = mysqli_fetch_assoc($c_name)) {
                                    $c_first = $c_name_row['FirstName'];
                                    $c_last = $c_name_row['LastName'];
                                    }
                                    $c_img_q = "SELECT ProfilePicture FROM user_profile WHERE UserID = '{$reviewer}'";
                                    $c_img = mysqli_query($connection, $c_img_q);
                                    if(!$c_img) {
                                        die("Query Failed".mysqli_error($connection));
                                    }
                                    $c_img_row = mysqli_fetch_assoc($c_img);
                                    if($c_img_row>0) {
                                    $profile_dp = $c_img_row['ProfilePicture'];
                                    } else {
                                        $profile_dp = "Members/profile.png";
                                    }
                                   
                                ?>
                                <div class="customer">
                                    <div class="row">
                                        <div class="col-md-1 col-sm-1 col-1 client">
                                            <img src="<?php echo $profile_dp; ?>" alt="reviewer" class="img-responsive img-circle">
                                        </div>
                                        <div class="customer-details col-md-11 col-sm-11 col-11">
                                            <h6><?php echo $c_first." ".$c_last; ?></h6>
                                            <div class="rate">
                                                <?php 
                                                for($j=1;$j<=5;$j++) {
                                                    if($j<=$c_ratings) {
                                                    echo '<img src="images/star.png" alt="star">';
                                                    }
                                                    if($j>$c_ratings) {
                                                        echo '<img src="images/star-white.png" alt="star">';
                                                    }
                                                }
                                                ?>
                                            </div>
                                            <p><?php echo $comment; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    <script src="js/notedetails.js?v=<?php echo time(); ?>"></script>

</body>

</html>
