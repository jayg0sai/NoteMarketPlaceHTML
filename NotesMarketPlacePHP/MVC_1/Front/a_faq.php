<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tag -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <!-- Title -->
    <title>FAQ</title>

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
    <link rel="stylesheet" href="css/faq.css?v=<?php echo time(); ?>">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/faq-responsive.css?v=<?php echo time(); ?>">

</head>

<body data-spy="scroll" data-target=".navbar">

    <!-- Navigation -->
    <?php include "a_nav.php"; ?>
    
    <!-- home -->
    <section id="home">
        <div id="home-content">
            <div class="container-fluid">
                <div class="text-center">
                    <h3>Frequently Asked Questions</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- General -->
    <section id="general">
        <div class="container-fluid">
            <div class="heading">
                <h3>General Questions</h3>
            </div>
            <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default panel-clr">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                What is Notes Marketplace?
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">Notes Marketplace is an online marketplace for university students to buy and sell their course notes.</div>
                    </div>
                </div>
                <div class="panel panel-default panel-clr">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Where did Notes Marketplace start?
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">What started out as four friends chucking around an idea in Ahmedabad ended up turning into an earliest version of Notes Marketplace. So, with 2021 batch of tatvasoft – we has developed this product.</div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <!-- Uploaders -->
    <section id="uploaders">
        <div class="container-fluid">
            <div class="heading">
                <h3>Uploaders</h3>
            </div>
            <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
               <div class="panel panel-default panel-clr">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Why should I upload now?
                            </a>
                        </h4>

                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">To maximize sales. We can't sell your notes if they are rotting on your hard drive. Your notes are available for purchase the instant they are approved, which means that you could be missing potential sales as we speak. Despite exam and holiday breaks, our users purchase notes all year round, so the best time to upload notes is always today.</div>
                    </div>
                </div>
                <div class="panel panel-default panel-clr">
                    <div class="panel-heading" role="tab" id="headingFour">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                What can't I sell?
                            </a>
                        </h4>

                    </div>
                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                        <div class="panel-body">We won't approve materials that have been created by your university or another third party. We also do not accept assignments, essays, practical’s or take-home exams. We love notes though.</div>
                    </div>
                </div>
                <div class="panel panel-default panel-clr">
                    <div class="panel-heading" role="tab" id="headingFive">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                How long does it take to upload?
                            </a>
                        </h4>

                    </div>
                    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                        <div class="panel-body">Uploading notes is quick and easy. It can take as little as 90 seconds per set of notes. Put it this way, in the time it took to read these FAQs, you could’ve uploaded several sets of notes.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Downloaders -->
    <section id="downloaders">
        <div class="container-fluid">
            <div class="heading">
                <h3>Downloaders</h3>
            </div>
            <div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default panel-clr">
                    <div class="panel-heading" role="tab" id="headingSix">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                How do I buy notes?
                            </a>
                        </h4>

                    </div>
                    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                        <div class="panel-body">Search for the notes you are after using the 'SEARCH NOTES' tab at the at the top right of every page. You can then filter results by university, category, course information etc. To purchase, go to detail page of note and click on download button. If notes are free to download – it will download over the browser and if notes are paid, Once Seller will allow download you can have notes at my downloads grid for actual download.</div>
                    </div>
                </div>
                <div class="panel panel-default panel-clr">
                    <div class="panel-heading" role="tab" id="headingSeven">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                Why should I buy notes?
                            </a>
                        </h4>

                    </div>
                    <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                        <div class="panel-body">The notes on our site are incredibly useful as an educational tool when used correctly. They effectively demonstrate the techniques that top students employ in order to receive top marks. They also summaries the course in a concise format and show what that student believed were the most important elements of the course. Learn from the best.</div>
                    </div>
                </div>
                <div class="panel panel-default panel-clr">
                    <div class="panel-heading" role="tab" id="headingEight">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                Will downloading notes guarantee I improve my grades?
                            </a>
                        </h4>

                    </div>
                    <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
                        <div class="panel-body">How long is a piece of string? However, 90% of students who purchased notes through our site said that doing so improved their grades.</div>
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
    <script src="js/faq.js?v=<?php echo time(); ?>"></script>

</body>

</html>
