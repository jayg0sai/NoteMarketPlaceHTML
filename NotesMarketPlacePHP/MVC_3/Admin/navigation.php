<?php 
if(isset($_SESSION['userid'])) {
    $r_query = "SELECT * FROM users WHERE ID = '{$_SESSION['userid']}' ";
    $r_result = mysqli_query($connection,$r_query);
    if(!$r_result) {
        die("Query Failed".mysqli_error($connection));
    }
    $r_row = mysqli_fetch_assoc($r_result);
    $r_role = $r_row['RoleID'];
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style type="text/css">
    a.nav-link:hover,
    a.nav-link:focus,
    .active-menu {
    text-decoration: none;
    color: #333333;
    border-bottom: 2px solid #6255a5;
    }
    a.diff {
    cursor: pointer;
    }
    .active-drop {
    background-color: #6255a5;
    color: #fff;
    }
    #btn-yes {
    text-transform: uppercase;
    width: 69px;
    height: 35px;
    border-radius: 4px;
    color: #fff;
    background-color: #6255a5;
    font-size: 16px;
    line-height: 24px;
    font-weight: 600;
    margin-left: 5px;
    }
    li.nav-item img {
        border-radius: 50%;
    }      
</style>
</head>
<body>
    
    
<!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php"><img id="logo-nav" src="images/logo.png" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span id="mobile-nav-open-btn">&#9776;</span>
                <span id="mobile-nav-close-btn">&times;</span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="dashboard.php" class="nav-link">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                       <div class="dropdown">
                            <a class="nav-link" role="button" id="1dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notes</a>

                            <div class="dropdown-menu" aria-labelledby="1dropdownMenuLink">
                                <a class="dropdown-item same" href="notesunderreview.php">Notes Under Review</a>
                                <a class="dropdown-item same" href="published.php">Published Notes</a>
                                <a class="dropdown-item same" href="download.php">Downloaded Notes</a>
                                <a class="dropdown-item same" href="rejected.php">Rejected Notes</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="member.php">Members</a>
                    </li>
                    <li class="nav-item">
                        
                        <div class="dropdown">
                            <a href="#" class="nav-link" role="button" id="2dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Reports
                            </a>

                            <div class="dropdown-menu" aria-labelledby="2dropdownMenuLink">
                                <a class="dropdown-item same" href="spamreport.php">Spam Reports</a>
                            </div>
                        </div>
                        
                    </li>
                    <li class="nav-item">
                        
                        <div class="dropdown">
                            <a class="nav-link" role="button" id="3dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Settings
                            </a>

                            <div class="dropdown-menu" aria-labelledby="3dropdownMenuLink">
                                <?php if($r_role == 1) { ?>
                                <a class="dropdown-item same" href="managesystemconfig.php">Manage System Configuration</a>
                                <a class="dropdown-item same" href="manageadmin.php">Manage Administrator</a> <?php } ?>
                                <a class="dropdown-item same" href="managecategory.php">Manage Category</a>
                                <a class="dropdown-item same" href="managetype.php">Manage Type</a>
                                <a class="dropdown-item same" href="managecountry.php">Manage Countries</a>
                            </div>
                        </div>
                    </li>
                    <?php if(isset($_SESSION['userid'])) { 
                    $profile_pic_query = "SELECT ProfilePicture FROM user_profile WHERE UserID = '{$_SESSION['userid']}' ";
                    $profile_pic = mysqli_query($connection, $profile_pic_query);
                    if(!$profile_pic) {
                        die('Query Failed'.mysqli_error($connection));
                    }
                    $profile_pic_row = mysqli_num_rows($profile_pic);
                    if($profile_pic_row>0) {
                    $pp_row = mysqli_fetch_assoc($profile_pic);
                    $dp = $pp_row['ProfilePicture'];
                    } else {
                        $dp = "../Members/Default/profile.png";
                    }
}
                ?>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="btn" role="button" id="3dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-responsive" src="<?php echo $dp; ?>" alt="user" onError="this.onerror=null;this.src='../Members/Default/profile.png';">
                            </a>

                            <div class="dropdown-menu" aria-labelledby="3dropdownMenuLink">
                                <a class="dropdown-item same" href="myprofile.php">Update Profile</a>
                                <a class="dropdown-item same" href="../Front/changepass.php">Change Password</a>
                                <a class="dropdown-item diff" data-toggle="modal" data-target="#exampleModal">Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
                <a class="btn" id="btn-nav"  title="Logout" data-toggle="modal" data-target="#exampleModal" role="button">Logout</a>
            </div>
        </div>
    </nav>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure, you want to logout?
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-secondary" data-dismiss="modal" style="height: 35px;">Cancel</a>
        <a type="button" id="btn-yes" class="btn" href="../Front/logout.php">Yes</a>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    const currentLocation = location.href;
    const menuItem = document.querySelectorAll('a.nav-link');
    const menuLength = menuItem.length;
    for( let i = 0;i < menuLength; i++) {
        if(menuItem[i].href === currentLocation) {
            menuItem[i].className = "nav-link active-menu";
        }
    }
    const pictureLocation = location.href;
    const dropmenuItem = document.querySelectorAll('a.same');
    const dropmenuLength = dropmenuItem.length;
    for( let j = 0;j < dropmenuLength; j++) {
        if(dropmenuItem[j].href === pictureLocation) {
            dropmenuItem[j].className = "dropdown-item same active-drop";
        }
    }
</script>
</body>
</html>