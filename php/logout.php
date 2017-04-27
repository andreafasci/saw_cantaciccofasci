<?php
	session_start();
	session_destroy();
	$_SESSION = array();
	setcookie('login', null);
	header('Location: ../index.html');
	?>