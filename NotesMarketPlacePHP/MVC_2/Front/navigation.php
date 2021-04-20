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
    
    
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php if(isset($_SESSION['userid'])) { echo 'search.php'; } else { echo 'home.php';} ?>"><img id="logo-nav" src="images/logo.png" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span id="mobile-nav-open-btn">&#9776;</span>
            <span id="mobile-nav-close-btn">&times;</span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="search.php">Search Notes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php if(isset($_SESSION['userid'])) { echo 'dashboard.php'; } else { echo 'login.php';} ?>">Sell Your Notes</a>
                </li>
                <?php if(isset($_SESSION['userid'])) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="buyerrequest.php">Buyer Request</a>
                </li><?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="faq.php">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactus.php">Contact Us</a>
                </li>
                
                <?php if(isset($_SESSION['userid'])) { 
                    $profile_pic_query = "SELECT ProfilePicture FROM user_profile WHERE UserID = '{$_SESSION['userid']}' ";
                    $profile_pic = mysqli_query($connection, $profile_pic_query);
                    if(!$profile_pic) {
                        die('Query Failed'.mysqli_error($connection));
                    }
                    $profile_pic_row = mysqli_fetch_assoc($profile_pic);
                    if($profile_pic_row>0) {
                    $dp = $profile_pic_row['ProfilePicture'];
                    } else {
                        $dp = "Members/profile.png";
                    }
                ?>
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="<?php echo $dp; ?>" class="img-responsive" alt="user">
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item same" href="myprofile.php">My Profile</a>
                            <a class="dropdown-item same" href="mydownload.php">My downloads</a>
                            <a class="dropdown-item same" href="mysold.php">My Sold Notes</a>
                            <a class="dropdown-item same" href="myrejected.php">My Rejected Notes</a>
                            <a class="dropdown-item same" href="changepass.php">Change Password</a>
                            <a class="dropdown-item diff" data-toggle="modal" data-target="#exampleModal">Logout</a>
                        </div>
                    </div>
                </li><?php } ?>
            </ul>
            <?php if(isset($_SESSION['userid'])) { ?>
            <a class="btn" id="btn-nav" title="Logout" role="button" data-toggle="modal" data-target="#exampleModal">Logout</a>
            <?php } else { ?>
            <a class="btn" href="login.php" id="btn-nav" title="Login" role="button">Login</a>
            <?php } ?>
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
        <a type="button" id="btn-yes" class="btn" href="logout.php">Yes</a>
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