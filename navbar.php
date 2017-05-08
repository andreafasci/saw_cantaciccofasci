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
                <a class="navbar-brand page-scroll" href="#page-top"><img src="cone.svg" height="28" width="37"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Restricted Area</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                   <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <?php
                    if(isset($_SESSION['logged'])){
                        if($_SESSION['logged']){
                            echo '
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a>Logged as</a>
                                </li>
                                <li>
                                    <a href="php/logout.php">Logout</a>
                                </li>
                    
                            </ul>';
                        }}
                        else{
                            echo '
                            <li>
                                <a class="page-scroll" id = "ul1">Login</a>

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
