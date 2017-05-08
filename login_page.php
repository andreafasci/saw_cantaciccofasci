<!DOCTYPE html>

<html>

<head>
    <link href="css/register_style.css" rel="stylesheet" type="text/css">
</head>

<body>

<?php

require_once("php/login.php");

?>

<form action="" method="post">

    <h1>Login</h1>
    <p> <?php echo $errormessage . "<br>" ?> </p>
    <fieldset>
        <legend><span class="number">1</span>Information</legend>

        <label for="mail">Email address:</label>
        <input type="email" id="mail" name="email">

    </fieldset>

    <fieldset>
        <legend><span class="number">2</span>Passwords</legend>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <input type="checkbox" id="checkbox" name="checkbox" title="AutoLogin" value="1">Auto Login
    </fieldset>

    <div>
        <button type="submit" name="login_button" >Login</button>
    </div>
</form>


</body>

</html>
