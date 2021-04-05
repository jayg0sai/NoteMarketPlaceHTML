<?php include "../includes/db.php"; ?>
<?php session_start(); ?>
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
                                <button type="button" class="btn btn-desc" <?php if($ispaid == 0) {echo ' onclick="window.location.href=`file_download.php?n_id='. $note_id.'&isPaid='.$ispaid.'`"';} else { echo ' data-toggle="modal" data-target="#exampleModalCenter" '; } ?> >
                                    Download <?php if(!empty($price)) { echo "/ $".$price;} ?>
                                </button>
                                <?php /* { ?>
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
                                </div><?php } if($ispaid != 0) { ?>    <?php } */?>
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
                                                    <p>Are you sure you want to download this Paid note? Please confirm.</p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type= "submit" name="yes" class="btn btn-secondary" onclick = "window.location.href='file_download.php?n_id=<?php echo $note_id; ?>&isPaid=<?php echo $ispaid; ?>'">Yes</button>
                                                <button class="btn btn-primary" data-dismiss="modal" type="button" name="no" data-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>

                    </div>
                    <div class="details1-2 col-lg-5 col-md-12 col-sm-12">
                        <div class="note-details">
                            <div class="label">
                                Institution:
                            </div>
                            <div class="value">
                                <?php echo $university; ?>
                            </div>
                        </div>
                        <div class="note-details">
                            <div class="label">
                                Country:
                            </div>
                            <div class="value">
                                <?php echo $country; ?>
                            </div>
                        </div>
                        <div class="note-details">
                            <div class="label">
                                Course Name:
                            </div>
                            <div class="value">
                                <?php echo $course; ?>
                            </div>
                        </div>
                        <div class="note-details">
                            <div class="label">
                                Course Code:
                            </div>
                            <div class="value">
                                <?php echo $course_code; ?>
                            </div>
                        </div>
                        <div class="note-details">
                            <div class="label">
                                Professor:
                            </div>
                            <div class="value">
                                <?php echo $professor; ?>
                            </div>
                        </div>
                        <div class="note-details">
                            <div class="label">
                                Number of pages:
                            </div>
                            <div class="value">
                                <?php echo $pages; ?>
                            </div>
                        </div>
                        <div class="note-details">
                            <div class="label">
                                Approved Date:
                            </div>
                            <div class="value">
                                <?php echo $published_date; ?>
                            </div>
                        </div>
                        <div class="note-details for-bm">
                            <div class="label">
                                Rating:
                            </div>
                            <div class="value">
                                <div class="rate">
                                    <img src="images/star.png" alt="star">
                                    <img src="images/star.png" alt="star">
                                    <img src="images/star.png" alt="star">
                                    <img src="images/star.png" alt="star">
                                    <img src="images/star-white.png" alt="star">
                                    <span class="reviewcount">100 Reviews</span>
                                </div>
                            </div>
                        </div>
                        <span class="inappro">5 Users marked this note as inappropriate</span>
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
                                <div class="customer">
                                    <div class="row">
                                        <div class="col-md-1 col-sm-1 col-1 client">
                                            <img src="images/reviewer-1.png" alt="reviewer" class="img-responsive img-circle">
                                        </div>
                                        <div class="customer-details col-md-11 col-sm-11 col-11">
                                            <h6>Richard Brown</h6>
                                            <div class="rate">
                                                <img src="images/star.png" alt="star">
                                                <img src="images/star.png" alt="star">
                                                <img src="images/star.png" alt="star">
                                                <img src="images/star.png" alt="star">
                                                <img src="images/star-white.png" alt="star">
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum ab, iusto doloribus, neque vitae unde labore quaerat.</p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="customer">
                                    <div class="row">
                                        <div class="col-md-1 col-sm-1 col-1 client">
                                            <img src="images/reviewer-2.png" alt="reviewer" class="img-responsive img-circle">
                                        </div>
                                        <div class="customer-details col-md-11 col-sm-11 col-11">
                                            <h6>Alice Ortiaz</h6>
                                            <div class="rate">
                                                <img src="images/star.png" alt="star">
                                                <img src="images/star.png" alt="star">
                                                <img src="images/star.png" alt="star">
                                                <img src="images/star.png" alt="star">
                                                <img src="images/star-white.png" alt="star">
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum ab, iusto doloribus, neque vitae unde labore quaerat.</p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="customer">
                                    <div class="row">
                                        <div class="col-md-1 col-sm-1 col-1 client">
                                            <img src="images/reviewer-3.png" alt="reviewer" class="img-responsive img-circle">
                                        </div>
                                        <div class="customer-details col-md-11 col-sm-11 col-11">
                                            <h6>Sara Passmore</h6>
                                            <div class="rate">
                                                <img src="images/star.png" alt="star">
                                                <img src="images/star.png" alt="star">
                                                <img src="images/star.png" alt="star">
                                                <img src="images/star.png" alt="star">
                                                <img src="images/star-white.png" alt="star">
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                        </div>
                                    </div>
                                </div>
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
