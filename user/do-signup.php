<?php

	require"../module/connectdb.php";

	$user = $_POST['user'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$repass = $_POST['repass'];

	$conn = mysqli_connect(HOST,USER,PASS,DB);
	$lang = mysqli_query($conn,"SET NAMES utf8");

	$sql_1 = "SELECT * FROM member WHERE user = '$user'";
	$query_1 = mysqli_query($conn,$sql_1);
	$result_1 = mysqli_num_rows($query_1);

	$sql_2 = "SELECT * FROM member WHERE email = '$email'";
	$query_2 = mysqli_query($conn,$sql_2);
	$result_2 = mysqli_num_rows($query_2);

	//vaildate
	if($pass != $repass) header("location: /user/signup.php?error=pass");
	
	else if($result_1 > 0) header("location: /user/signup.php?error=user");

	else if($result_2 > 0) header("location: /user/signup.php?error=email");

	else{
		$sql_3 = "INSERT INTO member (user, pass, email, level) VALUES ('$user','$pass','$email','3')";
		$query_3 = mysqli_query($conn,$sql_3);
		if($query_3){
			header("location: /user/signup.php?error=none");
		}
	}

?>