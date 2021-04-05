<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tag -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <!-- Title -->
    <title>Dashboard</title>

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
    <link rel="stylesheet" href="css/dashboard.css?v=<?php echo time(); ?>">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/dashboard-responsive.css?v=<?php echo time(); ?>">

</head>

<body data-spy="scroll" data-target=".navbar">

    <!-- Navigation -->
    <?php include "navigation.php"; ?>
    <!-- Dashboard -->
    <section id="dashboard">
        <div class="container-fluid">
            <div class="row">
                <div id="dashboard-heading" class="col-md-6 col-sm-6 col-6">
                    <h3>Dashboard</h3>
                </div>
                <div id="add-btn" class="col-md-6 col-sm-6 col-6">
                    <a type="button" href="addnote.php" class="btn">Add Note</a>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-7 col-sm-12">
                    <div id="earning">
                        <div class="row">
                            <div id="earn-heading" class="col-md-4 col-sm-4 col-12">
                                <img src="images/earning-icon.svg" alt="earn">
                                <h4>My Earning</h4>

                            </div>

                            <div class="notes-heading col-md-4 col-sm-4 col-6" onclick="window.location.href = 'mysold.php'; " onMouseOver="this.style.cursor='pointer' ">
                                <div class="vl"></div>
                                <h4>100</h4>
                                <p>Number of Notes Sold</p>
                            </div>
                            <div class="notes-heading col-md-4 col-sm-4 col-6" onclick="window.location.href = 'mysold.php'; " onMouseOver="this.style.cursor='pointer' ">
                                <h4>$10,00,000</h4>
                                <p>Money Earned</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-5 m-t col-sm-12">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-4" onclick="window.location.href = 'mydownload.php'; " onMouseOver="this.style.cursor='pointer' ">
                            <div class="notes">
                                <h4>38</h4>
                                <p>My Downloads</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-4" onclick="window.location.href = 'myrejected.php'; " onMouseOver="this.style.cursor='pointer' ">
                            <div class="notes">
                                <h4>12</h4>
                                <p>My Rejected Notes</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-4" onclick="window.location.href = 'buyerrequest.php'; " onMouseOver="this.style.cursor='pointer' ">
                            <div class="notes">
                                <h4>102</h4>
                                <p>Buyer Request</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- progress -->
    <section id="progress">
        <div class="container-fluid">
            <div class="row">
                <div class="tab-heading col-md-6 col-sm-12 col-xs-12">
                    <h5>In Progress Notes</h5>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <form class="form-inline">
                        <div class="form-group form-text">
                            <span class="form-control-feedback"><img src="images/search-icon.png" alt="search"></span>
                            <input type="text" class="form-control" id="search1" placeholder="Search">
                        </div>
                        <button type="submit" class="btn search">Search</button>
                    </form>
                </div>
            </div>
            <div style="overflow-x: auto;">
                <table class="table table-hover" style="width:100%;">
                    <thead>
                        <tr>
                            <th scope="col">Added Date</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>09-10-2020</td>
                            <td>Data Science</td>
                            <td>Science</td>
                            <td>Draft</td>
                            <td class="act"><a href="editnote.php?n_id=<?php echo $note_id; ?>"><img src="images/edit.png" alt="act"></a>
                                <a href="#" role="button" data-toggle="modal" data-target="#exampleModalCenter"><img src="images/delete.png" alt="act"></a>
                            </td>

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
                                                <p>“Are you sure, you want to delete this note?”</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary">Cancel</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Yes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        <tr>
                            <td>10-10-2020</td>
                            <td>Accounts</td>
                            <td>Commerce</td>
                            <td>In Review</td>
                            <td class="eye"><a href="notedetails.php"><img src="images/eye.png" alt="act"></a></td>
                        </tr>
                        <tr>
                            <td>11-10-2020</td>
                            <td>Social Studies</td>
                            <td>Social</td>
                            <td>Submitted</td>
                            <td class="eye"><a><img src="images/eye.png" alt="act"></a></td>
                        </tr>
                        <tr>
                            <td>12-10-2020</td>
                            <td>AI</td>
                            <td>IT</td>
                            <td>Submitted</td>
                            <td class="eye"><a><img src="images/eye.png" alt="act"></a></td>
                        </tr>
                        <tr>
                            <td>13-10-2020</td>
                            <td>Lorem ipsum dolor sit ametdjhcbok</td>
                            <td>Lorem</td>
                            <td>Draft</td>
                            <td class="act"><a><img src="images/edit.png" alt="act"></a><a><img src="images/delete.png" alt="act"></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- Pagination -->
    <nav id="pagination1" class="progress-p" aria-label="Page navigation example">
        <ul class="pagination">
            <li class="prev page-item"><a class="page-link" href="#"><img src="images/left-arrow.png" alt="arrow"></a></li>
            <li class="page-item number"><a class="page-link" href="#">1</a></li>
            <li class="page-item number"><a class="page-link" href="#">2</a></li>
            <li class="page-item number"><a class="page-link" href="#">3</a></li>
            <li class="page-item number"><a class="page-link" href="#">4</a></li>
            <li class="page-item number"><a class="page-link" href="#">5</a></li>
            <li class="next page-item"><a class="page-link" href="#"><img src="images/right-arrow.png" alt="arrow"></a></li>
        </ul>
    </nav>

    <!-- Published -->
    <section id="publish">
        <div class="container-fluid">
            <div class="row">
                <div class="tab-heading col-md-6">
                    <h5>Published Notes</h5>
                </div>
                <div class="col-md-6">
                    <form class="form-inline">
                        <div class="form-group form-text">
                            <span class="form-control-feedback"><img src="images/search-icon.png" alt="search"></span>
                            <input type="text" class="form-control" id="search2" placeholder="Search">
                        </div>
                        <button type="submit" class="btn search">Search</button>
                    </form>
                </div>
            </div>
            <div style="overflow-x: auto;">
                <table class="table table-hover" style="width:100%;">
                    <thead>
                        <tr>
                            <th scope="col">Added Date</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Sell type</th>
                            <th scope="col">Price</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>09-10-2020</td>
                            <td>Data Science</td>
                            <td>Science</td>
                            <td>Paid</td>
                            <td>$575</td>
                            <td class="eye"><a href="notedetails.php"><img src="images/eye.png" alt="act"></a></td>
                        </tr>
                        <tr>
                            <td>10-10-2020</td>
                            <td>Accounts</td>
                            <td>Commerce</td>
                            <td>Free</td>
                            <td>$0</td>
                            <td class="eye"><a><img src="images/eye.png" alt="act"></a></td>
                        </tr>
                        <tr>
                            <td>11-10-2020</td>
                            <td>Social Studies</td>
                            <td>Social</td>
                            <td>Free</td>
                            <td>$0</td>
                            <td class="eye"><a><img src="images/eye.png" alt="act"></a></td>
                        </tr>
                        <tr>
                            <td>12-10-2020</td>
                            <td>AI</td>
                            <td>IT</td>
                            <td>Paid</td>
                            <td>$3542</td>
                            <td class="eye"><a><img src="images/eye.png" alt="act"></a></td>
                        </tr>
                        <tr>
                            <td>13-10-2020</td>
                            <td>Lorem ipsum dolor sit ametdjhcbok</td>
                            <td>Lorem</td>
                            <td>Free</td>
                            <td>$0</td>
                            <td class="eye"><a><img src="images/eye.png" alt="act"></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Pagination -->
    <nav id="pagination2" class="publish-p" aria-label="Page navigation example">
        <ul class="pagination">
            <li class="prev page-item"><a class="page-link" href="#"><img src="images/left-arrow.png" alt="arrow"></a></li>
            <li class="page-item number"><a class="page-link" href="#">1</a></li>
            <li class="page-item number"><a class="page-link" href="#">2</a></li>
            <li class="page-item number"><a class="page-link" href="#">3</a></li>
            <li class="page-item number"><a class="page-link" href="#">4</a></li>
            <li class="page-item number"><a class="page-link" href="#">5</a></li>
            <li class="next page-item"><a class="page-link" href="#"><img src="images/right-arrow.png" alt="arrow"></a></li>
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
    <script src="js/dashboard.js?v=<?php echo time(); ?>"></script>

</body>

</html>
