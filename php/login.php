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

        // Prepared statement technique
        if ($statement = mysqli_prepare($connection, "SELECT * FROM users WHERE email=?")) {
            // bind parameters
            mysqli_stmt_bind_param($statement, "s", $email);
            // execute query
            mysqli_stmt_execute($statement);
            // bind result vars
            mysqli_stmt_bind_result($statement, $res_name, $res_email, $res_password);
            // fetch result
            mysqli_stmt_fetch($statement);

            // DO THINGS WITH RESULT
            if (password_verify($pwd, $res_password)) {
                $_SESSION['myarea'] = $email;
                $_SESSION['logged'] = true;
                //Se è stato selezionato il checkbox..
                if (isset($_POST['checkbox'])) {
                    $_SESSION['remember_me'] = true;
                }
                header('Location: redirect.php');

            }
            else {
                $errormessage .= "Credenziali errate!";
            }
            mysqli_stmt_close($statement);
        }
        mysqli_close($connection);

    }
    else
        $errormessage .= "Si devono compilare tutti i campi! ";
}