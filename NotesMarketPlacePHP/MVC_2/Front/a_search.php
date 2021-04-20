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
    <?php include "a_nav.php"; ?>

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
            <form>
                <div class="form-group form-text">
                    <span class="form-control-feedback"><img src="images/search-icon.png" alt="search"></span>
                    <input type="text" class="form-control" id="search" placeholder="Search notes hear... ">
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col">
                            <select class="form-control select" id="type" name="type">
                                <option>Select type</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <select class="form-control select" id="category" name="category">
                                <option>Select category</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <select class="form-control select" id="university" name="university">
                                <option>Select university</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <select class="form-control select" id="course" name="course">
                                <option>Select course</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <select class="form-control select" id="country" name="country">
                                <option>Select country</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <select class="form-control select" id="rating" name="rating">
                                <option>Select rating</option>
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
            <div id="notes-header">
                <h4>Total 18 notes</h4>
            </div>
            <div class="row">
                <!--search 1 -->

                <div class="col-md-4 col-sm-4">
                    <div class="search">
                        <div class="note-img">
                            <img src="images/search1.png" alt="note" class="img-responsive">
                        </div>
                        <div class="about-note">
                            <div class="note-heading">
                                <h5><a href="#">Computer Operating System - Final Exam Book With Paper Solution</a></h5>
                            </div>
                            <ul>
                                <li>
                                    <div class="space"><img src="images/university.png" alt="university"></div><span class="simple">University Of California, US</span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/pages.png" alt="pages"></div><span class="simple">204 Pages</span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/date.png" alt="date"></div><span class="simple">Thu, Nov 26 2020</span>
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
                <!--search 2 -->
                <div class="col-md-4 col-sm-4">
                    <div class="search">
                        <div class="note-img">
                            <img src="images/search2.png" alt="note" class="img-responsive">
                        </div>
                        <div class="about-note">
                            <div class="note-heading">
                                <h5><a href="#">Computer Science</a></h5>
                            </div>
                            <ul>
                                <li>
                                    <div class="space"><img src="images/university.png" alt="university"></div><span class="simple">University Of California, US</span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/pages.png" alt="pages"></div><span class="simple">204 Pages</span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/date.png" alt="date"></div><span class="simple">Thu, Nov 26 2020</span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/flag.png" alt="flag"></div><span class="inapp">5 Users marked this note as inappropriate</span>
                                </li>
                            </ul>
                            <div class="rate">
                                <input type="radio" id="2star5" name="rate" value="5" />
                                <label for="2star5" title="text">5 stars</label>
                                <input type="radio" id="2star4" name="rate" value="4" />
                                <label for="2star4" title="text">4 stars</label>
                                <input type="radio" id="2star3" name="rate" value="3" />
                                <label for="2star3" title="text">3 stars</label>
                                <input type="radio" id="2star2" name="rate" value="2" />
                                <label for="2star2" title="text">2 stars</label>
                                <input type="radio" id="2star1" name="rate" value="1" />
                                <label for="2star1" title="text">1 star</label>
                            </div>
                            <span class="reviewcount">100 reviews</span>
                        </div>
                    </div>
                </div>
                <!--search 3 -->
                <div class="col-md-4 col-sm-4">
                    <div class="search">
                        <div class="note-img">
                            <img src="images/search3.png" alt="note" class="img-responsive">
                        </div>
                        <div class="about-note">
                            <div class="note-heading">
                                <h5><a href="#">Basic Computer Engineering Tech India Publication Series</a></h5>
                            </div>
                            <ul>
                                <li>
                                    <div class="space"><img src="images/university.png" alt="university"></div><span class="simple">University Of California, US</span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/pages.png" alt="pages"></div><span class="simple">204 Pages</span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/date.png" alt="date"></div><span class="simple">Thu, Nov 26 2020</span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/flag.png" alt="flag"></div><span class="inapp">5 Users marked this note as inappropriate</span>
                                </li>
                            </ul>
                            <div class="rate">
                                <input type="radio" id="3star5" name="rate" value="5" />
                                <label for="3star5" title="text">5 stars</label>
                                <input type="radio" id="3star4" name="rate" value="4" />
                                <label for="3star4" title="text">4 stars</label>
                                <input type="radio" id="3star3" name="rate" value="3" />
                                <label for="3star3" title="text">3 stars</label>
                                <input type="radio" id="3star2" name="rate" value="2" />
                                <label for="3star2" title="text">2 stars</label>
                                <input type="radio" id="3star1" name="rate" value="1" />
                                <label for="3star1" title="text">1 star</label>
                            </div>
                            <span class="reviewcount">100 reviews</span>
                        </div>
                    </div>
                </div>
                <!--search 4 -->
                <div class="col-md-4 col-sm-4">
                    <div class="search">
                        <div class="note-img">
                            <img src="images/search4.png" alt="note" class="img-responsive">
                        </div>
                        <div class="about-note">
                            <div class="note-heading">
                                <h5><a href="#">Computer Science Illuminted - Seventh Edition</a></h5>
                            </div>
                            <ul>
                                <li>
                                    <div class="space"><img src="images/university.png" alt="university"></div><span class="simple">University Of California, US</span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/pages.png" alt="pages"></div><span class="simple">204 Pages</span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/date.png" alt="date"></div><span class="simple">Thu, Nov 26 2020</span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/flag.png" alt="flag"></div><span class="inapp">5 Users marked this note as inappropriate</span>
                                </li>
                            </ul>
                            <div class="rate">
                                <input type="radio" id="4star5" name="rate" value="5" />
                                <label for="4star5" title="text">5 stars</label>
                                <input type="radio" id="4star4" name="rate" value="4" />
                                <label for="4star4" title="text">4 stars</label>
                                <input type="radio" id="4star3" name="rate" value="3" />
                                <label for="4star3" title="text">3 stars</label>
                                <input type="radio" id="4star2" name="rate" value="2" />
                                <label for="4star2" title="text">2 stars</label>
                                <input type="radio" id="4star1" name="rate" value="1" />
                                <label for="4star1" title="text">1 star</label>
                            </div>
                            <span class="reviewcount">100 reviews</span>
                        </div>
                    </div>
                </div>
                <!--search 5 -->
                <div class="col-md-4 col-sm-4">
                    <div class="search">
                        <div class="note-img">
                            <img src="images/search5.png" alt="note" class="img-responsive">
                        </div>
                        <div class="about-note">
                            <div class="note-heading">
                                <h5><a href="#">The Principle Of Computer Hardware - Oxford</a></h5>
                            </div>
                            <ul>
                                <li>
                                    <div class="space"><img src="images/university.png" alt="university"></div><span class="simple">University Of California, US</span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/pages.png" alt="pages"></div><span class="simple">204 Pages</span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/date.png" alt="date"></div><span class="simple">Thu, Nov 26 2020</span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/flag.png" alt="flag"></div><span class="inapp">5 Users marked this note as inappropriate</span>
                                </li>
                            </ul>
                            <div class="rate">
                                <input type="radio" id="5star5" name="rate" value="5" />
                                <label for="5star5" title="text">5 stars</label>
                                <input type="radio" id="5star4" name="rate" value="4" />
                                <label for="5star4" title="text">4 stars</label>
                                <input type="radio" id="5star3" name="rate" value="3" />
                                <label for="5star3" title="text">3 stars</label>
                                <input type="radio" id="5star2" name="rate" value="2" />
                                <label for="5star2" title="text">2 stars</label>
                                <input type="radio" id="5star1" name="rate" value="1" />
                                <label for="5star1" title="text">1 star</label>
                            </div>
                            <span class="reviewcount">100 reviews</span>
                        </div>
                    </div>
                </div>
                <!--search 6 -->
                <div class="col-md-4 col-sm-4">
                    <div class="search">
                        <div class="note-img">
                            <img src="images/search6.png" alt="note" class="img-responsive">
                        </div>
                        <div class="about-note">
                            <div class="note-heading">
                                <h5><a href="#">The Computer Book</a></h5>
                            </div>
                            <ul>
                                <li>
                                    <div class="space"><img src="images/university.png" alt="university"></div><span class="simple">University Of California, US</span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/pages.png" alt="pages"></div><span class="simple">204 Pages</span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/date.png" alt="date"></div><span class="simple">Thu, Nov 26 2020</span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/flag.png" alt="flag"></div><span class="inapp">5 Users marked this note as inappropriate</span>
                                </li>
                            </ul>
                            <div class="rate">
                                <input type="radio" id="6star5" name="rate" value="5" />
                                <label for="6star5" title="text">5 stars</label>
                                <input type="radio" id="6star4" name="rate" value="4" />
                                <label for="6star4" title="text">4 stars</label>
                                <input type="radio" id="6star3" name="rate" value="3" />
                                <label for="6star3" title="text">3 stars</label>
                                <input type="radio" id="6star2" name="rate" value="2" />
                                <label for="6star2" title="text">2 stars</label>
                                <input type="radio" id="6star1" name="rate" value="1" />
                                <label for="6star1" title="text">1 star</label>
                            </div>
                            <span class="reviewcount">100 reviews</span>
                        </div>
                    </div>
                </div>
                <!--search 7 -->
                <div class="col-md-4 col-sm-4">
                    <div class="search">
                        <div class="note-img">
                            <img src="images/search1.png" alt="note" class="img-responsive">
                        </div>
                        <div class="about-note">
                            <div class="note-heading">
                                <h5><a href="#">Computer Operating System - Final Exam Book With Paper Solution</a></h5>
                            </div>
                            <ul>
                                <li>
                                    <div class="space"><img src="images/university.png" alt="university"></div><span class="simple">University Of California, US</span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/pages.png" alt="pages"></div><span class="simple">204 Pages</span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/date.png" alt="date"></div><span class="simple">Thu, Nov 26 2020</span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/flag.png" alt="flag"></div><span class="inapp">5 Users marked this note as inappropriate</span>
                                </li>
                            </ul>
                            <div class="rate">
                                <input type="radio" id="7star5" name="rate" value="5" />
                                <label for="7star5" title="text">5 stars</label>
                                <input type="radio" id="7star4" name="rate" value="4" />
                                <label for="7star4" title="text">4 stars</label>
                                <input type="radio" id="7star3" name="rate" value="3" />
                                <label for="7star3" title="text">3 stars</label>
                                <input type="radio" id="7star2" name="rate" value="2" />
                                <label for="7star2" title="text">2 stars</label>
                                <input type="radio" id="7star1" name="rate" value="1" />
                                <label for="7star1" title="text">1 star</label>
                            </div>
                            <span class="reviewcount">100 reviews</span>
                        </div>
                    </div>
                </div>
                <!--search 8 -->
                <div class="col-md-4 col-sm-4">
                    <div class="search">
                        <div class="note-img">
                            <img src="images/search2.png" alt="note" class="img-responsive">
                        </div>
                        <div class="about-note">
                            <div class="note-heading">
                                <h5><a href="#">Computer Science</a></h5>
                            </div>
                            <ul>
                                <li>
                                    <div class="space"><img src="images/university.png" alt="university"></div><span class="simple">University Of California, US</span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/pages.png" alt="pages"></div><span class="simple">204 Pages</span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/date.png" alt="date"></div><span class="simple">Thu, Nov 26 2020</span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/flag.png" alt="flag"></div><span class="inapp">5 Users marked this note as inappropriate</span>
                                </li>
                            </ul>
                            <div class="rate">
                                <input type="radio" id="8star5" name="rate" value="5" />
                                <label for="8star5" title="text">5 stars</label>
                                <input type="radio" id="8star4" name="rate" value="4" />
                                <label for="8star4" title="text">4 stars</label>
                                <input type="radio" id="8star3" name="rate" value="3" />
                                <label for="8star3" title="text">3 stars</label>
                                <input type="radio" id="8star2" name="rate" value="2" />
                                <label for="8star2" title="text">2 stars</label>
                                <input type="radio" id="8star1" name="rate" value="1" />
                                <label for="8star1" title="text">1 star</label>
                            </div>
                            <span class="reviewcount">100 reviews</span>
                        </div>
                    </div>
                </div>
                <!--search 9 -->
                <div class="col-md-4 col-sm-4">
                    <div class="search">
                        <div class="note-img">
                            <img src="images/search3.png" alt="note" class="img-responsive">
                        </div>
                        <div class="about-note">
                            <div class="note-heading">
                                <h5><a href="#">Basic Computer Engineering Tech India Publication Series</a></h5>
                            </div>
                            <ul>
                                <li>
                                    <div class="space"><img src="images/university.png" alt="university"></div><span class="simple">University Of California, US</span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/pages.png" alt="pages"></div><span class="simple">204 Pages</span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/date.png" alt="date"></div><span class="simple">Thu, Nov 26 2020</span>
                                </li>
                                <li>
                                    <div class="space"><img src="images/flag.png" alt="flag"></div><span class="inapp">5 Users marked this note as inappropriate</span>
                                </li>
                            </ul>
                            <div class="rate">
                                <input type="radio" id="9star5" name="rate" value="5" />
                                <label for="9star5" title="text">5 stars</label>
                                <input type="radio" id="9star4" name="rate" value="4" />
                                <label for="9star4" title="text">4 stars</label>
                                <input type="radio" id="9star3" name="rate" value="3" />
                                <label for="9star3" title="text">3 stars</label>
                                <input type="radio" id="9star2" name="rate" value="2" />
                                <label for="9star2" title="text">2 stars</label>
                                <input type="radio" id="9star1" name="rate" value="1" />
                                <label for="9star1" title="text">1 star</label>
                            </div>
                            <span class="reviewcount">100 reviews</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Pagination -->
    <nav id="pagination" aria-label="Page navigation example">
        <ul class="pagination">
            <li id="prev" class="page-item"><a class="page-link" href="#"><img src="images/left-arrow.png" alt="arrow"></a></li>
            <li class="page-item number"><a class="page-link" href="#">1</a></li>
            <li class="page-item number"><a class="page-link" href="#">2</a></li>
            <li class="page-item number"><a class="page-link" href="#">3</a></li>
            <li class="page-item number"><a class="page-link" href="#">4</a></li>
            <li class="page-item number"><a class="page-link" href="#">5</a></li>
            <li id="next" class="page-item"><a class="page-link" href="#"><img src="images/right-arrow.png" alt="arrow"></a></li>
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