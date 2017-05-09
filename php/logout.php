<?php
	session_start();
	setcookie('login', null, mktime(0,0,0,01,01,1900), "/");
	session_destroy();
	header('Location: ../index.php');
?>