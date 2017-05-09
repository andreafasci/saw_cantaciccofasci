<?php
require_once ("php/login.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Help your town</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


    <link href="css/home_custom.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" onLoad="javascript:init();">




    <!--modal-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                    <h3>Login to HYT</h3>
                </div>
                <div class="modal-body">
                    <form method="post" action="" name="login_form">
                        <p> <?php echo $errormessage . "<br>" ?> </p>
                        <label for="mail">Email address:</label>
                        <input type="email" id="mail" name="email"><BR><BR>
                        <label for="password">Password:       </label>
                        <input type="password" id="password" name="password"><BR><BR><BR><BR>
                        <input type = "checkbox" id = "checkbox" name = "checkbox" value = "1">Auto Login
                        <p><button type="submit" class="btn btn-primary" name="login_button" id="signin">Sign in</button>
                            <a href="#">Forgot Password?</a>
                        </p>
                    </form>
                </div>
                <div class="modal-footer">
                    New To MyWebsite.com?
                    <a href="register_page.php" class="btn btn-primary">Register</a>
                </div>
            </div>
        </div>
    </div>


    <?php
        include_once('navbar.php');
    ?>

    <!-- Intro Section -->
    

    <section id="intro" class="intro-section">
        <div id="top-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" >
                    <h1>Welcome to Help your town</h1><BR>
                    <p1><strong>The site where you can report dangerous situations on the streets</strong></p1><BR><BR>
                    <a class="btn btn-default page-scroll" href="#about">Start navigate!</a>
                </div>
            </div>
        </div>
        </div>
    </section>

    

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2><strong>How does it work?</strong></h2>
                    <p2>The system for sending a new report is very simple:<BR>
                    <a href="register_page.php">Register </a>as a new user by providing your personal information <BR>
                    Then you login within the system <BR>
                    Add a new signal by marking the dangerous road on the map and optionally add some photos <BR>
                    Go back to <a href="index.php"> Home Page </a> to see other reports on the map <BR>
                    <p2>
                </div>
            </div>
        </div>
    </section>


    <!-- Services Section -->
    <section id="services" class="services-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3><strong>Log in to your personal area to report</strong></h3><BR>
                    <div id="map" style="width: 50vw; height: 40vh;left:20%"></div><BR>

                    <a href="redirect.php" class="btn btn-default btn-lg">Go to personal area</a>
                </div>
            </div>
        </div>
    </section>


    <!-- parallax image -->
    <section id="divider-section-background-2" class="parallax parallax-bg text-white skrollable skrollable-between" data-bottom-top="background-position: 50% 0%;" data-top-bottom="background-position: 50% 100%;" data-anchor-target="#divider-section-background-2" style="background-image: url(4.jpg); z-index: 0; background-position: 50% 40.7119%;">
        <div class="section-content" style="padding: 300px 0px 80px;  ">        
        </div>           
    </section>


    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <!--<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Contact Section</h1>
                </div>
            </div>
        </div>-->
        <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h4><strong>Contact us</strong></h4>
                <p4>Feel free to email us to provide some feedback on our services,<BR> give us suggestions to improve our site, or to just say hello!</p4>
                <p4><a href="mailto:feedback@startbootstrap.com">miamail@a.a</a></p4><BR>
                <ul class="list-inline banner-social-buttons">
                    <li>
                            <div class="icon-circle">
                                <a href="#" class="itwittter" title="Twitter"><i class="fa fa-twitter"></i></a>
                            </div>
                    </li>
                    <li>
                        <div class="icon-circle">
                            <a href="#" class="ifacebook" title="Facebook"><i class="fa fa-facebook"></i></a>
                        </div>

                    </li>
                    
                    <li>
                            <div class="icon-circle">
                                 <a href="#" class="igoogle" title="Google+"><i class="fa fa-google-plus"></i></a>
                            </div>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </section>




    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p5>Copyright &copy; Help your town 2017</p5>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>

    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>


    <!--modal script-->
    <script>

        $(document).ready(function(){
        var ul = document.getElementById('ul1');
        ul.onclick = function(event) {
            $("#myModal").modal();//modal login
            };
        });

        var map;
        
        // initialize the map
        function init(){
            map = L.map('map').setView([44.457159, 8.993361], 3);
            var Esri_WorldImagery = L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
            }).addTo(map);
           
        }

  </script>
 
    <!--script per far muovere immagine intro-->
    <script>
        $(document).ready(function() {
        var movementStrength = 25;
        var height = movementStrength / $(window).height();
        var width = movementStrength / $(window).width();
        $("#top-image").mousemove(function(e){
          var pageX = e.pageX - ($(window).width() / 2);
          var pageY = e.pageY - ($(window).height() / 2);
          var newvalueX = width * pageX * -1 - 25;
          var newvalueY = height * pageY * -1 - 50;
          $('#top-image').css("background-position", newvalueX+"px     "+newvalueY+"px");
        });
    });
    </script>

</body>

</html>
