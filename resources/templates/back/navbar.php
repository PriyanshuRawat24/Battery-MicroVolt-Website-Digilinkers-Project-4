<nav class="navbar admin-navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?php echo $path; ?>admin-panel/index.php">
            <?php echo $company; ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="main-nav-link nav-link" href="<?php echo $path; ?>admin-panel/index.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="main-nav-link nav-link" href="<?php echo $path; ?>">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?>
                    </a>
                    <div class="dropdown-menu admin-dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item nav-link" href="login-system/profile.php">Profile</a>
                        <a class="dropdown-item nav-link" onclick="log_con()" href="#">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div> 
</nav>

<script type="text/Javascript" language="Javascript">

    function log_con()
    {
        var a=confirm("Are you sure you want to logout?");

        if(a==true)
        {
            window.location.href="login-system/logout.php";
        }

    }

</script>
