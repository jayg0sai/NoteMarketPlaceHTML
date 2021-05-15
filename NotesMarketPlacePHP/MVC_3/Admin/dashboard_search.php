<?php include "../includes/db.php"; ?>
<?php session_start(); ?>
<?php include "../includes/session_destroy.php"; ?>
<?php

    $ir_q = "SELECT * FROM seller_notes WHERE Status IN (11,12) ";
    $ir = mysqli_query($connection, $ir_q);
    if(!$ir) {
        die("Query Failed".mysqli_error($connection));
        }
    $ir_count = mysqli_num_rows($ir);

    $do_q = "SELECT * FROM downloads WHERE AttachmentDownloadDate >= now() - INTERVAL 7 DAY ";
    $do = mysqli_query($connection, $do_q);
    if(!$do) {
        die("Query Failed".mysqli_error($connection));
        }
    $do_count = mysqli_num_rows($do);

    $re_q = "SELECT * FROM users WHERE CreatedDate >= now() - INTERVAL 7 DAY ";
    $re = mysqli_query($connection, $re_q);
    if(!$re) {
        die("Query Failed".mysqli_error($connection));
        }
    $re_count = mysqli_num_rows($re);

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
                <div id="dashboard-heading" class="col-md-12">
                    <h3>Dashboard</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4 col-sm-4 col-4">
                    <div class="notes">
                        <h4><a href = "notesunderreview.php"><?php echo $ir_count; ?></a></h4>
                        <p>Numbers of Notes in Review for Publish</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-4">
                    <div class="notes">
                        <h4><a href = "download.php"><?php echo $do_count; ?></a></h4>
                        <p>Numbers of New Notes Downloaded (Last 7 days)</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-4">
                    <div class="notes">
                        <h4><a href = "member.php"><?php echo $re_count; ?></a></h4>
                        <p>Number of New Registrations (Last 7 days)</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Published -->
    <section id="publish">
        <div class="container-fluid">
            <div class="row">
                <div class="tab-heading col-md-4 col-sm-12">
                    <h5>Published Notes</h5>
                </div>
                <div class="col-md-8 col-sm-12">
                    <form class="form-inline" action="dashboard_search.php" method="post">
                        <div class="form-group form-text">
                            <span class="form-control-feedback"><img src="images/search-icon.png" alt="search"></span>
                            <input type="text" name="search-input" class="form-control" id="search2" placeholder="Search">
                        </div>
                        <button type="submit" name="search" class="btn search">Search</button>
                        <div class="form-group select">
                            <select class="form-control" id="month" name="month">
                                <option value="">Select Month</option>
                                <option value="<?php echo date('Y-m'); ?>"><?php echo date('M Y'); ?></option>
                                <option value="<?php echo date('Y-m',strtotime('-1 months')); ?>"><?php echo date('M Y',strtotime('-1 months')); ?></option>
                                <option value="<?php echo date('Y-m',strtotime('-2 months')); ?>"><?php echo date('M Y',strtotime('-2 months')); ?></option>
                                <option value="<?php echo date('Y-m',strtotime('-3 months')); ?>"><?php echo date('M Y',strtotime('-3 months')); ?></option>
                                <option value="<?php echo date('Y-m',strtotime('-4 months')); ?>"><?php echo date('M Y',strtotime('-4 months')); ?></option>
                                <option value="<?php echo date('Y-m',strtotime('-5 months')); ?>"><?php echo date('M Y',strtotime('-5 months')); ?></option>
                                
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div style="overflow-x:auto;">
            <table class="table table-hover" style="width:100%;">
                <thead>
                    <tr>
                        <th scope="col">Sr No.</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Attachment Size</th>
                        <th scope="col">Sell Type</th>
                        <th scope="col">Price</th>
                        <th scope="col">Publisher</th>
                        <th scope="col">Published Date</th>
                        <th scope="col">Number of Downloads</th>
                        <th scope="col"></th>
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
                        if(isset($_GET['source'])) {
                            $search = $_GET['source'];
                        }
                        if(isset($_GET['month'])) {
                            $month = $_GET['month'];
                        }
                        if(isset($_POST['search'])) {
                            $search = $_POST['search-input'];
                            $month = $_POST['month'];
                        }
                        
                        $download_count = "SELECT * FROM seller_notes WHERE Status = 13 ";
                        $main = "";
                        if(!empty($search)) {
                            $main .= "AND CONCAT(ActionedBy,PublishedDate,Title,Category,IsPaid,SellingPrice) LIKE '%$search%' ";
                        }
                        if(!empty($month)) {
                            $main .= "AND PublishedDate LIKE '%$month%' ";
                        }
                        $download_count.=$main;
                        $find_count = mysqli_query($connection, $download_count);
                        if(!$find_count) {
                                die("Query Failed".mysqli_error($connection));
                            }
                        $down_count = mysqli_num_rows($find_count);

                        $page_count = ceil($down_count / 5);
                        $download_query = "SELECT * FROM seller_notes WHERE Status = 13 ".$main." ORDER BY PublishedDate LIMIT $page1,5 ";
                        $download = mysqli_query($connection, $download_query);
                        if(!$download) {
                            die("Query Failed".mysqli_error($connection));
                        }
                        $count = 0;
                        $count = $count+$page1;
                        while($row = mysqli_fetch_assoc($download)) {
                            $note_id = $row['ID'];
                            $approver = $row['ActionedBy'];
                            $title = $row['Title'];
                            $category = $row['Category'];
                            $seller = $row['SellerID'];
                            $ispaid = $row['IsPaid'];
                            $price = $row['SellingPrice'];
                            $seller_email_query = mysqli_query($connection,"SELECT * FROM users WHERE ID = '{$seller}' ");
                            if(!$seller_email_query) {
                                die("Query Failed".mysqli_error($connection));
                            }
                            $email_fetch = mysqli_fetch_assoc($seller_email_query);
                            $seller_name = $email_fetch['FirstName']." ".$email_fetch['LastName'];
                            
                            $approver_email_query = mysqli_query($connection,"SELECT * FROM users WHERE ID = '{$approver}' ");
                            if(!$approver_email_query) {
                                die("Query Failed".mysqli_error($connection));
                            }
                            $approver_fetch = mysqli_fetch_assoc($approver_email_query);
                            $approver_name = $approver_fetch['FirstName']." ".$approver_fetch['LastName'];
                            
                            $seller_email = $email_fetch['EmailID'];
                            $date = $row['PublishedDate'];
                            $date=date_create($date);
                            $status = $row['Status'];
                            $down_q = "SELECT * FROM downloads WHERE NoteID = '{$note_id}' AND IsAttachmentDownload = b'1' ";
                            $down = mysqli_query($connection, $down_q);
                            if(!$down) {
                                die("Query Failed".mysqli_error($connection));
                            }
                            $total_down = mysqli_num_rows($down);
                            
                            $file = mysqli_query($connection, "SELECT * FROM seller_notes_attachment WHERE NoteID = $note_id ");
                            if(!$file){die("Query Failed".mysqli_error($connection));}
                            $file_row = mysqli_fetch_assoc($file);
                            if(!empty($file_row['FilePath'])) {
                                $filesize = filesize($file_row['FilePath']);
                            } else {
                                $filesize = 0;
                            }
                                if ($filesize >= 1048576)
                                {
                                    $filesize = number_format($filesize / 1048576, 2) . ' MB';
                                }
                                elseif ($filesize >= 1024)
                                {
                                    $filesize = number_format($filesize / 1024, 2) . ' KB';
                                }
                                elseif ($filesize > 1)
                                {
                                    $filesize = $filesize . ' bytes';
                                }
                                elseif ($filesize == 1)
                                {
                                    $filesize = $filesize . ' byte';
                                }
                                else
                                {
                                    $filesize = '0 bytes';
                                }                        
?>
                    <tr>
                        <td><?php echo $count=$count+1; ?></td>
                        <td><a href="notedetails.php?n_id=<?php echo $note_id; ?>"><?php echo $title; ?></a></td>
                        <td><?php echo $category; ?></td>
                        <td><?php echo $filesize; ?></td>
                        <td><?php if($ispaid == 0){echo "Free";}else {echo "Paid";} ?></td>
                        <td><?php if($price == ""){echo "$0";} else{echo "$".$price;} ?></td>
                        <td><?php echo $approver_name; ?></td>
                        <td><?php echo date_format($date,"d/m/Y"); ?></td>
                        <td><a href="download.php?n_id=<?php echo $note_id; ?>"><?php echo $total_down; ?></a></td>
                        <td class="act">
                            <div class="dropdown">
                                <a class="btn" role="button" id="dropdownDotLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="images/dots.png" alt="dots"></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownDotLink1">
                                    <a class="dropdown-item same" href="../Front/file_download.php?n_id=<?php echo $note_id; ?>">Download Note</a>
                                    <a class="dropdown-item same" href="notedetails.php?n_id=<?php echo $note_id; ?>">View More Details</a>
                                    <a class="dropdown-item same" style="cursor:pointer;" data-toggle="modal" data-target="#unModal<?php echo $count; ?>">Unpublish</a>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="unModal<?php echo $count; ?>" tabindex="-1" role="dialog" aria-labelledby="unModal<?php echo $count; ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <img src="images/close.png">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="action.php?n_id=<?php echo $note_id; ?>&action=unpublish1&name=<?php echo $seller_name; ?>&email=<?php echo $seller_email; ?>" method="post">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div id="form-header">
                                                                <h5><?php echo $title; ?></h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="comments">Remarks*</label>
                                                                <textarea type="text" class="form-control" id="remarks" name="remark" placeholder="Remarks..." required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" name="spam" class="btn btn-danger" onclick="return confirm('Are you sure you want to Unpublish this note?');">Unpublish</button>
                                                    <button class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cancel</button>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
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
                   echo '<li id="prev" class="page-item"><a class="page-link" href="dashboard_search.php?page='.($page - 1).'&source='.$search.'&month='.$month.'"><img src="images/left-arrow.png" alt="arrow"></a></li>';
            }
            
            for($i = 1; $i <= $page_count; $i++) {
                if($i == $page) {
                    echo '<li class="page-item number active"><a class="page-link" href="dashboard_search.php?page='.$i.'&source='.$search.'&month='.$month.'">'.$i.'</a></li>';
                } else {
                    echo '<li class="page-item number"><a class="page-link" href="dashboard_search.php?page='.$i.'&source='.$search.'&month='.$month.'">'.$i.'</a></li>';
                }
                
                
            }
            if($page<$page_count)
                   echo '<li id="next" class="page-item"><a class="page-link" href="dashboard_search.php?page='.($page + 1).'&source='.$search.'&month='.$month.'"><img src="images/right-arrow.png" alt="arrow"></a></li>';
                      
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
    <script src="js/dashboard.js?v=<?php echo time(); ?>"></script>

</body>

</html>
