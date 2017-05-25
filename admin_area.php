<?php session_start() ?>
<!DOCTYPE html>
<head>
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/scrolling-nav.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


    <link href="css/home_custom.css" rel="stylesheet">
</head>

<body>
  <?php include_once("navbar.php") ?>
  <br><br><br><br><br><br>
  <!--DELETE USER FORM-->
  <form action="php/admin_area/remove_user.php" method="post">
    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label">Type User Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="email" id="email">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Confirm</button>
  </form>
  <!--//////////////////////////////////////////////////////////////-->

  <!--SET ADMIN FORM-->
  <form action="php/admin_area/admin_user.php" method="post">
    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label">Type User Email</label>
      <div class="col-sm-10">
         <input type="email" class="form-control" name="email" id="email">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Confirm</button>
  </form>
  <!--//////////////////////////////////////////////////////////////-->

  <!--REPORT DELETE FORM-->
   <form action="php/admin_area/report_delete.php"" method="post">
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Report ID</label>
      <div class="col-sm-10">
        <?php 
          if(isset($_SESSION['rm_report']))
            echo '<p class="form-control-static">'.$_SESSION['rm_report'].'</p>';
          else
            echo '<p class="form-control-static">Click on a report to get the ID</p>';
        ?>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Confirm</button>
  </form> 
  <!--//////////////////////////////////////////////////////////////-->
</body>