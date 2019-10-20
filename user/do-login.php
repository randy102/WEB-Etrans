<?php
	require"../module/connectdb.php";
	session_start();

	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$conn = mysqli_connect(HOST,USER,PASS,DB);
	$lang = mysqli_query($conn,"SET NAMES 'utf8'");
	$sql = "SELECT * FROM member WHERE user = '$user' AND pass = '$pass'";
	$query = mysqli_query($conn,$sql);

	$result = mysqli_num_rows($query);

	if($result > 0){
		$get = mysqli_fetch_array($query);
		$_SESSION['user'] = $user;
		$_SESSION['level'] = $get['level'];
		header("Location: /home.php");

	}
	else{
		header("Location: /user/login.php?log=false");
	}
		

?>