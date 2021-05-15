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
    <title>Notes Under Review</title>

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
    <link rel="stylesheet" href="css/notesunderreview.css?v=<?php echo time(); ?>">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/notesunderreview-responsive.css?v=<?php echo time(); ?>">

</head>

<body data-spy="scroll" data-target=".navbar">

    <!-- Navigation -->
    <?php include "navigation.php"; ?>

    <!-- Published -->
    <section id="member">
        <div class="container-fluid">
            <div class="row">
                <div class="tab-heading col-md-12 col-sm-12">
                    <h5>Notes Under Review</h5>
                </div>
                <div class="col-md-12">
                    <label for="seller">Seller</label>
                </div>
                <div class="col-md-4">
                   <form method="post">
                    <div class="form-group">

                        <div class="col">

                            <select class="form-control select" id="seller" name="seller">
                                <option value="">Select seller</option>
                        <?php 
                        $fors_query = "SELECT DISTINCT SellerID FROM seller_notes WHERE Status IN (11,12)";
                        $fors = mysqli_query($connection, $fors_query);
                        if(!$fors) {
                            die("Query Failed".mysqli_error($connection));
                        }
                        while($fors_row = mysqli_fetch_assoc($fors)) {
                            $fors_s = $fors_row['SellerID'];
                            $fors_s_query = mysqli_query($connection,"SELECT * FROM users WHERE ID = '{$fors_s}' ");
                            if(!$fors_s_query) {
                                die("Query Failed".mysqli_error($connection));
                            }
                            $fors_fetch = mysqli_fetch_assoc($fors_s_query);
                            $fors_name = $fors_fetch['FirstName']." ".$fors_fetch['LastName'];
?>
                                <option value="<?php echo $fors_name; ?>"><?php echo $fors_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                    </form>
                </div>
                <div class="col-md-8 col-sm-12">
                    <form class="form-inline" action="notesunderreview.php" method="post">
                        <div class="form-group form-text">
                            <span class="form-control-feedback"><img src="images/search-icon.png" alt="search"></span>
                            <input type="text" name="search-input" class="form-control" id="search2" placeholder="Search">
                        </div>
                        <button type="submit" name="search" class="btn search">Search</button>
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
                            <th scope="col">Seller</th>
                            <th scope="col"></th>
                            <th scope="col">Date Added</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="mytable">
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
                        
                        if(isset($_POST['search'])) {
                            $search = $_POST['search-input'];
                            
                            $download_count = "SELECT * FROM seller_notes WHERE Status IN (11,12) AND CONCAT(Title,Category,CreatedDate) LIKE '%$search%' ";
                            $download_query = "SELECT * FROM seller_notes WHERE Status IN (11,12) AND CONCAT(Title,Category,CreatedDate) LIKE '%$search%' ORDER BY CreatedDate LIMIT $page1,5 ";
                        } elseif(isset($_GET['source'])) {
                            $search = $_GET['source'];
                            
                            $download_count = "SELECT * FROM seller_notes WHERE Status IN (11,12) AND CONCAT(Title,Category,CreatedDate) LIKE '%$search%' ";
                            $download_query = "SELECT * FROM seller_notes WHERE Status IN (11,12) AND CONCAT(Title,Category,CreatedDate) LIKE '%$search%' ORDER BY CreatedDate LIMIT $page1,5 ";
                        }
                        else {
                            $search = "";
                            $download_count = "SELECT * FROM seller_notes WHERE Status IN (11,12) ";
                            $download_query = "SELECT * FROM seller_notes WHERE Status IN (11,12) ORDER BY CreatedDate LIMIT $page1,5 ";
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
                            $note_id = $row['ID'];
                            $title = $row['Title'];
                            $category = $row['Category'];
                            $define_cat = mysqli_query($connection,"SELECT * FROM note_categories WHERE ID = $category");
                            if(!$define_cat){die("Query Failed".mysqli_error($connection));}
                            $d_cat_row = mysqli_fetch_assoc($define_cat);
                            $category = $d_cat_row['Name'];
                            $seller = $row['SellerID'];
                            $seller_email_query = mysqli_query($connection,"SELECT * FROM users WHERE ID = '{$seller}' ");
                            if(!$seller_email_query) {
                                die("Query Failed".mysqli_error($connection));
                            }
                            $email_fetch = mysqli_fetch_assoc($seller_email_query);
                            $seller_name = $email_fetch['FirstName']." ".$email_fetch['LastName'];
                            $date = $row['CreatedDate'];
                            $date=date_create($date);
                            $status = $row['Status'];

?>
                        <tr>
                            <td><?php echo $count=$count+1; ?></td>
                            <td><a href="notedetails.php?n_id=<?php echo $note_id; ?>"><?php echo $title; ?></a></td>
                            <td><?php echo $category; ?></td>
                            <td><?php echo $seller_name; ?></td>
                            <td><a href="memberdetails.php?id=<?php echo $seller; ?>"><img src="images/eye.png"></a></td>
                            <td><?php echo date_format($date,"d/m/Y"); ?></td>
                            <td><?php if($status == 11) {echo "Submitted For Review";} else {echo "InReview";} ?></td>
                            <td>
                                <a class="btn btn-success" role="button" title="Approve" data-toggle="modal" data-target="#pModal<?php echo $count; ?>">Approve</a><a class="btn btn-danger" role="button" title="Reject"data-toggle="modal" data-target="#rModal<?php echo $count; ?>">Reject</a><a class="btn btn-secondary" role="button" title="InReview" data-toggle="modal" data-target="#inModal<?php echo $count; ?>">InReview</a>

                            </td>
                            <!-- Modal -->
                            <div class="modal fade" id="inModal<?php echo $count; ?>" tabindex="-1" role="dialog" aria-labelledby="inModalLabel<?php echo $count; ?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            “Via marking the note In Review – System will let user know that review process has been initiated. Please press yes to continue.”
                                        </div>
                                        <div class="modal-footer">
                                            <a type="button"  class="btn btn-secondary" data-dismiss="modal">No</a>
                                            <a role="button" href="action.php?n_id=<?php echo $note_id; ?>&action=inreview" class="btn btn-success">Yes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="pModal<?php echo $count; ?>" tabindex="-1" role="dialog" aria-labelledby="pModalLabel<?php echo $count; ?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            “If you approve the notes – System will publish the notes over portal. Please press yes to continue.”
                                        </div>
                                        <div class="modal-footer">
                                            <a type="button"  class="btn btn-secondary" data-dismiss="modal">No</a>
                                            <a role="button" href="action.php?n_id=<?php echo $note_id; ?>&action=approve" class="btn btn-success">Yes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="rModal<?php echo $count; ?>" tabindex="-1" role="dialog" aria-labelledby="rModal<?php echo $count; ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <img src="images/close.png">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="action.php?n_id=<?php echo $note_id; ?>&action=reject" method="post">
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
                                                    <button type="submit" name="spam" class="btn btn-danger" onclick="return confirm('Are you sure you want to do that?');">Reject</button>
                                                    <button class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cancel</button>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </section>

    <!-- Pagination -->
    <nav id="pagination2" class="publish-p" aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            if($page>=2) {
                   echo '<li id="prev" class="page-item"><a class="page-link" href="notesunderreview.php?page='.($page - 1).'&source='.$search.'"><img src="images/left-arrow.png" alt="arrow"></a></li>';
            }
            
            for($i = 1; $i <= $page_count; $i++) {
                if($i == $page) {
                    echo '<li class="page-item number active"><a class="page-link" href="notesunderreview.php?page='.$i.'&source='.$search.'">'.$i.'</a></li>';
                } else {
                    echo '<li class="page-item number"><a class="page-link" href="notesunderreview.php?page='.$i.'&source='.$search.'">'.$i.'</a></li>';
                }
                
                
            }
            if($page<$page_count)
                   echo '<li id="next" class="page-item"><a class="page-link" href="notesunderreview.php?page='.($page + 1).'&source='.$search.'"><img src="images/right-arrow.png" alt="arrow"></a></li>';
                      
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
    <script src="js/notesunderreview.js?v=<?php echo time(); ?>"></script>

</body>

</html>
