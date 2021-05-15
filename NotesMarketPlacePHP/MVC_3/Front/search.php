<?php include "../includes/db.php"; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tag -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <!-- Title -->
    <title>Search Notes</title>

    <!-- Favicon -->
    <link rel="icon" href="images/favicon.ico">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/search.css?v=<?php echo time(); ?>">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/search-responsive.css?v=<?php echo time(); ?>">

</head>

<body data-spy="scroll" data-target=".navbar">

    <!-- Navigation -->
    <?php include "navigation.php"; ?>

    <!-- home -->
    <section id="home">
        <div id="home-content">
            <div class="container-fluid">
                <div class="text-center">
                    <h3>Search Notes</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- search field -->
    <section id="search-field">
        <div class="container-fluid">

            <div class="form-header">
                <h3>Search and Filters notes</h3>
            </div>
            <form action="search_engine.php" method="post">
                <div class="form-group form-text">
                    <span class="form-control-feedback"><img src="images/search-icon.png" alt="search"></span>
                    <input type="text" name="search" class="form-control" id="search" placeholder="Search notes hear... ">
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col">
                            <select class="form-control select" id="type" name="type">
                                <option value="">Select Type</option>
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
                    <div class="form-group">
                        <div class="col">
                            <select class="form-control select" id="category" name="category">
                                <option value="">Select category</option>
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
                    <div class="form-group">
                        <div class="col">
                            <select class="form-control select" id="university" name="university">
                                <option value="">Select university</option>
                                <?php 
                                $uni_opt_q = "SELECT DISTINCT UniversityName FROM seller_notes ";
                                $uni_opt = mysqli_query($connection, $uni_opt_q);
                                if(!$uni_opt) {
                                    die("Query Failed".mysqli_error($connection));
                                }
                                while($uni_row = mysqli_fetch_assoc($uni_opt)) {
                                    $uni_name = $uni_row['UniversityName'];
                                    if(!$uni_name == "") {
                                ?>
                                <option value="<?php echo $uni_name; ?>"><?php echo $uni_name; ?></option>
                                <?php } }?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <select class="form-control select" id="course" name="course">
                                <option value="">Select course</option>
                                <?php 
                                $course_opt_q = "SELECT DISTINCT Course FROM seller_notes ";
                                $course_opt = mysqli_query($connection, $course_opt_q);
                                if(!$course_opt) {
                                    die("Query Failed".mysqli_error($connection));
                                }
                                while($course_row = mysqli_fetch_assoc($course_opt)) {
                                    $course_name = $course_row['Course'];
                                    if(!$course_name == "") {
                                ?>
                                <option value="<?php echo $course_name; ?>"><?php echo $course_name; ?></option>
                                <?php } }?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <select class="form-control select" id="country" name="country">
                                <option value="">Select country</option>
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
                    <div class="form-group">
                        <div class="col">
                            <select class="form-control select" id="rating" name="rating">
                                <option value="">Select rating</option>
                                <option value="1">1+</option>
                                <option value="2">2+</option>
                                <option value="3">3+</option>
                                <option value="4">4+</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Notes -->
    <section id="notes">
        <div class="container-fluid">
           <?php
                
                if(isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                if($page == "" || $page == 1) {
                    $page1 = 0;
                } else {
                    $page1 = ($page*9) - 9;
                }
                global $connection;
                
                $note_count = "SELECT * FROM seller_notes WHERE Status = 13 ";
                $find_count = mysqli_query($connection, $note_count);
                if(!$find_count) {
                        die("Query Failed".mysqli_error($connection));
                    }
                $count = mysqli_num_rows($find_count);
                
                $page_count = ceil($count / 9);
                
                $display = "SELECT * FROM seller_notes WHERE Status = 13 LIMIT $page1, 9 ";
                $display_query = mysqli_query($connection, $display);
                if(!$display_query) {
                    die("Query Failed".mysqli_error($connection));
                }
            ?>
            <div id="notes-header">
                <h4>Total <?php echo $count; ?> notes</h4>
            </div>
            <div class="row">
                <!--search 1 -->
                <?php
                $s_count = 0;
                while($row = mysqli_fetch_assoc($display_query)) {
                    $note_id = $row['ID'];
                    $picture = $row['DisplayPicture'];
                    $title = $row['Title'];
                    $university = $row['UniversityName'];
                    $pages = $row['NumberofPages'];
                    $p_date = $row['PublishedDate'];
                    $s_count++;
                    
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
                <div class="col-md-4 col-sm-4">
                    <div class="search">
                        <div class="note-img">
                            <img src="<?php echo $picture; ?>" alt="note" class="img-responsive">
                        </div>
                        <div class="about-note">
                            <div class="note-heading">
                                <h5><a href="notedetails.php?n_id=<?php echo $note_id; ?>"><?php echo $title; ?></a></h5>
                            </div>
                            <ul>
                                <?php if(!$university == "") { ?>
                                <li>
                                    <div class="space"><img src="images/university.png" alt="university"></div><span class="simple"><?php echo $university; ?></span>
                                </li>
                                <?php }  if(!$pages == "") { ?>
                                <li>
                                    <div class="space"><img src="images/pages.png" alt="pages"></div><span class="simple"><?php echo $pages; ?></span>
                                </li>
                                <?php } ?>
                                <li>
                                    <div class="space"><img src="images/date.png" alt="date"></div><span class="simple">12 March, 2021</span>
                                </li>
                                <?php if(!$inapp_count == "") { ?>
                                <li>
                                    <div class="space"><img src="images/flag.png" alt="flag"></div><span class="inapp"><?php echo $inapp_count; ?> Users marked this note as inappropriate</span>
                                </li>
                                <?php } ?>
                            </ul>
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
                            </div>
                            <span class="reviewcount"><?php echo $r_count; ?> reviews</span>
                        </div>
                    </div>
                </div>
                
                <?php } ?>
                
            </div>
        </div>

    </section>

    <!-- Pagination -->
    <nav id="pagination" aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            if($page>=2) {
                   echo '<li id="prev" class="page-item"><a class="page-link" href="search.php?page='.($page - 1).'"><img src="images/left-arrow.png" alt="arrow"></a></li>';
            }
            
            for($i = 1; $i <= $page_count; $i++) {
                if($i == $page) {
                    echo '<li class="page-item number active"><a class="page-link" href="search.php?page='.$i.'">'.$i.'</a></li>';
                } else {
                    echo '<li class="page-item number"><a class="page-link" href="search.php?page='.$i.'">'.$i.'</a></li>';
                }
                
                
            }
            if($page<$page_count)
                   echo '<li id="next" class="page-item"><a class="page-link" href="search.php?page='.($page + 1).'"><img src="images/right-arrow.png" alt="arrow"></a></li>';
                      
            ?>
        </ul>
    </nav>

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
    <script src="js/search.js?v=<?php echo time(); ?>"></script>

</body>

</html>