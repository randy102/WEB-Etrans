<?php

	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
	require"module/connectdb.php";

	$conn = mysqli_connect(HOST,USER,PASS,DB);
	$lang = mysqli_query($conn,"SET NAMES 'utf8'");

	$id = $_GET['id'];

	$sql = "SELECT * FROM post INNER JOIN kinds ON post.kind_id = kinds.kind_id WHERE id='$id'";
	$sql_2 = "SELECT * FROM post ORDER BY id DESC LIMIT 4";

	$query_2 = mysqli_query($conn,$sql_2);
	$query = mysqli_query($conn,$sql);

	$result = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $result['title'] ?></title>

		<meta http-equiv="Content-Type" content=text/html  charset="utf-8"/ >
		<meta name="keywords" content="" />
		<meta name="description" content=""/>

		<link rel="stylesheet" type="text/css" href="/css/index.css">
		<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/css/draff.css">
		<link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">

		<link rel="icon" type="image/x-icon" href="/img/face/favicon.ico">

		<script type="text/javascript" src="/js/jquery-2.0.0.min.js"></script>
		<script type="text/javascript" src="/js/bootstrap.min.js"></script>
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script>
		  (adsbygoogle = window.adsbygoogle || []).push({
		    google_ad_client: "ca-pub-2895106928953600",
		    enable_page_level_ads: true
		  });
		</script>
	</head>
	<body>
		<!--header-->
		<?php
			require"header.php";
		?>
		<!--/header-->

		<!--main content-->
		<div class="container main-content-all">
			<!--ads-->
			<div class=row>
				<div class="col-md-12">
					<div class="ads-top">
						Adsvertise
					</div>
				</div>
			</div>	
			<!--/ads-->

			<!--Breadcrumbs-->
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb">
						<li><a href="">Home</a></li>
						<li><a href="/postlist.php">Blog</a></li>
						<li><a href="/postlist.php?k=<?php echo $result['kind_id'] ?>"><?php echo $result['kind_name'] ?></a></li>
						<li class="active"><?php echo $result['title'] ?></li>
					</ul>
				</div>
			</div>
			<!--/Breadcrumbs-->

			<!--trans title-->

			<div class="row">
				<div class="col-md-12">
					<div class="trans-title">
						<h1><?php echo $result['title'] ?></h1>
					</div>
				</div>
			</div>

			<!--/trans title-->

			<!--info - social-->
			<div class="row">
				<div class="col-md-12 info-all">
					<div class="col-md-4 info">
						<div class="info">
							Tác giả: <?php echo $result['author']; ?> | Ngày đăng: <?php echo $result['date']; ?>
						</div>
					</div>

					<div class="col-md-3 social">
						<div class="face-social">
							<div id="fb-root"></div>
							<script>(function(d, s, id) {
							  var js, fjs = d.getElementsByTagName(s)[0];
							  if (d.getElementById(id)) return;
							  js = d.createElement(s); js.id = id;
							  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.7";
							  fjs.parentNode.insertBefore(js, fjs);
							}(document, 'script', 'facebook-jssdk'));</script>

							<div class="fb-like" data-layout="button" data-action="like" data-size="large" data-show-faces="false" data-share="true"></div>
						</div>
						<div class="google">
							<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>
							<div class="g-plusone" data-size="medium"></div>
						</div>
					
					</div>				
				</div>
			</div>
			<!--/info - social-->

			<!--Post content-->
			<div class="row">
				<div clas="col-md-12">
					<!--Main content-->
					<div class="col-md-8 post-cont">
						<b><?php echo $result['head_cont'] ?></b>

						<img src="/img/post/<?php echo $result['img'] ?>" id="post-img">
						
						<?php echo $result['cont'] ?>
						
					<hr>
					</div>

					<!--/Main content-->

					<!--See more-->
					<div class="col-md-4">
						<div class="panel panel-primary see-more">
							<div class="panel-heading">
								<i class="fa fa-eye"></i> Xem thêm
							</div>
							<div class="panel-body">
								<ul class="list-unstyled">
								<?php while($result_2 = mysqli_fetch_array($query_2)){ ?>
									<li><a href="/draff-post.php?id=<?php echo $result_2['id'] ?>"><?php echo $result_2['title'] ?></a></li>
								<?php } ?>
								</ul>
							</div>
						</div>
					</div>
					<!--/See more-->
				</div>
			</div>
			
			<!--/Post content-->
		</div>
		<!--/main content-->

		<!--footer-->
		<?php
			require"footer.php";
		?>
		<!--/footer-->
		<script type="text/javascript">
			$(document).ready(function(){
				$('p').addClass('normal');
			})

		</script>
		
	</body>

	<!--Chuyển background-->
	<script type="text/javascript">
		var x = Math.floor((Math.random() * 10) + 1);
		var path = "/img/face/draff-"+x+".jpg";
		$('body').css("background-image","url("+path+")");
	</script>
	<!--/Chuyển background-->
</html>