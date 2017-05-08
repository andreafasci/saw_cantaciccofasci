<?php

session_start();

function session_opened() {

    if (isset($_SESSION['myarea']))
        return true;

    return false;
}

?>