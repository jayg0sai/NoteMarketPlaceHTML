<?php include "../includes/db.php"; ?>
<?php session_start(); ?>
<?php include "../includes/session_destroy.php"; ?>
<?php 

$sold_count_query = "SELECT * FROM downloads WHERE Seller = '{$_SESSION['userid']}' AND IsSellerHasAllowedDownload = b'1' ";
$sold_count = mysqli_query($connection, $sold_count_query);
    if(!$sold_count) {
        die("Query Failed".mysqli_error($connection));
    }
$total_sold_count = mysqli_num_rows($sold_count);
$total_earning = 0;
while($sold_row = mysqli_fetch_assoc($sold_count)) {
    $total_earning += $sold_row['PurchasedPrice'];
}

$downdb_count_query = "SELECT * FROM downloads WHERE Downloader = '{$_SESSION['userid']}' AND IsSellerHasAllowedDownload = b'1' ";
$downdb_count = mysqli_query($connection, $downdb_count_query);
    if(!$downdb_count) {
        die("Query Failed".mysqli_error($connection));
    }
$total_downdb_count = mysqli_num_rows($downdb_count);


$buyerreq_count_query = "SELECT * FROM downloads WHERE Seller = '{$_SESSION['userid']}' AND IsSellerHasAllowedDownload = b'0' ";
$buyerreq_count = mysqli_query($connection, $buyerreq_count_query);
    if(!$buyerreq_count) {
        die("Query Failed".mysqli_error($connection));
    }
$total_buyerreq_count = mysqli_num_rows($buyerreq_count);
?>
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
                                <h4><?php echo $total_sold_count; ?></h4>
                                <p>Number of Notes Sold</p>
                            </div>
                            <div class="notes-heading col-md-4 col-sm-4 col-6" onclick="window.location.href = 'mysold.php'; " onMouseOver="this.style.cursor='pointer' ">
                                <h4>$<?php echo $total_earning; ?></h4>
                                <p>Money Earned</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-5 m-t col-sm-12">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-4" onclick="window.location.href = 'mydownload.php'; " onMouseOver="this.style.cursor='pointer' ">
                            <div class="notes">
                                <h4><?php echo $total_downdb_count; ?></h4>
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
                                <h4><?php echo $total_buyerreq_count; ?></h4>
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
                    <form class="form-inline" action="inprog_search.php" method="post">
                        <div class="form-group form-text">
                            <span class="form-control-feedback"><img src="images/search-icon.png" alt="search"></span>
                            <input type="text" class="form-control" id="search1" placeholder="Search" name="search-input">
                        </div>
                        <button type="submit" class="btn search" name="search">Search</button>
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
                       <?php
                        if(isset($_GET['page'])) {
                            $page = $_GET['page'];
                        } else {
                            $page = 1;
                        }
                        if($page == "" || $page == 1) {
                            $page1 = 0;
                        } else {
                            $page1 = ($page*5) - 5;
                        }
                        $progress_count_1 = "SELECT * FROM seller_notes WHERE SellerID = '{$_SESSION['userid']}' AND Status IN (10,11,12) ";
                        $find_count_1 = mysqli_query($connection, $progress_count_1);
                        if(!$find_count_1) {
                                die("Query Failed".mysqli_error($connection));
                            }
                        $down_count_1 = mysqli_num_rows($find_count_1);

                        $page_count_1 = ceil($down_count_1 / 5);
                        $download_query_1 = "SELECT * FROM seller_notes WHERE SellerID = '{$_SESSION['userid']}' AND Status IN (10,11,12) ORDER BY CreatedDate DESC LIMIT $page1,5 ";
                        $download_1 = mysqli_query($connection, $download_query_1);
                        if(!$download_1) {
                            die("Query Failed".mysqli_error($connection));
                        }
                        $count_1 = 0;
                        while($row_1 = mysqli_fetch_assoc($download_1)) {
                            $note_id_1 = $row_1['ID'];
                            $title_1 = $row_1['Title'];
                            $category_1 = $row_1['Category'];
                            $date_1 = $row_1['CreatedDate'];
                            $status_1 = $row_1['Status'];
                            $define_cat = mysqli_query($connection,"SELECT * FROM note_categories WHERE ID = $category_1");
                            if(!$define_cat){die("Query Failed".mysqli_error($connection));}
                            $d_cat_row = mysqli_fetch_assoc($define_cat);
                            $category_1 = $d_cat_row['Name'];
?>
                       
                        <tr>
                            <td><?php echo $date_1; ?></td>
                            <td><?php echo $title_1; ?></td>
                            <td><?php echo $category_1; ?></td>
                            <td><?php if($status_1 == 10) {echo "Draft";} elseif($status_1 == 11) {echo "Submitted For Review";} else {echo "In Review";} ?></td>
                            <td class="act">
                               <?php if($status_1 == 10) { ?>
                                <a href="editnote.php?n_id=<?php echo $note_id_1; ?>"><img src="images/edit.png" alt="act"></a>
                                <a href="delete.php?n_id=<?php echo $note_id_1; ?>" role="button" onclick="return confirm('“Are you sure, you want to delete this note?”');"><img src="images/delete.png" alt="act"></a>
                                <?php } else { ?>
                                <a href="notedetails.php?n_id=<?php echo $note_id_1; ?>"><img src="images/eye.png" alt="act"></a> <?php } ?>
                            </td>
                        </tr>
                        
                    </tbody>
                    <?php } if($down_count_1 == 0) { echo "<h2>No record found</h2>";} ?>
                </table>
            </div>
        </div>
    </section>
    <!-- Pagination -->
    <nav id="pagination1" class="progress-p" aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            if($page>=2) {
                   echo '<li id="prev" class="page-item"><a class="page-link" href="dashboard.php?page='.($page - 1).'"><img src="images/left-arrow.png" alt="arrow"></a></li>';
            }
            
            for($i = 1; $i <= $page_count_1; $i++) {
                if($i == $page) {
                    echo '<li class="page-item number active"><a class="page-link" href="dashboard.php?page='.$i.'">'.$i.'</a></li>';
                } else {
                    echo '<li class="page-item number"><a class="page-link" href="dashboard.php?page='.$i.'">'.$i.'</a></li>';
                }
                
                
            }
            if($page<$page_count_1)
                   echo '<li id="next" class="page-item"><a class="page-link" href="dashboard.php?page='.($page + 1).'"><img src="images/right-arrow.png" alt="arrow"></a></li>';
                      
            ?>
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
                    <form class="form-inline" action="publish_search.php" method="post">
                        <div class="form-group form-text">
                            <span class="form-control-feedback"><img src="images/search-icon.png" alt="search"></span>
                            <input type="text" class="form-control" id="search2" placeholder="Search" name="search-input">
                        </div>
                        <button type="submit" class="btn search" name="search">Search</button>
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
                       <?php
                        if(isset($_GET['pagep'])) {
                            $pagep = $_GET['pagep'];
                        } else {
                            $pagep = 1;
                        }
                        if($pagep == "" || $pagep == 1) {
                            $page1p = 0;
                        } else {
                            $page1p = ($pagep*5) - 5;
                        }
                        if(isset($_GET['source'])) {
                        $search = $_GET['source'];
                    }
                    if(isset($_POST['search'])) {
                        $search = $_POST['search-input'];
                    }
                        $progress_count = "SELECT * FROM seller_notes WHERE SellerID = '{$_SESSION['userid']}' AND Status = 13 AND (Title LIKE '%$search%' OR Category LIKE '%$search%' OR SellingPrice LIKE '%$search%') ";
                        $find_count = mysqli_query($connection, $progress_count);
                        if(!$find_count) {
                                die("Query Failed".mysqli_error($connection));
                            }
                        $down_count = mysqli_num_rows($find_count);

                        $page_count = ceil($down_count / 5);
                        $download_query = "SELECT * FROM seller_notes WHERE SellerID = '{$_SESSION['userid']}' AND Status = 13 AND (Title LIKE '%$search%' OR Category LIKE '%$search%' OR SellingPrice LIKE '%$search%') ORDER BY CreatedDate DESC LIMIT $page1p,5 ";
                        $download = mysqli_query($connection, $download_query);
                        if(!$download) {
                            die("Query Failed".mysqli_error($connection));
                        }
                        $count = 0;
                        while($row = mysqli_fetch_assoc($download)) {
                            $note_id = $row['ID'];
                            $title = $row['Title'];
                            $category = $row['Category'];
                            $date = $row['PublishedDate'];
                            $status = $row['Status'];
                            $price = $row['SellingPrice'];
                            $ispaid = $row['IsPaid'];
                            $define_cat_1 = mysqli_query($connection,"SELECT * FROM note_categories WHERE ID = $category");
                            if(!$define_cat_1){die("Query Failed".mysqli_error($connection));}
                            $d1_cat_row = mysqli_fetch_assoc($define_cat_1);
                            $category = $d1_cat_row['Name'];
?>
                        <tr>
                            <td><?php echo $date; ?></td>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $category; ?></td>
                            <td><?php if($ispaid == 0) {echo "Free";} else {echo "Paid";} ?></td>
                            <td><?php echo "$".$price; ?></td>
                            <td class="eye"><a href="notedetails.php?n_id=<?php echo $note_id; ?>"><img src="images/eye.png" alt="act"></a></td>
                        </tr>
                    </tbody>
                    <?php } if($down_count == 0) { echo "<h2>No record found</h2>";} ?>
                </table>
            </div>
        </div>
    </section>

    <!-- Pagination -->
    <nav id="pagination2" class="publish-p" aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            if($pagep>=2) {
                   echo '<li id="prev" class="page-item"><a class="page-link" href="publish_search.php?pagep='.($pagep - 1).'&source='.$search.'"><img src="images/left-arrow.png" alt="arrow"></a></li>';
            }
            
            for($j = 1; $j <= $page_count; $j++) {
                if($j == $pagep) {
                    echo '<li class="page-item number active"><a class="page-link" href="publish_search.php?pagep='.$j.'&source='.$search.'">'.$j.'</a></li>';
                } else {
                    echo '<li class="page-item number"><a class="page-link" href="publish_search.php?pagep='.$j.'&source='.$search.'">'.$j.'</a></li>';
                }
                
                
            }
            if($pagep<$page_count)
                   echo '<li id="next" class="page-item"><a class="page-link" href="publish_search.php?pagep='.($pagep + 1).'&source='.$search.'"><img src="images/right-arrow.png" alt="arrow"></a></li>';
                      
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
    <script src="js/dashboard.js?v=<?php echo time(); ?>"></script>

</body>

</html>
