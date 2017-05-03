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
            $con = db_connection();

            // Controllo se utente esiste già
            trim($_POST['email']);
            $email = $_POST['email'];
            $query = "SELECT * FROM Users WHERE email = '$email' ";
            $res = mysqli_query($con, $query);
            if (mysqli_num_rows($res) === 1) {
                mysqli_close($con);
                $errormessage .= 'Utente gi&agrave; registrato!';
            } else {
                trim($_POST['name']);
                trim($_POST['password']);
                $name = $_POST['name'];
                $pwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $query = "INSERT INTO users VALUES ('$name','$email','$pwd')";
                $res = mysqli_query($con, $query);
                if ($res == false) //echo mysqli_error($con) . "<br>";
                    $errormessage .= mysqli_error($con);
                mysqli_close($con);
            }
        }
    }

    else
        $errormessage .= "Si devono compilare tutti i campi! ";
}
