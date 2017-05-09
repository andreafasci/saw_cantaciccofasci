<?php

session_start();

function session_opened() {

    if (isset($_SESSION['logged']))
        return true;

    return false;
}

?>
