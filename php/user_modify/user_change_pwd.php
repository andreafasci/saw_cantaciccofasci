<?php
	require_once("../database.php");
	session_start();
	if(isset($_POST['pwd_1']) && isset($_POST['pwd_2']) && isset($_SESSION['email'])){
		if($_POST['pwd_1'] !== $_POST['pwd_2']){
			header('Location: ../../my_area.php' );
			exit;
		}
		$con = db_connection();
		trim($_POST['pwd_1']);
		$pwd = $_POST['pwd_1'];
		$pwd = password_hash($pwd, PASSWORD_DEFAULT);
		$email = $_SESSION['email'];
		$query = "UPDATE users SET password = 'pwd' WHERE email = '$email'";
		$result = mysqli_query($con, $query);
		mysqli_close($con);
		header('Location: ../../my_area.php' );
	}
	else{
		header('Location: ../../my_area.php' );
	}
?>