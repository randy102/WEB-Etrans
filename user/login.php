<!DOCTYPE html>
<html>
	<head>
		<title>Đăng nhập</title>

		<meta http-equiv="Content-Type" content=text/html  charset="utf-8"/ >

		<link rel="stylesheet" type="text/css" href="/css/user.css">
		<link rel="stylesheet" type="text/css" href="/css/index.css">
		<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">

		<link rel="icon" type="image/x-icon" href="/img/face/favicon.ico">

		<script type="text/javascript" src="/js/jquery-2.0.0.min.js"></script>
		<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	</head>
	<?php
		session_start();
		if(empty($_SESSION['user'])){
	?>
	<body style="background-image: url(/img/face/login.jpg); background-size:cover; min-height:100%;">
		<!--header-->
		<?php require"../header.php"; ?>
		<!--/header-->

		<!--Main content-->
		<div class="wrapper-sign wrapper-log">
			<div class="container">
				<div class="col-md-6 col-md-offset-3">
					<div class="form-sign form-log">
						<h2 class="text-info">Đăng nhập</h2>
						<form method="post" action="do-login.php">

							<div class="form-group">
								<label><i class="fa fa-user fa-fw"></i> Tên đăng nhập</label>
								<input type="text" name="user" class="form-control">
							</div>

							

							<div class="form-group">
								<label><i class="fa fa-lock fa-fw"></i> Mật khẩu</label>
								<input type="password" name="pass" class="form-control">
							</div>

							

							<button type="submit" class="btn btn-info btn-lg">Đăng nhập</button>
							<button class="or btn btn-lg">hoặc</button>
							<a style="margin-top:15px; margin-left:0px;" class="btn btn-default btn-lg " href="/user/signup.php">Đăng ký</a>
							<div id="log-error"><?php if(!empty($_GET['log'])){ echo"Tài khoản hoặc mật khẩu không đúng!"; }?></div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!--Main content-->

		
	</body>
	<?php
	} else{
		header("Location: /home.php");
	}
	?>
</html>