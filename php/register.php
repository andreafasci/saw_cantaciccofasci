<?php

$errormessage = "";

if (isset($_POST['register_button'])) {

    require_once("database.php");

    if (isset($_POST['email']) && isset($_POST['password'])
        && isset($_POST['2nd_password']) && isset($_POST['name'])
        && !empty($_POST['email']) && !empty($_POST['password'])
        && !empty($_POST['2nd_password']) && !empty($_POST['name'])
    ) {

        if ($_POST['password'] != $_POST['2nd_password'])
            $errormessage = "Le due password non corrispondono! ";

        else {

            // Accedo al DB
            $connection = db_connection();

            // Controllo se utente esiste già
            $email = $_POST['email'];
            $name = $_POST['name'];
            $pwd = $_POST['password'];

            // Prepared statement technique

            if ($statement1 = mysqli_prepare($connection, "SELECT * FROM users WHERE email=?")) {
                // bind parameters
                mysqli_stmt_bind_param($statement1, "s", $email);
                // execute query
                mysqli_stmt_execute($statement1);
                // bind result vars
                mysqli_stmt_bind_result($statement1, $res_name, $res_email, $res_password, $res_admin);
                // fetch result
                mysqli_stmt_fetch($statement1);
                // close statement
                mysqli_stmt_close($statement1);
                // DO THINGS WITH RESULT
                if ( !empty($res_email) )
                    $errormessage .= 'Utente gi&agrave; registrato!';
                else {
                    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
                    if ($statement2 = mysqli_prepare ($connection, "INSERT INTO users VALUES (?, ?, ?, FALSE)" )){
                        mysqli_stmt_bind_param($statement2, "sss", $name, $email, $pwd);
                        mysqli_stmt_execute($statement2);
                        if (mysqli_stmt_affected_rows($statement2) === 1) {
                            $errormessage .= mysqli_error($connection);
                            mysqli_stmt_close($statement2);
                        }
                        else {
                            $errormessage .= "Registrazione effettuata correttamente!";
                            mysqli_stmt_close($statement2);
                        }
                    }
                }

                mysqli_close($connection);
            }
        }
    }

    else
        $errormessage .= "Si devono compilare tutti i campi! ";
}
