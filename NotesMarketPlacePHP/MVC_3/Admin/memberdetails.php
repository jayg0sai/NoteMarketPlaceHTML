<?php include "../includes/db.php"; ?>
<?php session_start(); ?>
<?php include "../includes/session_destroy.php"; ?>
<?php if(isset($_GET['id'])){
    $user_id = $_GET['id'];
}
$display = "SELECT * FROM users WHERE ID = '{$user_id}' ";
$display_query = mysqli_query($connection, $display);
if(!$display_query) {
    die("Query Failed".mysqli_error($connection));
}
while($row = mysqli_fetch_assoc($display_query)) {
    $firstname = $row['FirstName'];
    $lastname = $row['LastName'];
    $email = $row['EmailID'];
}
$details_q = "SELECT * FROM user_profile WHERE UserID = '{$user_id}' ";
$details = mysqli_query($connection,$details_q);
if(!$details) {
    die("Query Failed".mysqli_error($connection));
}
$details_row = mysqli_fetch_assoc($details);
$num = mysqli_num_rows($details);
if(($num > 0)) {
    $pp = $details_row['ProfilePicture'];
    $dob = $details_row['DOB'];
    $ph = "+".$details_row['Phonenumber_CountryCode']." ".$details_row['Phonenumber'];
    $college = $details_row['College'];
    $address1 = $details_row['AddressLine1'];
    $address2 = $details_row['AddressLine2'];
    $city = $details_row['City'];
    $state = $details_row['State'];
    $country = $details_row['Country'];
    $zipcode = $details_row['ZipCode'];
    $date=date_create($dob);
    $date=date_format($date,"m/d/Y");
} else {
    $date=$ph=$college=$address1=$address2=$city=$state=$country=$zipcode = "";
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tag -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <!-- Title -->
    <title>Member Details</title>

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
    <link rel="stylesheet" href="css/memberdetails.css?v=<?php echo time(); ?>">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/memberdetails-responsive.css?v=<?php echo time(); ?>">

</head>

<body data-spy="scroll" data-target=".navbar">

    <!-- Navigation -->
    <?php include "navigation.php"; ?>

    <section id="about-note">
        <div class="container-fluid">
            <div id="details1">
                <div class="details-heading">
                    <h5>Member Details</h5>
                </div>
                <div class="row">
                    <div class="m-img col-lg-2 col-md-2 col-sm-2">
                        <img src="<?php if(!empty($pp)) { echo $pp;} else {echo "../Front/Members/profile.png";} ?>" alt="member">

                    </div>
                    <?php
                    function member_details($label,$value) {
                        if($value) {
                        echo '<div class="note-details">
                            <div class="label">
                                '.$label.':
                            </div>
                            <div class="value">
                                '.$value.'
                            </div>
                        </div>';
                        }
                    }
                    
                    
                    ?>
                    <div class="details1-1 col-lg-5 col-md-6 col-sm-10">
                        <?php member_details("First Name",$firstname); ?>
                        <?php member_details("Last Name",$lastname); ?>
                        <?php member_details("Email",$email); ?>
                        <?php member_details("DOB",$date); ?>
                        <?php member_details("Phone Number",$ph); ?>
                        <?php member_details("College/University",$college); ?>
                    </div>

                    <div class="offset-sm-2"></div>
                    <div class="details1-2 col-lg-4 col-md-4 col-sm-10 ">
                        <?php member_details("Address 1",$address1); ?>
                        <?php member_details("Address 2",$address2); ?>
                        <?php member_details("City",$city); ?>
                        <?php member_details("State",$state); ?>
                        <?php member_details("Country",$country); ?>
                        <?php member_details("Zip Code",$zipcode); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Published -->
    <section id="member">
        <div class="container-fluid">
            <div class="row">
                <div class="tab-heading col-md-4 col-sm-12">
                    <h5>Notes</h5>
                </div>
            </div>
            <div style="overflow-x:auto;">
                <table class="table table-hover" style="width:100%;">
                    <thead>
                        <tr>
                            <th scope="col">Sr No.</th>
                            <th scope="col">Note Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Status</th>
                            <th scope="col">Downloaded Notes</th>
                            <th scope="col">Total Earnings</th>
                            <th scope="col">Date Added</th>
                            <th scope="col">Published Date</th>
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
                        $download_count = "SELECT * FROM seller_notes WHERE Status IN (11,12,13) AND SellerID = '{$user_id}' ";
                        $find_count = mysqli_query($connection, $download_count);
                        if(!$find_count) {
                                die("Query Failed".mysqli_error($connection));
                            }
                        $down_count = mysqli_num_rows($find_count);

                        $page_count = ceil($down_count / 5);
                        $download_query = "SELECT * FROM seller_notes WHERE Status IN (11,12,13) AND SellerID = '{$user_id}' ORDER BY PublishedDate LIMIT $page1,5 ";
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
                            $date = $row['PublishedDate'];
                            $cdate = $row['CreatedDate'];
                            $status = $row['Status'];
                            $down_q = "SELECT count(ID) AS total_count,SUM(PurchasedPrice) AS total FROM downloads WHERE NoteID = '{$note_id}' AND IsAttachmentDownload = b'1' ";
                            $down = mysqli_query($connection, $down_q);
                            if(!$down) {
                                die("Query Failed".mysqli_error($connection));
                            }
                            
                            $total_row = mysqli_fetch_assoc($down);
                            $total = $total_row['total'];
                            $total_down = $total_row['total_count'];
?>
                        <tr>
                            <td><?php echo $count=$count+1; ?></td>
                            <td><a href="notedetails.php?n_id=<?php echo $note_id; ?>"><?php echo $title; ?></a></td>
                            <td><?php echo $category; ?></td>
                            <td><?php if($status==11){echo "Submitted For Review";}elseif($status==12){echo "InReview";}else{echo "Published";} ?></td>
                            <td><a href="download_history.php?n_id=<?php echo $note_id; ?>"><?php echo $total_down; ?></a></td>
                            <td><?php if($total == ""){echo "$0";} else{echo "$".$total;} ?></td>
                            <td><?php echo $cdate; ?></td>
                            <td><?php if($status==11 || $status==12){ echo "NA"; } else { echo $date;} ?></td>
                            <td class="act">
                                <div class="dropdown">
                                    <a class="btn" role="button" id="dropdownDotLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="images/dots.png" alt="dots"></a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownDotLink1">
                                        <a class="dropdown-item same" href="../Front/file_download.php?n_id=<?php echo $note_id; ?>">Download Note</a>
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
                   echo '<li id="prev" class="page-item"><a class="page-link" href="memberdetails.php?page='.($page - 1).'&id='.$user_id.'"><img src="images/left-arrow.png" alt="arrow"></a></li>';
            }
            
            for($i = 1; $i <= $page_count; $i++) {
                if($i == $page) {
                    echo '<li class="page-item number active"><a class="page-link" href="memberdetails.php?page='.$i.'&id='.$user_id.'">'.$i.'</a></li>';
                } else {
                    echo '<li class="page-item number"><a class="page-link" href="memberdetails.php?page='.$i.'&id='.$user_id.'">'.$i.'</a></li>';
                }
                
                
            }
            if($page<$page_count)
                   echo '<li id="next" class="page-item"><a class="page-link" href="memberdetails.php?page='.($page + 1).'&id='.$user_id.'"><img src="images/right-arrow.png" alt="arrow"></a></li>';
                      
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
    <script src="js/memberdetails.js?v=<?php echo time(); ?>"></script>

</body>

</html>
