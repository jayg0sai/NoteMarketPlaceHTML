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
    <title>Download Notes</title>

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
    <link rel="stylesheet" href="css/download.css?v=<?php echo time(); ?>">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/download-responsive.css?v=<?php echo time(); ?>">

</head>

<body data-spy="scroll" data-target=".navbar">

    <!-- Navigation -->
    <?php include "navigation.php"; ?>
    
    <!-- Published -->
    <section id="member">
        <div class="container-fluid">
            <div class="row">
                <div class="tab-heading col-md-12 col-sm-12">
                    <h5>Download Notes</h5>
                </div>
                <div class="col-md-6 col-sm-12">
                   <div class="row">
                    <div class="form-group col-md">
                       <label for="note">Note</label>
                        <div class="col">
                            
                            <select class="form-control select" id="note" name="note">
                                <option>Select note</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md">
                       <label for="seller">Seller</label>
                        <div class="col">
                            
                            <select class="form-control select" id="seller" name="seller">
                                <option>Select seller</option>
                                <option>Khyati</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md">
                       <label for="buyer">Buyer</label>
                        <div class="col">
                            
                            <select class="form-control select" id="buyer" name="buyer">
                                <option>Select buyer</option>
                                <option>Rahul Shah</option>
                            </select>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <form class="form-inline">
                        <div class="form-group form-text">
                            <span class="form-control-feedback"><img src="images/search-icon.png" alt="search"></span>
                            <input type="text" class="form-control" id="search2" placeholder="Search">
                        </div>
                        <button type="submit" class="btn search">Search</button>
                    </form>
                </div>
            </div>

            <div style="overflow-x:auto;">
            <table class="table table-hover" style="width:100%;">
                <thead>
                    <tr>
                        <th scope="col">Sr No.</th>
                        <th scope="col">Note Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Buyer</th>
                        <th scope="col"></th>
                        <th scope="col">Seller</th>
                        <th scope="col"></th>
                        <th scope="col">Sell Type</th>
                        <th scope="col">Price</th>
                        <th scope="col">Downloaded Date/Time</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                    
                        if(isset($_GET['page'])) {
                            $page = $_GET['page'];
                        }
                    
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
                        if(isset($_GET['n_id'])) {
                            $n_id = $_GET['n_id'];
                            $download_count = "SELECT * FROM downloads WHERE IsSellerHasAllowedDownload = b'1' AND NoteID = $n_id ";
                            $download_query = "SELECT * FROM downloads WHERE IsSellerHasAllowedDownload = b'1' AND NoteID = $n_id ORDER BY AttachmentDownloadDate DESC LIMIT $page1,5 ";
                        } else {
                            $download_count = "SELECT * FROM downloads WHERE IsSellerHasAllowedDownload = b'1' ";
                            $download_query = "SELECT * FROM downloads WHERE IsSellerHasAllowedDownload = b'1' ORDER BY AttachmentDownloadDate DESC LIMIT $page1,5 ";
                        }
                        
                        $find_count = mysqli_query($connection, $download_count);
                        if(!$find_count) {
                                die("Query Failed".mysqli_error($connection));
                            }
                        $down_count = mysqli_num_rows($find_count);

                        $page_count = ceil($down_count / 5);
                        
                        $download = mysqli_query($connection, $download_query);
                        if(!$download) {
                            die("Query Failed".mysqli_error($connection));
                        }
                        $count = 0;
                        $count = $count+$page1;
                        while($row = mysqli_fetch_assoc($download)) {
                            $download_id = $row['ID'];
                            $note_id = $row['NoteID'];
                            $title = $row['NoteTitle'];
                            $category = $row['NoteCategory'];
                            $seller = $row['Seller'];
                            $buyer = $row['Downloader'];
                            $seller_email_query = mysqli_query($connection,"SELECT * FROM users WHERE ID = '{$seller}' ");
                            if(!$seller_email_query) {
                                die("Query Failed".mysqli_error($connection));
                            }
                            $email_fetch = mysqli_fetch_assoc($seller_email_query);
                            $seller_name = $email_fetch['FirstName']." ".$email_fetch['LastName'];
                            
                            $buyer_email_query = mysqli_query($connection,"SELECT * FROM users WHERE ID = '{$buyer}' ");
                            if(!$buyer_email_query) {
                                die("Query Failed".mysqli_error($connection));
                            }
                            $buyer_fetch = mysqli_fetch_assoc($buyer_email_query);
                            $buyer_name = $buyer_fetch['FirstName']." ".$buyer_fetch['LastName'];
                            $selltype = $row['IsPaid'];
                            $price = $row['PurchasedPrice'];
                            $date = $row['AttachmentDownloadDate'];
?>
                    <tr>
                        <td><?php echo $count=$count+1; ?></td>
                        <td><a href="notedetails.php?n_id=<?php echo $note_id; ?>"><?php echo $title; ?></a></td>
                        <td><?php echo $category; ?></td>
                        <td><?php echo $buyer_name; ?></td>
                        <td><img src="images/eye.png"></td>
                        <td><?php echo $seller_name; ?></td>
                        <td><img src="images/eye.png"></td>
                        <td><?php if($selltype == 0) { echo "Free"; } else {
                                echo "Paid";
                            } ?></td>
                        <td><?php echo "$".$price; ?></td>
                        <td><?php echo $date; ?></td>
                        <td class="act">
                            <div class="dropdown">
                                <a class="btn" role="button" id="dropdownDotLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="images/dots.png" alt="dots"></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownDotLink1">
                                    <a class="dropdown-item same" href="../Front/file_download.php?n_id=<?php echo $note_id; ?>">Download Note</a>
                                    <a class="dropdown-item same" href="notedetails.php?n_id=<?php echo $note_id; ?>">View More Details</a>
                                </div>
                            </div>
                        </td>
                    </tr>
<?php } ?>
                </tbody>
            </table>
            </div>
        </div>
    </section>

    <!-- Pagination -->
    <nav id="pagination2" class="publish-p" aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            if($page>=2) {
                   echo '<li id="prev" class="page-item"><a class="page-link" href="download.php?page='.($page - 1).'"><img src="images/left-arrow.png" alt="arrow"></a></li>';
            }
            
            for($i = 1; $i <= $page_count; $i++) {
                if($i == $page) {
                    echo '<li class="page-item number active"><a class="page-link" href="download.php?page='.$i.'">'.$i.'</a></li>';
                } else {
                    echo '<li class="page-item number"><a class="page-link" href="download.php?page='.$i.'">'.$i.'</a></li>';
                }
                
                
            }
            if($page<$page_count)
                   echo '<li id="next" class="page-item"><a class="page-link" href="download.php?page='.($page + 1).'"><img src="images/right-arrow.png" alt="arrow"></a></li>';
                      
            ?>
        </ul>
    </nav>

    <!-- footer -->
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-8 col-12">
                    <p>Version : 1.1.24</p>
                </div>
                <div class="col-md-6 col-sm-4 col-12">
                    <div id="copyright">
                        <p>
                            Copyright &copy; Tatwasoft All rights reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="js/download.js?v=<?php echo time(); ?>"></script>

</body>

</html>
