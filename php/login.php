<?php
	if (isset($_POST['email'])) {
	    trim($_POST['email']);
	    $email = $_POST['email'];
	}
	if ($_POST['email'] == "") {
		$GLOBALS['log_reg_errors'] = 'emptyfields';
		header('Location: ../login_page.php');
		exit;
	}

	if (isset($_POST['password'])){
	trim($_POST['password']);
	$pwd = $_POST['password'];
	}
	/*CONNESSIONE A DATABASE*/
	$con = mysqli_connect("localhost","root","andrea","hyt");

	if (mysqli_connect_errno($con)) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error($conn);
	}
	/*******************************/

	/*Cotrollo se utente esiste già*/
	$query = "SELECT * FROM Users WHERE email = '$email' ";
	$res = mysqli_query($con,$query);
	if(mysqli_num_rows($res) == 0){
		echo "Utente Inesistente";
		mysqli_close($con);
		exit;
	}
	/******************************/

	else{
		$row = mysqli_fetch_array($res);
		if (!password_verify($pwd,$row['Password'])) {
    		echo "Password Errata";
			mysqli_close($con);
			exit;
			}
		else{
			session_start();
			$_SESSION['myarea'] = $email;
    		//Se è attivo il checkbox..
    		if(isset($_POST['checkbox'])){
    			$_SESSION['remember_me'] = true;
    		}
    		header('Location: ../redirect.php');
    		exit;
		}
	}
?>