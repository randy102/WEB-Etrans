<?php
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED); ob_start(); session_start();
	if(isset($_SESSION['level']) && $_SESSION['level'] <= 2){
?>
<!DOCTYPE html>

<html>
	<head>
		<meta http-equiv="Content-Type" content=text/html  charset="utf-8"/ >
		
		<title>Control Panel</title>

		<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="/css/admin.css">
		<link rel="stylesheet" type="text/css" href="/css/animate.css">

		<link rel="icon" type="image/x-icon" href="/img/face/favicon.ico">

		<script type="text/javascript" src="/js/jquery-2.0.0.min.js"></script>
		<script type="text/javascript" src="/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
	</head>
	<body>
		<div class="wrapper">
			<!--Header-->
			<nav class="navbar navbar-fixed-top navbar-static-top navbar-inverse" role="navigation">
				
				<div class="navbar-header">
					<a href="" class="navbar-brand"><i class="fa fa-fw fa-cog"></i> Etrans Admin</a>
				</div>

				<ul class="nav navbar-right top-user">
					<li class="dropdown"><a data-toggle="dropdown" href=""><i class="fa fa-user"></i> Chào <?php echo $_SESSION['user']; ?> <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="/user/logout.php"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
							<li><a href="/home.php"><i class="fa fa-home"></i> Về trang chủ</a></li>
						</ul>
					</li>
				</ul>

				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav left-bar"> 
						<li class=<?php if($_GET['url'] == 'home') echo"active"; ?> ><a href="/admin/index.php?url=home"><i class="fa fa-fw fa-home"></i> Trang chủ</a></li>

						<li class=<?php if($_GET['url'] == 'control-member' || $_GET['url'] == 'member-add') echo"active"; if($_SESSION['level'] > 1) echo "disabled" ?>><a href=<?php if($_SESSION['level'] == 1) echo"/admin/index.php?url=control-member" ?>><i class="fa fa-fw fa-user"></i> Quản lý thành viên</a></li>

						<li class=<?php if($_GET['url'] == 'control-author' || $_GET['url'] == 'author-edit') echo"active"; ?>><a href="/admin/index.php?url=control-author"><i class="fa fa-fw fa-users"></i> Nhóm tác giả</a></li>

						<li class=<?php if($_GET['url'] == 'control-trans' || $_GET['url'] == 'trans-add' || $_GET['url'] == 'trans-edit') echo"active"; ?>><a href="/admin/index.php?url=control-trans"><i class="fa fa-fw fa-book"></i> Quản lý bài dịch</a></li>

						<li class=<?php if($_GET['url'] == 'control-story' || $_GET['url'] == 'story-add' || $_GET['url'] == 'story-edit') echo"active"; ?>><a href="/admin/index.php?url=control-story"><i class="fa fa-fw fa-commenting"></i> Quản lý truyện ngắn</a></li>

						<li class=<?php if($_GET['url'] == 'control-post' || $_GET['url'] == 'post-add' || $_GET['url'] == 'post-edit') echo"active"; ?>><a href="/admin/index.php?url=control-post"><i class="fa fa-fw fa-pencil"></i> Quản lý bài viết</a></li>
						
					</ul>
				</div>
			</nav>
			<!--/Header-->

			<?php
				require"../module/connectdb.php";
			?>

			<!--Main content-->
			<div id="main-content" class="animated fadeIn">
				<div class="container-fluid">
					<!--main-content-place-->
					<?php 
						
						if(empty($_GET['url'])){
							include_once('home.php');
						}
						else{
							
							$url = $_GET['url'];
							$file_path = $url.".php";
							include_once($file_path) ;
						}
						
					?>
					<!--/main-content-place-->
				</div>
			</div>
			<!--/Main content-->

		</div>
	</body>
</html>
<?php
} else header("location: /home.php");
?>