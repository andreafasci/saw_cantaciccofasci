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
    <link href="css/my_area_custom.css" rel="stylesheet">





    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" onLoad="javascript:init();">


     <?php
        session_start();
        if (!isset($_SESSION['myarea'])) {
            echo "MALE";
        exit;
    }
    ?>
  

    <!-- Navigation bar -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                
                <a class="navbar-brand page-scroll" href="#page-top"><img src="cone.svg" height="28" width="37"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <!--<li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>-->
                    <li>
                        <a>Restricted Area</a>
                    </li>
                    
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a>Logged as</a>
                    </li>
                    <li>
                        <a href="php/logout.php">Logout</a>
                    </li>
                    
                </ul>

            </div>


            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <BR><BR><BR>
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h6>Benvenuto nella tua area personale</h6>
                <p6> Qui potrai segnalare problemi sulle strade direttamente sulla mappa<BR>
                    Utilizza il bottone locate me per localizzarti sulla mappa
                </p6>
            </div>
        </div>
    </section>

    <!--Map Section-->
    <input class = "locate"  type="button" value="Locate me!" onClick="javascript:getLocationLeaflet();">
    <input class = "segnala"  type="button" value="Segnala!" onClick="javascript:addMark();">
    <div id="map" style="width: 100%x; height: 400px;"></div>
    <BR>
    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p5>Copyright &copy; Help your town 2017</p5>
        </div>
    </footer>


    <!-- jQuery -->
    <script src="vendor/jquery/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ 
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>-->

    <!-- Theme JavaScript -->
    <script src="js/grayscale.min.js"></script>

    <!-- leaflet js -->
    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>

   <script>
        var map;
        var popup ;
        
        // initialize the map
        function init(){


            map = L.map('map').setView([44.457159, 8.993361], 7);
            popup = new L.Popup();
            var Esri_WorldImagery = L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
            }).addTo(map);
           
        }
        
        function onLocationFound(e) {
            var radius = e.accuracy / 2;
            var location = e.latlng
            L.marker(location).addTo(map)
            L.circle(location, radius).addTo(map);
        }

        function onLocationError(e) {
            alert(e.message);
        }

        function getLocationLeaflet() {
            map.on('locationfound', onLocationFound);
            map.on('locationerror', onLocationError);
            map.locate({setView: true, maxZoom: 16});
        }
        
        function addMark() {
            map.on('click', onMapClick);
        }

        function onMapClick(e) {
         //map click event object (e) has latlng property which is a location at which the click occured.

         popup
           .setLatLng(e.latlng)
           .setContent("You clicked the map at " + e.latlng.toString())
           .openOn(map);
      }

  </script>




</body>

</html>