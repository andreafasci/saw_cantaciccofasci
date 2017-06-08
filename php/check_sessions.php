<?php

require_once("database.php");

function session_opened()
{

    if (isset($_SESSION['logged']))
        return true;
    return false;

}

// I have to check if user has set the remember me option,
// in this case server retrieves and saves data (email, name)
// of user in $_SESSION['name'] and $_SESSION[`email'] respectively

//Se esiste un cookie controllo hash -> redirect
if (isset($_COOKIE['login'])) {
    $connection = db_connection();
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($result)) {
        if (password_verify($row['email'], $_COOKIE['login'])) {
            $_SESSION["logged"] = TRUE;
            $_SESSION["email"] = $row[" email"];
            $_SESSION["name"] = $row["name"];
            break;
        }
    }
    mysqli_close($connection);
}


?>
