<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tag -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <!-- Title -->
    <title>Notes Marketplace</title>

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
    <link rel="stylesheet" href="css/home.css?v=<?php echo time(); ?>">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/home-responsive.css?v=<?php echo time(); ?>">

</head>

<body data-spy="scroll" data-target=".navbar">

    <!-- Navigation -->
    <nav id="nav" class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php"><img id="logo-nav" src="images/top-logo.png" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span id="mobile-nav-open-btn">&#9776;</span>
                <span id="mobile-nav-close-btn">&times;</span>
            </button>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="search.php">Search Notes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Sell Your Notes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="faq.php">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactus.php">Contact Us</a>
                    </li>
                </ul>
                <a class="btn" href="login.php" id="btn-nav" title="Login" role="button">Login</a>
            </div>
        </div>
    </nav>

    <!-- home -->
    <section id="home">
        <div id="home-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="home">
                            <h2>Download Free/Paid Notes<br>or Sale your Book</h2>
                            <p>Students will be able to acquire free notes from other students, as well as can buy and or sell notes.</p>
                            <div id="home-btn">
                                <a class="btn btn-home smooth-scroll" href="faq.php" title="Learn More" role="button">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- about -->
    <section id="about">
        <div id="about-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div id="about-heading">
                            <h3>About<br>NotesMarketPlace</h3>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <div id="about-text">
                            <p>The basic idea is to implement a marketplace like platform through which different students of various professions from around the Country from different universities and colleges can come together, collaborate with one another and help each other.</p>
                            <p>Students will be able to acquire free notes from other students, as well as can buy and or sell notes and old textbooks, and handwritten notes for any specific category (or profession).</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- work -->
    <section id="work">
        <div id="work-content">
            <div class="container-fluid">
                <div class="row text-center">
                    <div class="col-md-12 col-sm-12">
                        <div id="work-heading">
                            <h3>How it Works</h3>
                        </div>
                    </div>
                </div>
                <div class="row text-center work">
                    <div class="col-lg-4 offset-lg-2 col-md-6 col-sm-6">
                        <div class="work-img">
                            <img src="images/download.png" alt="download">
                        </div>
                        <div class="work-item">
                            <h3>Download Free/Paid Notes</h3>
                            <p>Get Material for your<br>Course etc.</p>
                            <div id="work-btn">
                                <a class="btn btn-work" href="search.php" title="Download" role="button">Download</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="work-img">
                            <img src="images/seller.png" alt="seller">
                        </div>
                        <div class="work-item">
                            <h3>Seller</h3>
                            <p>Upload and Download Course<br>and Material etc.</p>
                            <div>
                                <a class="btn btn-work" href="login.php" title="Sell Book" role="button">Sell Book</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Client Review -->
    <section id="client">
        <div id="client-content">
            <div class="container-fluid">
                <div class="row text-center">
                    <div class="col-md-12 col-sm-12">
                        <div id="client-heading">
                            <h3>What our Customers are Saying</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Client 1 -->
                    <div id="c1" class="col-md-6 col-sm-12">
                        <div class="client">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <img src="images/customer-1.png" alt="client" class="img-responsive img-circle">
                                </div>
                                <div class="col-md-9 col-sm-9 client-details">
                                    <h3>Walter Meller</h3>
                                    <p>Founder & CEO, Matrix Group</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 client-review">
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et quaerat dolor repellendus asperiores voluptate temporibus sequi perspiciatis."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Client 2 -->
                    <div id="c2" class="col-md-6 col-sm-12">
                        <div class="client">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <img src="images/customer-2.png" alt="client" class="img-responsive img-circle">
                                </div>
                                <div class="col-md-9 col-sm-9 client-details">
                                    <h3>Jonnie Riley</h3>
                                    <p>Employee, Curious Snakcs</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 client-review">
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et quaerat dolor repellendus asperiores voluptate temporibus sequi perspiciatis."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Client 3 -->
                    <div id="c3" class="col-md-6 col-sm-12">
                        <div class="client">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <img src="images/customer-3.png" alt="client" class="img-responsive img-circle">
                                </div>
                                <div class="col-md-9 col-sm-9 client-details">
                                    <h3>Amilia Luna</h3>
                                    <p>Teacher, Saint Joseph High School</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 client-review">
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et quaerat dolor repellendus asperiores voluptate temporibus sequi perspiciatis."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Client 4 -->
                    <div id="c4" class="col-md-6 col-sm-12">
                        <div class="client">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <img src="images/customer-4.png" alt="client" class="img-responsive img-circle">
                                </div>
                                <div class="col-md-9 col-sm-9 client-details">
                                    <h3>Daniel Cardos</h3>
                                    <p>Software Engineeer, Infinitum Company</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 client-review">
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et quaerat dolor repellendus asperiores voluptate temporibus sequi perspiciatis."</p>
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

    <!-- Custom JS -->
    <script src="js/home.js?v=<?php echo time(); ?>"></script>

</body>

</html>