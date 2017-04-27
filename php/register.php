<?php	
	/*Accedo al DB*/
	$con = mysqli_connect("localhost","root","andrea","hyt");

	if (mysqli_connect_errno($con)) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error($conn);
	}
	//CONTROLLO SE UTENTE ESISTE GIA'
	trim($_POST['email']);
	$email = $_POST['email'];
	$query = "SELECT * FROM users WHERE email = '$email' ";
	$res = mysqli_query($con,$query);
	if(mysqli_num_rows($res) == 1){
		mysqli_close($con);
		echo "Già Registrato";
		//header('Location: ../login_page.php');
		exit;
	}
	else{
		trim($_POST['name']);
		trim($_POST['password']);
		$name = $_POST['name'];
		$pwd = password_hash($_POST['password'],PASSWORD_DEFAULT);
		$query = "INSERT INTO Users VALUES ('$name','$email','$pwd')";
		$res = mysqli_query($con,$query);
		if($res == false) echo "failed";
		mysqli_close($con);
		echo "Register Riuscita";
		//header('Location: ../index.html');
		exit;
	}
?>