<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tag -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <!-- Title -->
    <title>My Download</title>

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
    <link rel="stylesheet" href="css/mydownload.css?v=<?php echo time(); ?>">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/mydownload-responsive.css?v=<?php echo time(); ?>">

</head>

<body data-spy="scroll" data-target=".navbar">

    <!-- Navigation -->
    <?php include "navigation.php"; ?>

    <!-- Download -->
    <section id="download">
        <div class="container-fluid">
            <div class="row">
                <div class="tab-heading col-md-6 col-sm-12 col-xs-12">
                    <h5>My Download</h5>
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
            <div style="overflow-x:auto;">
            <table class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Sr No.</th>
                        <th scope="col">Note Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Buyer</th>
                        <th scope="col">Sell Type</th>
                        <th scope="col">Price</th>
                        <th scope="col">Downloaded Date/Time</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Data Science</td>
                        <td>Science</td>
                        <td>testting123@gmail.com</td>
                        <td>Paid</td>
                        <td>$250</td>
                        <td>27 Nov 2020, 11:24:34</td>
                        <td class="act">
                            <a class="eye"><img src="images/eye.png" alt="eye"></a>
                            <div class="dropdown">
                                <a class="btn" role="button" id="dropdownDotLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="images/dots.png" alt="dots"></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownDotLink1">
                                    <a class="dropdown-item same" href="#">Download Note</a>
                                    <!-- Button trigger modal -->
                                    <a href="#" class="dropdown-item same" data-toggle="modal" data-target="#exampleModalCenter1">Add Review/Feedback</a>
                                    <a class="dropdown-item same" href="#">Report as inappropriate</a>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <img src="images/close.png">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div id="form-header">
                                                                <h5>Add Review</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
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
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="comments">Comments*</label>
                                                                <textarea type="text" class="form-control" id="comments" placeholder="Comments..."></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn mb-2">Submit</button>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Accounts</td>
                        <td>Commerce</td>
                        <td>testting123@gmail.com</td>
                        <td>Free</td>
                        <td>$0</td>
                        <td>27 Nov 2020, 11:24:34</td>
                        <td class="act">
                            <a class="eye"><img src="images/eye.png" alt="eye"></a>
                            <div class="dropdown">
                                <a class="btn" role="button" id="dropdownDotLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="images/dots.png" alt="dots"></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownDotLink2">
                                    <a class="dropdown-item same" href="#">Download Note</a>
                                    <!-- Button trigger modal -->
                                    <a href="#" class="dropdown-item same" data-toggle="modal" data-target="#exampleModalCenter2">Add Review/Feedback</a>
                                    <a class="dropdown-item same" href="#">Report as inappropriate</a>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <img src="images/close.png">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div id="form-header">
                                                                <h5>Add Review</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
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
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="comments">Comments*</label>
                                                                <textarea type="text" class="form-control" id="comments" placeholder="Comments..."></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn mb-2">Submit</button>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Social Studies</td>
                        <td>Social</td>
                        <td>testting123@gmail.com</td>
                        <td>Free</td>
                        <td>$0</td>
                        <td>27 Nov 2020, 11:24:34</td>
                        <td class="act">
                            <a class="eye"><img src="images/eye.png" alt="eye"></a>
                            <div class="dropdown">
                                <a class="btn" role="button" id="dropdownDotLink3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="images/dots.png" alt="dots"></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownDotLink3">
                                    <a class="dropdown-item same" href="#">Download Note</a>
                                    <!-- Button trigger modal -->
                                    <a href="#" class="dropdown-item same" data-toggle="modal" data-target="#exampleModalCenter3">Add Review/Feedback</a>
                                    <a class="dropdown-item same" href="#">Report as inappropriate</a>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <img src="images/close.png">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div id="form-header">
                                                                <h5>Add Review</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
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
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="comments">Comments*</label>
                                                                <textarea type="text" class="form-control" id="comments" placeholder="Comments..."></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn mb-2">Submit</button>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>AI</td>
                        <td>IT</td>
                        <td>testting123@gmail.com</td>
                        <td>aid</td>
                        <td>$158</td>
                        <td>27 Nov 2020, 11:24:34</td>
                        <td class="act">
                            <a class="eye"><img src="images/eye.png" alt="eye"></a>
                            <div class="dropdown">
                                <a class="btn" role="button" id="dropdownDotLink4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="images/dots.png" alt="dots"></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownDotLink4">
                                    <a class="dropdown-item same" href="#">Download Note</a>
                                    <!-- Button trigger modal -->
                                    <a href="#" class="dropdown-item same" data-toggle="modal" data-target="#exampleModalCenter4">Add Review/Feedback</a>
                                    <a class="dropdown-item same" href="#">Report as inappropriate</a>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <img src="images/close.png">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div id="form-header">
                                                                <h5>Add Review</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
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
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="comments">Comments*</label>
                                                                <textarea type="text" class="form-control" id="comments" placeholder="Comments..."></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn mb-2">Submit</button>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Lorem ipsum</td>
                        <td>Lorem</td>
                        <td>testting123@gmail.com</td>
                        <td>Free</td>
                        <td>$0</td>
                        <td>27 Nov 2020, 11:24:34</td>
                        <td class="act">
                            <a class="eye"><img src="images/eye.png" alt="eye"></a>
                            <div class="dropdown">
                                <a class="btn" role="button" id="dropdownDotLink5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="images/dots.png" alt="dots"></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownDotLink5">
                                    <a class="dropdown-item same" href="#">Download Note</a>
                                    <!-- Button trigger modal -->
                                    <a href="#" class="dropdown-item same" data-toggle="modal" data-target="#exampleModalCenter5">Add Review/Feedback</a>
                                    <a class="dropdown-item same" href="#">Report as inappropriate</a>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter5" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <img src="images/close.png">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div id="form-header">
                                                                <h5>Add Review</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
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
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="comments">Comments*</label>
                                                                <textarea type="text" class="form-control" id="comments" placeholder="Comments..."></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn mb-2">Submit</button>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Data Science</td>
                        <td>Science</td>
                        <td>testting123@gmail.com</td>
                        <td>Paid</td>
                        <td>$555</td>
                        <td>27 Nov 2020, 11:24:34</td>
                        <td class="act">
                            <a class="eye"><img src="images/eye.png" alt="eye"></a>
                            <div class="dropdown">
                                <a class="btn" role="button" id="dropdownDotLink6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="images/dots.png" alt="dots"></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownDotLink6">
                                    <a class="dropdown-item same" href="#">Download Note</a>
                                    <!-- Button trigger modal -->
                                    <a href="#" class="dropdown-item same" data-toggle="modal" data-target="#exampleModalCenter6">Add Review/Feedback</a>
                                    <a class="dropdown-item same" href="#">Report as inappropriate</a>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <img src="images/close.png">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div id="form-header">
                                                                <h5>Add Review</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
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
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="comments">Comments*</label>
                                                                <textarea type="text" class="form-control" id="comments" placeholder="Comments..."></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn mb-2">Submit</button>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Accounts</td>
                        <td>Commerce</td>
                        <td>testting123@gmail.com</td>
                        <td>Free</td>
                        <td>$0</td>
                        <td>27 Nov 2020, 11:24:34</td>
                        <td class="act">
                            <a class="eye"><img src="images/eye.png" alt="eye"></a>
                            <div class="dropdown">
                                <a class="btn" role="button" id="dropdownDotLink7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="images/dots.png" alt="dots"></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownDotLink7">
                                    <a class="dropdown-item same" href="#">Download Note</a>
                                    <!-- Button trigger modal -->
                                    <a href="#" class="dropdown-item same" data-toggle="modal" data-target="#exampleModalCenter7">Add Review/Feedback</a>
                                    <a class="dropdown-item same" href="#">Report as inappropriate</a>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter7" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <img src="images/close.png">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div id="form-header">
                                                                <h5>Add Review</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
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
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="comments">Comments*</label>
                                                                <textarea type="text" class="form-control" id="comments" placeholder="Comments..."></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn mb-2">Submit</button>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Social Studies</td>
                        <td>Social</td>
                        <td>testting123@gmail.com</td>
                        <td>Free</td>
                        <td>$0</td>
                        <td>27 Nov 2020, 11:24:34</td>
                        <td class="act">
                            <a class="eye"><img src="images/eye.png" alt="eye"></a>
                            <div class="dropdown">
                                <a class="btn" role="button" id="dropdownDotLink8" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="images/dots.png" alt="dots"></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownDotLink8">
                                    <a class="dropdown-item same" href="#">Download Note</a>
                                    <!-- Button trigger modal -->
                                    <a href="#" class="dropdown-item same" data-toggle="modal" data-target="#exampleModalCenter8">Add Review/Feedback</a>
                                    <a class="dropdown-item same" href="#">Report as inappropriate</a>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter8" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <img src="images/close.png">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div id="form-header">
                                                                <h5>Add Review</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
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
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="comments">Comments*</label>
                                                                <textarea type="text" class="form-control" id="comments" placeholder="Comments..."></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn mb-2">Submit</button>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>AI</td>
                        <td>IT</td>
                        <td>testting123@gmail.com</td>
                        <td>aid</td>
                        <td>$250</td>
                        <td>27 Nov 2020, 11:24:34</td>
                        <td class="act">
                            <a class="eye"><img src="images/eye.png" alt="eye"></a>
                            <div class="dropdown">
                                <a class="btn" role="button" id="dropdownDotLink9" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="images/dots.png" alt="dots"></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownDotLink9">
                                    <a class="dropdown-item same" href="#">Download Note</a>
                                    <!-- Button trigger modal -->
                                    <a href="#" class="dropdown-item same" data-toggle="modal" data-target="#exampleModalCenter9">Add Review/Feedback</a>
                                    <a class="dropdown-item same" href="#">Report as inappropriate</a>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter9" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <img src="images/close.png">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div id="form-header">
                                                                <h5>Add Review</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
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
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="comments">Comments*</label>
                                                                <textarea type="text" class="form-control" id="comments" placeholder="Comments..."></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn mb-2">Submit</button>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Lorem ipsum</td>
                        <td>Lorem</td>
                        <td>testting123@gmail.com</td>
                        <td>Free</td>
                        <td>$115</td>
                        <td>27 Nov 2020, 11:24:34</td>
                        <td class="act">
                            <a class="eye"><img src="images/eye.png" alt="eye"></a>
                            <div class="dropdown">
                                <a class="btn" role="button" id="dropdownDotLink10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="images/dots.png" alt="dots"></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownDotLink10">
                                    <a class="dropdown-item same" href="#">Download Note</a>
                                    <!-- Button trigger modal -->
                                    <a href="#" class="dropdown-item same" data-toggle="modal" data-target="#exampleModalCenter10">Add Review/Feedback</a>
                                    <a class="dropdown-item same" href="#">Report as inappropriate</a>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter10" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <img src="images/close.png">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div id="form-header">
                                                                <h5>Add Review</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="rate">
                                                                <input type="radio" id="10star5" name="rate" value="5" />
                                                                <label for="10star5" title="text">5 stars</label>
                                                                <input type="radio" id="10star4" name="rate" value="4" />
                                                                <label for="10star4" title="text">4 stars</label>
                                                                <input type="radio" id="10star3" name="rate" value="3" />
                                                                <label for="10star3" title="text">3 stars</label>
                                                                <input type="radio" id="10star2" name="rate" value="2" />
                                                                <label for="10star2" title="text">2 stars</label>
                                                                <input type="radio" id="10star1" name="rate" value="1" />
                                                                <label for="10star1" title="text">1 star</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="comments">Comments*</label>
                                                                <textarea type="text" class="form-control" id="comments" placeholder="Comments..."></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn mb-2">Submit</button>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </section>
    <!-- Pagination -->
    <nav id="pagination" class="download-p" aria-label="Page navigation example">
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
    <script src="js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- International JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js" integrity="sha512-DNeDhsl+FWnx5B1EQzsayHMyP6Xl/Mg+vcnFPXGNjUZrW28hQaa1+A4qL9M+AiOMmkAhKAWYHh1a+t6qxthzUw==" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" integrity="sha512-BNZ1x39RMH+UYylOW419beaGO0wqdSkO7pi1rYDYco9OL3uvXaC/GTqA5O4CVK2j4K9ZkoDNSSHVkEQKkgwdiw==" crossorigin="anonymous"></script>


    <!-- Custom JS -->
    <script src="js/mydownload.js?v=<?php echo time(); ?>"></script>

</body>

</html>
