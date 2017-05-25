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
<!--CHANGE EMAIL FORM-->
<form action="php/user_modify/user_change_email.php" method="post">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Your Email</label>
        <div class="col-sm-10">
            <p class="form-control-static">email@example.com</p>
        </div>
    </div>
    <div class="form-group row">
        <label for="new_mail" class="col-sm-2 col-form-label">Type New Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="new_mail" id="new_mail">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Confirm</button>
</form>
<!--//////////////////////////////////////////////////////////////-->

<!--CHANGE NAME FORM-->
<form action="php/user_modify/user_rename.php" method="post">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Your Name</label>
        <div class="col-sm-10">
            <p class="form-control-static">email@example.com</p>
        </div>
    </div>
    <div class="form-group row">
        <label for="new_name" class="col-sm-2 col-form-label">Type New Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="new_name" id="new_name">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Confirm</button>
</form>
<!--//////////////////////////////////////////////////////////////-->

<!--CHANGE EMAIL FORM-->
<form action="php/user_modify/user_change_pwd.php" method="post">
    <div class="form-group row">
        <label for="pwd_1" class="col-sm-2 col-form-label">Type New Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="pwd_1" id="pwd_1">
        </div>
    </div>
    <div class="form-group row">
        <label for="pwd_2" class="col-sm-2 col-form-label">Retype Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="pwd_2" id="pwd_2">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Confirm</button>
</form>
<!--//////////////////////////////////////////////////////////////-->
</body>