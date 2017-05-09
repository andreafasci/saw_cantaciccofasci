<?php
	session_start();
	setcookie('login', null, time()-100, "");
	session_destroy();
	header('Location: ../index.php');
?>