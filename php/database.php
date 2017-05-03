<?php

function db_connection() {

    // EDIT DATA FOR YOUR DATABASE
    // mysqli_connect (host, user, password, database_name);

    $con = mysqli_connect("localhost", "", "", "");

    if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error($con);
    }

    return $con;
}

?>