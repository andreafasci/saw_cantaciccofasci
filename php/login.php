<?php

require_once ("check_sessions.php");
require_once ("database.php");

$errormessage = "";

if (session_opened()) {
    header('Location: redirect.php');
    exit;
}

//Se esiste un cookie controllo hash -> redirect
if (isset($_COOKIE['login'])) {
    $connection = db_connection();
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($result)) {
        if (password_verify($row['email'], $_COOKIE['login'])) {
            mysqli_close($connection);
            $_SESSION['myarea'] = $row['email'];
            header('Location: redirect.php');
            exit;
        }
    }
    mysqli_close($connection);
}



if (isset($_POST['login_button'])) {

    if (isset($_POST['email']) && isset($_POST['password'])
        && !empty($_POST['email']) && !empty($_POST['password'])
    ) {

        /*CONNESSIONE A DATABASE
        $connection = mysqli_connect("localhost", "root", "andrea", "hyt");*/
        $connection = db_connection();

        if (mysqli_connect_errno($connection)) {
            $errormessage = "Failed to connect to MySQL: " . mysqli_connect_error($connection);
            mysqli_close($connection);
            exit;
        }


        $email = trim($_POST['email']);
        $pwd = trim($_POST['password']);

        // Controllo se utente esiste
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) == 0){
            $errormessage .= "Utente Inesistente";
            mysqli_close($connection);
        }
        else {
            $row = mysqli_fetch_array($result);
            if (password_verify($pwd, $row['password'])) {
                $_SESSION['myarea'] = $email;
                //Se è stato selezionato il checkbox..
                if (isset($_POST['checkbox'])) {
                    $_SESSION['remember_me'] = true;
                }
                header('Location: redirect.php');
                mysqli_close($connection);
            }
            else {
                $errormessage .= "Password errata";
                mysqli_close($connection);
            }
        }
    }
    else
        $errormessage .= "Si devono compilare tutti i campi! ";
}