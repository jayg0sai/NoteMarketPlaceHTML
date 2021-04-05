<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style type="text/css">
    a.nav-link:hover,
    a.nav-link:focus,
    .active-menu
    {
        text-decoration: none;
        color: #333333;
        border-bottom: 2px solid #6255a5;
    }
</style>
</head>
<body>
    
    
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="search.php"><img id="logo-nav" src="images/logo.png" alt="logo"></a>
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
                    <a class="nav-link" href="dashboard.php">Sell Your Notes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="buyerrequest.php">Buyer Request</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="faq.php">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactus.php">Contact Us</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="images/user-img.png" alt="user">
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item same" href="userprofile.php">My Profile</a>
                            <a class="dropdown-item same" href="mydownload.php">My downloads</a>
                            <a class="dropdown-item same" href="mysold.php">My Sold Notes</a>
                            <a class="dropdown-item same" href="myrejected.php">My Rejected Notes</a>
                            <a class="dropdown-item same" href="changepass.php">Change Password</a>
                            <a class="dropdown-item diff" href="logout.php">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
            <a class="btn" id="btn-nav" href="logout.php" title="Logout" role="button">Logout</a>
        </div>
    </div>
</nav>
<script type="text/javascript">
    const currentLocation = location.href;
    const menuItem = document.querySelectorAll('a.nav-link');
    const menuLength = menuItem.length;
    for( let i = 0;i < menuLength; i++) {
        if(menuItem[i].href === currentLocation) {
            menuItem[i].className = "nav-link active-menu";
        }
    }
</script>
</body>
</html>

