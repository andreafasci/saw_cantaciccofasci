<!DOCTYPE html>
<html>

<head>
    <title>My Area</title>
</head>

<body>
<?php
session_start();
if (!isset($_SESSION['myarea'])) {
    echo "MALE";
    exit;
}

/*
Codice per controllare il login
*/

?>

<h1>Clicca su logout per chiudere la sessione</h1>

<a href="php/logout.php"> LOGOUT</a>
</body>

</html>