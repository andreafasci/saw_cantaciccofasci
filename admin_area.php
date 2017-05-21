<?php session_start() ?>
<!DOCTYPE html>
<head>
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/scrolling-nav.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="css/home_custom.css" rel="stylesheet">
    <link href="css/admin_forms.css" rel="stylesheet">
</head>

<body>
  <?php include_once("navbar.php") ?>
  <br><br><br><br><br><br>
  <!--DELETE USER FORM-->
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <form  action="php/admin_area/remove_user.php" method="post">
            <div class="form">
                <h4>Delete User</h4>
                <h6 style="font-size: 1vw; text-align: center;">Type User Email</h6>

                <input type="email" class="form-control" name="email" id="email">
                <br>
                <div class="wrapper">
            <span class="group-btn">
                <button type="submit" class="btn btn-primary btn-md">Confirm<i class="fa fa-sign-in"></i></button>
            </span>
                </div>
            </div>
            </form>
        </div>
        <!--------------------------------------------------->
        <div class="col-sm-4">
            <form  action="php/admin_area/remove_user.php" method="post">
                <div class="form">
                    <h4>Set User Admin</h4>
                    <h6 style="font-size: 1vw; text-align: center;">Type User Email</h6>

                    <input type="email" class="form-control" name="email" id="email">
                    <br>
                    <div class="wrapper">
            <span class="group-btn">
                <button type="submit" class="btn btn-primary btn-md">Confirm<i class="fa fa-sign-in"></i></button>
            </span>
                    </div>
                </div>
            </form>
        </div>
        <!---------------------------------------------------->
        <div class="col-sm-4">
            <form  action="php/admin_area/remove_user.php" method="post">
                <div class="form">
                    <h4>Delete Report</h4>
                    <h6 style="font-size: 1vw; text-align: center;">Report ID</h6>
                    <?php
                    if(isset($_SESSION['rm_report']))
                        echo '<p class="form-control-static" style="text-align: center">'.$_SESSION['rm_report'].'</p>';
                    else
                        echo '<p class="form-control-static" style="text-align: center">Click on a report to get the ID</p>';
                    ?>
                    <br>
                    <div class="wrapper">
            <span class="group-btn">
                <button type="submit" class="btn btn-primary btn-md">Confirm<i class="fa fa-sign-in"></i></button>
            </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>