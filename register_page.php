<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My area</title>

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

<body>

<?php include 'php/register.php'; ?>

    <!-- Navigation bar -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                
                <a class="navbar-brand page-scroll" href="#page-top"><img src="cone.svg" height="28" width="37"></a>
            </div>

            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    

    <section id="reg" class="intro-section">
    <form action="" method="post">

        <h6>Registration</h6>

         <p> <?php echo $errormessage . "<br>" ?> </p>
            <fieldset>
                <legend style="color:white;"><span class="number">1</span>Information</legend>
                <div>
                <label for="name" style="color:white">Your full name:</label>
                <input type="text" id="name" name="name">
                </div>
                 <BR>
                <div>
                <label for="mail"style="color:white">Email address:</label>
                <input type="email" id="mail" name="email">
                </div>

            </fieldset>
             <BR><BR>

            <fieldset>
                <legend style="color:white;"><span class="number">2</span>Passwords</legend>
                <div>
                <label for="password" style="color:white">Password:</label>
                <input type="password" id="password" name="password">
                </div>
                <BR>
                <div>
                <label for="password" style="color:white">Confirm Password:</label>
                <input type="password" id="2nd_password" name="2nd_password" title="2nd_password">
                </div>
            </fieldset>
        <BR><BR>
        <div>
            <button type="submit" name="register_button">Register</button>
        </div>


    </form>
    </section>

</body>

</html>
