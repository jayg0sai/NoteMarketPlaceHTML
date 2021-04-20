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
    <!-- Navigation -->
    <nav id="nav" class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php"><img id="logo-nav" src="images/logo.png" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span id="mobile-nav-open-btn">&#9776;</span>
                <span id="mobile-nav-close-btn">&times;</span>
            </button>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="a_search.php">Search Notes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Sell Your Notes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="a_faq.php">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="a_contactus.php">Contact Us</a>
                    </li>
                </ul>
                <a class="btn" href="login.php" id="btn-nav" title="Login" role="button">Login</a>
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


