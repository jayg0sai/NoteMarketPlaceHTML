<?php include "../includes/db.php"; ?>
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
                                <option value="computer">computer</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <select class="form-control select" id="category" name="category">
                                <option value="">Select category</option>
                                <option value="computer">computer</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <select class="form-control select" id="university" name="university">
                                <option value="">Select university</option>
                                <option value="computer">computer</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <select class="form-control select" id="course" name="course">
                                <option value="">Select course</option>
                                <option value="IT">IT</option>
                                <option value="zoo">zoo</option>
                                <option value="computer">computer</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <select class="form-control select" id="country" name="country">
                                <option value="">Select country</option>
                                <option value="computer">computer</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <select class="form-control select" id="rating" name="rating">
                                <option value="">Select rating</option>
                                <option value="computer">computer</option>
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
                
                $note_count = "SELECT * FROM seller_notes";
                $find_count = mysqli_query($connection, $note_count);
                if(!$find_count) {
                        die("Query Failed".mysqli_error($connection));
                    }
                $count = mysqli_num_rows($find_count);
                
                $page_count = ceil($count / 9);
                
                $display = "SELECT * FROM seller_notes LIMIT $page1, 9 ";
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
                while($row = mysqli_fetch_assoc($display_query)) {
                    $note_id = $row['ID'];
                    $picture = $row['DisplayPicture'];
                    $title = $row['Title'];
                    $university = $row['UniversityName'];
                    $pages = $row['NumberofPages'];
                    
                
                
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
                                <li>
                                    <div class="space"><img src="images/university.png" alt="university"></div><span class="simple"><?php echo $university; ?></span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/pages.png" alt="pages"></div><span class="simple"><?php echo $pages; ?></span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/date.png" alt="date"></div><span class="simple">12 March, 2021</span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/flag.png" alt="flag"></div><span class="inapp">5 Users marked this note as inappropriate</span>
                                </li>
                            </ul>
                            <div class="rate">
                                <input type="radio" id="1star5" name="rate" value="5" />
                                <label for="1star5" title="text">5 stars</label>
                                <input type="radio" id="1star4" name="rate" value="4" />
                                <label for="1star4" title="text">4 stars</label>
                                <input type="radio" id="1star3" name="rate" value="3" />
                                <label for="1star3" title="text">3 stars</label>
                                <input type="radio" id="1star2" name="rate" value="2" />
                                <label for="1star2" title="text">2 stars</label>
                                <input type="radio" id="1star1" name="rate" value="1" />
                                <label for="1star1" title="text">1 star</label>
                            </div>
                            <span class="reviewcount">100 reviews</span>
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