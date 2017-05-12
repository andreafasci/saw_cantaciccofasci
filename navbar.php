<!DOCTYPE html>
<head>
</head>
<body>

<!-- Navigation bar -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="index.php#page-top"><img src="cone.svg" height="28" width="37"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-left">
                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                <li class="hidden">
                    <a class="page-scroll" href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="index.php#about">About</a>
                </li>
                <li>
                    <a class="page-scroll" href="index.php#services">Map</a>
                </li>
                <li>
                    <a class="page-scroll" href="index.php#contact">Contact</a>
                </li>
                <?php
                    if (isset($_SESSION['logged'])) {
                        if ($_SESSION['logged']) {
                            echo '
                                <li>
                                    <a class="page-scroll" href="my_area.php">My Area</a>
                                </li>
                                <li>
                                    <a class="page-scroll" href="my_profile.php">My Profile</a>
                                </li>';
                            if (isset($_SESSION['admin'])){
                                if($_SESSION['admin']){
                                    echo'
                                        <li>
                                            <a class="page-scroll" href="#">Admin Area</a>
                                        </li>';
                                }
                            }
                        }
                        
                    }
                ?>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>

                <?php
                if (isset($_SESSION['logged'])) {//Print username
                    if ($_SESSION['logged']) {
                        echo '
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a>Logged as '.$_SESSION['name'].'</a>
                                </li>
                                <li>
                                    <a href="php/logout.php">Logout</a>
                                </li>
                    
                            </ul>';
                    }
                } else {

                    echo '                        
                        <li>
                            <a class="page-scroll" id ="ul1" >Login</a>
                        </li>
                        
                        <li>
                            <a class="page-scroll" href="register_page.php">Register</a>
                        </li>
                        
                        ';

                }

                ?>

            </ul>

        </div>


        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
</body>
