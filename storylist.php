<!DOCTYPE html>
<html>
	<head>
		<title>Tổng hợp truyện ngắn song ngữ tiếng Anh</title>

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

	if(!$_GET['p']) $p = 1;
	else $p = $_GET['p'];
		
	$max_unit = 6;
	$first = $p*$max_unit - $max_unit;

	if(!$_GET['dvd']) $dvd=1; else $dvd=$_GET['dvd'];

	$sql = "SELECT * FROM story ORDER BY id DESC LIMIT $first, $max_unit";
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
			<div class="main-title wow flipInX bg-story">
				<div class="col-md-2">
					<div class="circle-title">
						<i class="fa fa-pencil"></i>
					</div>
				</div>
				<div class="col-md-10">
					<h1>Story</h1>
				</div>
			</div>
				

		<!--/Main title-->
		<div class="container">
			<div class="row">
				<!--Left site-->
				<div class="col-md-9">
					<!--Items-->
					<div class="items">

						<?php while($result = mysqli_fetch_array($query)){ ?>

						<!--New item-->
						<div class="media item">
							<div class="media-left">
								<a href="/draff-trans.php?t=story&id=<?php echo $result['id']; ?>">
									<img src="/img/story/<?php echo $result['img']; ?>" class="media-object hvr-push">
								</a>
							</div>

							<div class="media-body" style="padding-top:5px;">

								<a href="/draff-trans.php?t=story&id=<?php echo $result['id']; ?>" class="media-heading h3"><?php echo $result['eng_title']; ?></a>

								<div class="date"><?php echo $result['date']; ?></div>

								<p></p>

								<div class="post-tags">
									<span class="label label-success">Truyện ngắn</span>
									<a href="/draff-trans.php?t=story&id=<?php echo $result['id']; ?>" class="btn btn-info" style="float:right; margin-right:10px;">Xem thêm</a>
								</div>
							</div>
						</div>
						<!--/New item-->

						<?php } ?>
					</div>
					<!--/Items-->

					<!--pagination-->

					<div class="row">
						<div class="col-md-12 text-right">
							<ul class="pagination">
								<?php
										$sql_2 = "SELECT * FROM story";
										$query_2 = mysqli_query($conn,$sql_2);
										$num = mysqli_num_rows($query_2);
										
										$all_p = ceil($num/$max_unit);
										$list = '';
										
										$prev = $p - 1;
										if($p > 1) $list .= "<li><a href=".$_SERVER['PHP_SELF']."?url=control-story&p=$prev>&laquo;</a></li>";

										// Liet ke danh sach so trang
										for($i=1; $i<=$all_p; $i++){
											if($p == $i) $list .= "<li class=active><a>$i</a></li>";
											else $list .= "<li><a href=".$_SERVER['PHP_SELF']."?url=control-story&p=$i>".$i." </a></li>";
										}

										// Tao nut Next
										$next = $p + 1;
										if($p < $all_p) $list .= "<li><a href=".$_SERVER['PHP_SELF']."?url=control-story&p=$next>&raquo;</a></li>";

										// Suat ra thanh phan trang
										echo $list;

										$close = mysqli_close($conn);
								?>
							</ul>
						</div>
					</div>

				<!--/agination-->

				</div>
				<!--/Left site-->

				<!--Right site-->
				<div class="col-md-3">
					<!-- Start of shink.in banner code -->
					<a href="http://shink.in/r/109223"><img src="http://shink.in/img/banner160.jpg" title="shink.in- Make short links and earn money" /></a>
					<!-- End of shink.in banner code -->
				</div>
				<!--/Right site-->

			</div>
		</div>
		<!--/Main content-->

		<!--footer-->
		<?php
			require"footer.php";
		?>
		<!--/footer-->
	</body>
</html>