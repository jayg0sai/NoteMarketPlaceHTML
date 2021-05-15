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
    <title>Manage Category</title>

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
    <link rel="stylesheet" href="css/managecategory.css?v=<?php echo time(); ?>">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/managecategory-responsive.css?v=<?php echo time(); ?>">

</head>

<body data-spy="scroll" data-target=".navbar">

    <!-- Navigation -->
    <?php include "navigation.php"; ?>
    <!-- Manage -->
    <section id="m-admin">
        <div class="container-fluid">
            <div class="row">
                <div class="tab-heading col-md-12 col-sm-12">
                    <h5>Manage Category</h5>
                </div>
                <div class="col-md-4">
                    <a href="addcategory.php" role="button" id="btn-add" class="btn" title="add">Add Category</a>
                </div>
                <div class="col-md-8 col-sm-12">
                    <form class="form-inline" action="managecategory.php" method="post">
                        <div class="form-group form-text">
                            <span class="form-control-feedback"><img src="images/search-icon.png" alt="search"></span>
                            <input type="text" class="form-control" name="search-input" id="search2" placeholder="Search">
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
                        <th scope="col">Category</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date Added</th>
                        <th scope="col">Added By</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
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
                        if(isset($_POST['search'])) {
                            $search = $_POST['search-input'];
                            $member_count = "SELECT * FROM note_categories WHERE CONCAT(Name,Description,CreatedDate) LIKE '%$search%' ";
                            $member_query = "SELECT * FROM note_categories WHERE CONCAT(Name,Description,CreatedDate) LIKE '%$search%' ORDER BY CreatedDate DESC LIMIT $page1,5 ";
                        } elseif(isset($_GET['source'])) {
                            $search = $_GET['source'];
                            $member_count = "SELECT * FROM note_categories WHERE CONCAT(Name,Description,CreatedDate) LIKE '%$search%' ";
                            $member_query = "SELECT * FROM note_categories WHERE CONCAT(Name,Description,CreatedDate) LIKE '%$search%' ORDER BY CreatedDate DESC LIMIT $page1,5 ";
                        }
                        else {
                            $search = "";
                            $member_count = "SELECT * FROM note_categories ";
                            $member_query = "SELECT * FROM note_categories ORDER BY CreatedDate DESC LIMIT $page1,5 ";
                        }
                    
                        
                        $find_count = mysqli_query($connection, $member_count);
                        if(!$find_count) {
                                die("Query Failed".mysqli_error($connection));
                            }
                        $down_count = mysqli_num_rows($find_count);

                        $page_count = ceil($down_count / 5);
                        
                        $member = mysqli_query($connection, $member_query);
                        if(!$member) {
                            die("Query Failed".mysqli_error($connection));
                        }
                        $count = 0;
                        $count = $count+$page1;
                        while($row = mysqli_fetch_assoc($member)) {
                            $cat_id = $row['ID'];
                            $c_val = $row['Name'];
                            $d_val = $row['Description'];
                            $user_date = $row['CreatedDate'];
                            $date=date_create($user_date);
                            $active = $row['IsActive'];
                            $by_id = $row['CreatedBy'];
                            
                            $contact_r = mysqli_query($connection,"SELECT * FROM users WHERE ID = '{$by_id}' ");
                        if(!$contact_r) {
                            die("Query Failed".mysqli_error($connection));
                        }
                        if(mysqli_num_rows($contact_r)>0){
                        $contact_row = mysqli_fetch_assoc($contact_r);
                        $name = $contact_row['FirstName']." ".$contact_row['LastName']; 
                        }
?>
                    <tr>
                        <td><?php echo $count=$count+1; ?></td>
                        <td><?php echo $c_val; ?></td>
                        <td><?php echo $d_val; ?></td>
                        <td><?php echo date_format($date,"d/m/Y"); ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php if($active == 1){echo "Yes";}else{echo"No";} ?></td>
                        <td class="act" style="padding:0;">
                            <a href="addcategory.php?cat=<?php echo $cat_id; ?>"><img src="images/edit.png" alt="edit"></a>
                            <a href="#" role="button" data-toggle="modal" data-target="#inModal<?php echo $count; ?>"><img src="images/delete.png" alt="del"></a>
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
                                            “Are you sure you want to make this category inactive?”
                                        </div>
                                        <div class="modal-footer">
                                            <a type="button"  class="btn btn-secondary" data-dismiss="modal">No</a>
                                            <a role="button" href="action.php?cat=<?php echo $cat_id; ?>&action=inactive_c" class="btn btn-danger">Yes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
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
                   echo '<li id="prev" class="page-item"><a class="page-link" href="managecategory.php?page='.($page - 1).'&source='.$search.'"><img src="images/left-arrow.png" alt="arrow"></a></li>';
            }
            
            for($i = 1; $i <= $page_count; $i++) {
                if($i == $page) {
                    echo '<li class="page-item number active"><a class="page-link" href="managecategory.php?page='.$i.'&source='.$search.'">'.$i.'</a></li>';
                } else {
                    echo '<li class="page-item number"><a class="page-link" href="managecategory.php?page='.$i.'&source='.$search.'">'.$i.'</a></li>';
                }
                
                
            }
            if($page<$page_count)
                   echo '<li id="next" class="page-item"><a class="page-link" href="managecategory.php?page='.($page + 1).'&source='.$search.'"><img src="images/right-arrow.png" alt="arrow"></a></li>';
                      
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
    <script src="js/managecategory.js?v=<?php echo time(); ?>"></script>

</body>

</html>
