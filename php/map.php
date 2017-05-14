<?php

$errormessage = "";

    require("database.php");

    // Accedo al DB
    $connection = db_connection();

    $query = "SELECT lat,lng FROM reports";
    $result = mysqli_query($connection, $query);


    $rows = array();
    while ($row = mysqli_fetch_array($result)) {
        
        $rows[] = $row;
        //$_SESSION["planes"] = $row;
        //$rows[] = $row;
        
    }
    $_SESSION["planes"] = $rows;

?>
