<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php#page-top"><img id="navbar-logo" src="cone.svg"></a>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="index.php#page-top"></a></li>
                <li><a href="index.php#about">About Us</a></li>
                <li><a href="index.php#contact">Contact Us</a></li>

                <?php
                if (isset($_SESSION['logged'])) {
                    if ($_SESSION['logged']) {
                        echo '
                        <li> <a href="my_area.php">My Area</a> </li>
                        <li> <a href="my_profile.php">My Profile</a> </li>';

                        if (isset($_SESSION['admin'])) {
                            if ($_SESSION['admin']) {
                                echo
                                '<li> <a class="page-scroll" href="#">Admin Area</a> </li>';
                            }
                        }
                    }
                }
                ?>
            </ul>

            <ul class="nav navbar-nav navbar-right">

                <?php
                if (isset($_SESSION['logged'])) {//Print username
                    if ($_SESSION['logged']) {
                        echo
                        '<ul class="nav navbar-nav navbar-right">
                         <li> <a>Logged as '.$_SESSION['name'].'</a> </li>
                         <li> <a href="php/logout.php">Logout</a> </li> 
                         </ul>';
                    }
                } else {
                    echo
                    '<li id="loginButton" > <a> Login </a> </li>
                     <li id="registerButton" > <a> Register </a> </li> ';
                }
                ?>
            </ul>

        </div>
    </div>
</nav>


<?php
include ("modal.login.php");
include ("modal.register.php");
?>


<script>
    var loginButton = document.getElementById("loginButton");
    var registerButton = document.getElementById("registerButton");

    loginButton.onclick = function(event){
        $("#loginModal").modal();
    };

    registerButton.onclick = function(event) {
        $("#registerModal").modal();
    }

    // Get the modals
    var loginModal = document.getElementById('loginModal');
    var registerModal = document.getElementById('registerModal');

    // When the user clicks anywhere outside of the modals, close them
    window.onclick = function(event) {
        if (event.target == loginModal) {
            loginModal.style.display = "none";
        }
        if (event.target == registerModal) {
            registerModal.style.display = "none";
        }
    }

    var registerLink = document.getElementById("registerLink");
    registerLink.onclick = function(event) {
        $("#registerModal").modal();
    };

    var loginLink = document.getElementById("loginLink");
    loginLink.onclick = function (event) {
        $("#loginModal").modal();
    };
</script>