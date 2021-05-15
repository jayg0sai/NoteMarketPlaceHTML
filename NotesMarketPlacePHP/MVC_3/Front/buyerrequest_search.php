<?php include "../includes/db.php"; ?>
<?php session_start(); ?>
<?php include "../includes/session_destroy.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tag -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <!-- Title -->
    <title>Buyer Requests</title>

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
    <link rel="stylesheet" href="css/buyerrequest.css?v=<?php echo time(); ?>">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/buyerrequest-responsive.css?v=<?php echo time(); ?>">

</head>

<body data-spy="scroll" data-target=".navbar">

    <!-- Navigation -->
    <?php include "navigation.php"; ?>

    <!-- Download -->
    <section id="download">
        <div class="container-fluid">
            <div class="row">
                <div class="tab-heading col-md-6 col-sm-12 col-xs-12">
                    <h5>Buyer Requests</h5>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <form class="form-inline" action="" method="post">
                        <div class="form-group form-text">
                            <span class="form-control-feedback"><img src="images/search-icon.png" alt="search"></span>
                            <input type="text" class="form-control" id="search1" placeholder="Search" name="search-input">
                        </div>
                        <button type="submit" class="btn search" name="search">Search</button>
                    </form>
                </div>
            </div>
            <div style="overflow-x: auto;">
                <table class="table table-hover" style="width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col">Sr No.</th>
                            <th scope="col">Note Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Buyer</th>
                            <th scope="col">Phone No.</th>
                            <th scope="col">Sell Type</th>
                            <th scope="col">Price</th>
                            <th scope="col">Downloaded Date/Time</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($_GET['page'])) {
                            $page = $_GET['page'];
                        } else {
                            $page = 1;
                        }
                        if($page == "" || $page == 1) {
                            $page1 = 0;
                        } else {
                            $page1 = ($page*10) - 10;
                        }
                        
                    if(isset($_GET['source'])) {
                        $search = $_GET['source'];
                    }
                    if(isset($_POST['search'])) {
                        $search = $_POST['search-input'];
                    }
                        $buyer_request_count = "SELECT * FROM downloads WHERE Seller = '{$_SESSION['userid']}' AND IsSellerHasAllowedDownload = b'0' AND (NoteTitle LIKE '%$search%' OR NoteCategory LIKE '%$search%' OR PurchasedPrice LIKE '%$search%') ";
                        $find_count = mysqli_query($connection, $buyer_request_count);
                        if(!$find_count) {
                                die("Query Failed".mysqli_error($connection));
                            }
                        $down_count = mysqli_num_rows($find_count);

                        $page_count = ceil($down_count / 10);
                        $buyer_request_query = "SELECT * FROM `downloads` WHERE Seller = {$_SESSION['userid']} AND IsSellerHasAllowedDownload= b'0' AND (NoteTitle LIKE '%$search%' OR NoteCategory LIKE '%$search%' OR PurchasedPrice LIKE '%$search%') ORDER BY AttachmentDownloadDate DESC LIMIT $page1,10 ";
                        $buyer_request = mysqli_query($connection,$buyer_request_query);
                        if(!$buyer_request) {
                            die("Query Failed".mysqli_error($connection));
                        }
                        $count = 0;
                        while($row = mysqli_fetch_assoc($buyer_request)) {
                            $download_id = $row['ID'];
                            $note_id = $row['NoteID'];
                            $title = $row['NoteTitle'];
                            $category = $row['NoteCategory'];
                            $define_cat = mysqli_query($connection,"SELECT * FROM note_categories WHERE ID = $category");
                            if(!$define_cat){die("Query Failed".mysqli_error($connection));}
                            $d_cat_row = mysqli_fetch_assoc($define_cat);
                            $category = $d_cat_row['Name'];
                            $downloader = $row['Downloader'];
                            $downloader_email_query = mysqli_query($connection,"SELECT EmailID FROM users WHERE ID = '{$downloader}' ");
                            if(!$downloader_email_query) {
                                die("Query Failed".mysqli_error($connection));
                            }
                            
                            $email_fetch = mysqli_fetch_assoc($downloader_email_query);
                            $downloader_email = $email_fetch['EmailID'];
                            $downloader_contact_query = mysqli_query($connection,"SELECT * FROM user_profile WHERE UserID = '{$downloader}' ");
                            if(!$downloader_contact_query) {
                                die("Query Failed".mysqli_error($connection));
                            }
                            $contact_fetch = mysqli_fetch_assoc($downloader_contact_query);
                            if($contact_fetch>0) {
                            $downloader_contact = $contact_fetch['Phonenumber_CountryCode'].$contact_fetch['Phonenumber'];
                            }
                            $selltype = $row['IsPaid'];
                            $price = $row['PurchasedPrice'];
                            $date = $row['AttachmentDownloadDate'];
?>
                        <tr>
                            <td><?php echo ++$count+$page1; ?></td>
                            <td><a href="notedetails.php?n_id=<?php echo $note_id; ?>"><?php echo $title; ?></a></td>
                            <td><?php echo $category; ?></td>
                            <td><?php echo $downloader_email; ?></td>
                            <td><?php if(isset($downloader_contact)) {echo "+".$downloader_contact;} ?></td>
                            <td><?php echo "Paid"; ?></td>
                            <td><?php echo "$".$price; ?></td>
                            <td><?php echo $date; ?></td>
                            <td class="act">
                                <a href="notedetails.php?n_id=<?php echo $note_id; ?>" class="eye"><img src="images/eye.png" alt="eye"></a>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn" role="button" id="dropdownDotLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="images/dots.png" alt="dots"></a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownDotLink1">
                                        <a class="dropdown-item same" href="allow_download.php?n_id=<?php echo $note_id; ?>&d_id=<?php echo $downloader; ?>">Allow Download</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                    <?php } if($count == 0) { echo "<h2>No record found</h2>";} ?>
                </table>
            </div>
        </div>
    </section>
    <!-- Pagination -->
    <nav id="pagination" class="download-p" aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            if($page>=2) {
                   echo '<li id="prev" class="page-item"><a class="page-link" href="buyerrequest_search.php?page='.($page - 1).'&source='.$search.'"><img src="images/left-arrow.png" alt="arrow"></a></li>';
            }
            
            for($i = 1; $i <= $page_count; $i++) {
                if($i == $page) {
                    echo '<li class="page-item number active"><a class="page-link" href="buyerrequest_search.php?page='.$i.'&source='.$search.'">'.$i.'</a></li>';
                } else {
                    echo '<li class="page-item number"><a class="page-link" href="buyerrequest_search.php?page='.$i.'&source='.$search.'">'.$i.'</a></li>';
                }
                
                
            }
            if($page<$page_count)
                   echo '<li id="next" class="page-item"><a class="page-link" href="buyerrequest_search.php?page='.($page + 1).'&source='.$search.'"><img src="images/right-arrow.png" alt="arrow"></a></li>';
                      
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
    <script src="js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- International JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js" integrity="sha512-DNeDhsl+FWnx5B1EQzsayHMyP6Xl/Mg+vcnFPXGNjUZrW28hQaa1+A4qL9M+AiOMmkAhKAWYHh1a+t6qxthzUw==" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" integrity="sha512-BNZ1x39RMH+UYylOW419beaGO0wqdSkO7pi1rYDYco9OL3uvXaC/GTqA5O4CVK2j4K9ZkoDNSSHVkEQKkgwdiw==" crossorigin="anonymous"></script>


    <!-- Custom JS -->
    <script src="js/buyerrequest.js?v=<?php echo time(); ?>"></script>

</body>

</html>
