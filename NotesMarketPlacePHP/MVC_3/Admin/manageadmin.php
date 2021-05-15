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
    <title>Manage Administrator</title>

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
    <link rel="stylesheet" href="css/manageadmin.css?v=<?php echo time(); ?>">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/manageadmin-responsive.css?v=<?php echo time(); ?>">

</head>

<body data-spy="scroll" data-target=".navbar">

    <!-- Navigation -->
    <?php include "navigation.php"; ?>
    
    <!-- Manage -->
    <section id="m-admin">
        <div class="container-fluid">
            <div class="row">
                <div class="tab-heading col-md-12 col-sm-12">
                    <h5>Manage Administrator</h5>
                </div>
                <div class="col-md-4">
                    <a href="addadmin.php" role="button" id="btn-add" class="btn" title="add">Add Administrator</a>
                </div>
                <div class="col-md-8 col-sm-12">
                    <form class="form-inline" action="manageadmin.php" method="post">
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
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone No.</th>
                        <th scope="col">Date Added</th>
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
                            $member_count = "SELECT * FROM users WHERE RoleID = 2 AND CONCAT(FirstName,LastName,EmailID,CreatedDate) LIKE '%$search%' ";
                            $member_query = "SELECT * FROM users WHERE RoleID = 2 AND CONCAT(FirstName,LastName,EmailID,CreatedDate) LIKE '%$search%' ORDER BY CreatedDate DESC LIMIT $page1,5 ";
                        } elseif(isset($_GET['source'])) {
                            $search = $_GET['source'];
                            $member_count = "SELECT * FROM users WHERE RoleID = 2 AND CONCAT(FirstName,LastName,EmailID,CreatedDate) LIKE '%$search%' ";
                            $member_query = "SELECT * FROM users WHERE RoleID = 2 AND CONCAT(FirstName,LastName,EmailID,CreatedDate) LIKE '%$search%' ORDER BY CreatedDate DESC LIMIT $page1,5 ";
                        }
                        else {
                            $search = "";
                            $member_count = "SELECT * FROM users WHERE RoleID = 2 ";
                            $member_query = "SELECT * FROM users WHERE RoleID = 2 ORDER BY CreatedDate DESC LIMIT $page1,5 ";
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
                            $user_id = $row['ID'];
                            $user_fname = $row['FirstName'];
                            $user_lname = $row['LastName'];
                            $user_email = $row['EmailID'];
                            $user_date = $row['CreatedDate'];
                            $date=date_create($user_date);
                            $active = $row['IsActive'];
                            
                        $contact_r = mysqli_query($connection,"SELECT * FROM user_profile WHERE UserID = '{$user_id}' ");
                        if(!$contact_r) {
                            die("Query Failed".mysqli_error($connection));
                        }
                        if(mysqli_num_rows($contact_r)>0){
                        $contact_row = mysqli_fetch_assoc($contact_r);
                        $contact = $contact_row['Phonenumber_CountryCode'].$contact_row['Phonenumber'];
                        }
?>
                    <tr>
                        <td><?php echo $count=$count+1; ?></td>
                        <td><?php echo $user_fname; ?></td>
                        <td><?php echo $user_lname; ?></td>
                        <td><?php echo $user_email; ?></td>
                        <td><?php if(isset($contact)&&$contact != ""){echo "+".$contact;}else{echo"NA";}?></td>
                        <td><?php echo date_format($date,"d/m/Y"); ?></td>
                        <td><?php if($active == 1){echo "Yes";}else{echo"No";} ?></td>
                        <td class="act" style="padding:0;">
                            <a href="addadmin.php?user=<?php echo $user_id; ?>"><img src="images/edit.png" alt="edit"></a>
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
                                            “Are you sure you want to make this administrator inactive?”
                                        </div>
                                        <div class="modal-footer">
                                            <a type="button"  class="btn btn-secondary" data-dismiss="modal">No</a>
                                            <a role="button" href="action.php?user=<?php echo $user_id; ?>&action=inactive" class="btn btn-danger">Yes</a>
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
                   echo '<li id="prev" class="page-item"><a class="page-link" href="manageadmin.php?page='.($page - 1).'&source='.$search.'"><img src="images/left-arrow.png" alt="arrow"></a></li>';
            }
            
            for($i = 1; $i <= $page_count; $i++) {
                if($i == $page) {
                    echo '<li class="page-item number active"><a class="page-link" href="manageadmin.php?page='.$i.'&source='.$search.'">'.$i.'</a></li>';
                } else {
                    echo '<li class="page-item number"><a class="page-link" href="manageadmin.php?page='.$i.'&source='.$search.'">'.$i.'</a></li>';
                }
                
                
            }
            if($page<$page_count)
                   echo '<li id="next" class="page-item"><a class="page-link" href="manageadmin.php?page='.($page + 1).'&source='.$search.'"><img src="images/right-arrow.png" alt="arrow"></a></li>';
                      
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
    <script src="js/manageadmin.js?v=<?php echo time(); ?>"></script>

</body>

</html>
