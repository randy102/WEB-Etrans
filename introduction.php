<!DOCTYPE html>
<html>
	<head>
		<title>Giới thiệu</title>

		<meta http-equiv="Content-Type" content=text/html  charset="utf-8"/ >
		<meta name="keywords" content="" />
		<meta name="description" content=""/>

		<link rel="stylesheet" type="text/css" href="/css/index.css">
		<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/css/list.css">
		<link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="/css/hover-min.css">
		<link rel="stylesheet" type="text/css" href="/css/animate.css">
	

		<link rel="icon" type="image/x-icon" href="/img/face/favicon.ico">

		<script type="text/javascript" src="/js/jquery-2.0.0.min.js"></script>
		<script type="text/javascript" src="/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/js/wow.min.js"></script>
		<script type="text/javascript">
			 new WOW().init();
		</script>
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2895106928953600",
    enable_page_level_ads: true
  });
</script>
	</head>

	<?php
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
	require"module/connectdb.php";

	$conn = mysqli_connect(HOST,USER,PASS,DB);
	$lang = mysqli_query($conn,"SET NAMES 'utf8'");

	$sql = "SELECT * FROM member INNER JOIN author ON member.id = author.id WHERE level <= 2";
	$query = mysqli_query($conn,$sql);	

	?>

	<body>
		<!--header-->
		<?php
			require"header.php";
		?>
		<!--/header-->

		<!--Main content-->

		<!--Main title-->
			<div class="main-title wow flipInX bg-intro">
				<div class="col-md-2">
					<div class="circle-title ">
						<i class="fa fa-info"></i>
					</div>
				</div>
				<div class="col-md-10">
					<h1>Introduction</h1>
				</div>
			</div>
				

		<!--/Main title-->
		<div class="container">
			<!--Sub title-->
			<div class="row">
				<div class="col-md-12">
					<div class="sub-title">
						Tác giả
					</div>
				</div>
			</div>
			<!--/Sub title-->

			<?php while($result = mysqli_fetch_array($query)){ ?>
				<!--authors item-->

				<div class="col-md-4 col-lg-3">
					<div class="panel panel-default author-item">
						<div class="panel-heading">
							<img src="/img/member/<?php echo $result['img'] ?>" class="img-responsive">
						</div>
						
						<div class="panel-body">
							<h3><?php echo $result['user'] ?></h3>
							<p><?php echo $result['intro'] ?></p>
							<div class="social-author-contact text-left">
								<a target=_blank href="<?php echo $result['link_face'] ?>"><i class="fa fa-facebook-official"></i></a>
								<a target=_blank href="<?php echo $result['link_go'] ?>"><i class="fa fa-google-plus-square"></i></a>
								<a target=_blank href="<?php echo $result['link_twitter'] ?>"><i class="fa fa-twitter-square"></i></a>
							</div>
						</div>
						
					</div>
				</div>

				<!--/authors item-->
			<?php } ?>
			<!--/authors-->
							
	
				<!--/Left site-->


			</div>
		</div>
		<!--/Main content-->

		<!--footer-->
		<?php
			require"footer.php";
		?>
		<!--/footer-->

		<script type="text/javascript">
		$(document).ready(function(){
		var width = $('.author-item img').width();
		$('.author-item img').height(width);
	})
</script>
	</body>
</html>