<!DOCTYPE html>
<html>
	<head>
		<title>Đăng ký</title>

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
	<body style="background-image: url(/img/face/signup.jpg); background-size:cover; min-height:100%;">
		<!--header-->
		<?php require"../header.php"; ?>
		<!--/header-->

		<!--Main content-->
		<div class="wrapper-sign">
			<div class="container">
				<div class="col-md-6 col-md-offset-3">
					<div class="form-sign">
						<h2>Đăng ký</h2>
						<form method="post" action="/user/do-signup.php">

							<div class="form-group">
								<label><i class="fa fa-user fa-fw"></i> Tên đăng nhập</label>
								<input type="text" name="user" class="form-control">
							</div>

							<div class="form-group">
								<label><i class="fa fa-envelope fa-fw"></i> E-mail</label>
								<input type="text" name="email" class="form-control">
							</div>

							<div class="form-group">
								<label><i class="fa fa-lock fa-fw"></i> Mật khẩu</label>
								<input type="password" name="pass" class="form-control">
							</div>

							<div class="form-group">
								<label><i class="fa fa-repeat fa-fw"></i> Nhập lại mật khẩu</label>
								<input type="password" name="repass" class="form-control">
							</div>

							<button id="submit" type="submit" class="btn btn-warning btn-lg text-right">Đăng ký</button>

							<div id="log-error">
								<?php
									if($_GET['error']=='pass') echo"Mật khẩu lập lại không đúng!";
									else if($_GET['error']=='user') echo"Tên đăng nhập đã tồn tại!";
									else if($_GET['error']=='email') echo"E-mail đã tồn tại!";
									else if($_GET['error']=='none') echo"Đăng ký thành công! Xin hãy đăng nhập lại.";
								?>
							</div>
						</form>

						<script type="text/javascript">
							//Email function
							function isEmail(emailStr)
							{
							        var emailPat=/^(.+)@(.+)$/
							        var specialChars="\\(\\)<>@,;:\\\\\\\"\\.\\[\\]"
							        var validChars="\[^\\s" + specialChars + "\]"
							        var quotedUser="(\"[^\"]*\")"
							        var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/
							        var atom=validChars + '+'
							        var word="(" + atom + "|" + quotedUser + ")"
							        var userPat=new RegExp("^" + word + "(\\." + word + ")*$")
							        var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$")
							        var matchArray=emailStr.match(emailPat)
							        if (matchArray==null) {
							                return false
							        }
							        var user=matchArray[1]
							        var domain=matchArray[2]
							 
							        // See if "user" is valid
							        if (user.match(userPat)==null) {
							            return false
							        }
							        var IPArray=domain.match(ipDomainPat)
							        if (IPArray!=null) {
							            // this is an IP address
							                  for (var i=1;i<=4;i++) {
							                    if (IPArray[i]>255) {
							                        return false
							                    }
							            }
							            return true
							        }
							        var domainArray=domain.match(domainPat)
							        if (domainArray==null) {
							            return false
							        }
							 
							        var atomPat=new RegExp(atom,"g")
							        var domArr=domain.match(atomPat)
							        var len=domArr.length
							 
							        if (domArr[domArr.length-1].length<2 ||
							            domArr[domArr.length-1].length>3) {
							           return false
							        }
							 
							        if (len<2)
							        {
							           return false
							        }
							 
							        return true;
							}
							//Email funciton End

							$(document).ready(function(){

								$('#submit').click(function(){

									var user = $.trim($('[name = "user"]').val());
									var email = $.trim($('[name = "email"]').val());
									var pass = $.trim($('[name = "pass"]').val());

									if(user == '' || user.length < 6){
										alert("Tên đăng nhập phải dài hơn 6 ký tự");
										return false;
									}
									else if(pass.length < 6){
										alert("Mật khẩu phải dài hơn 6 ký tự");
										return false;
									}
									else if(!isEmail(email)){
										alert("Email không đúng!");
										return false;
									}
									else
										return true;
									
								})
									
							})

						</script>

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