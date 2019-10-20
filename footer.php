			<?php

			error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
			require"module/connectdb.php";

			$conn = mysqli_connect(HOST,USER,PASS,DB);
			$lang = mysqli_query($conn,"SET NAMES 'utf8'");

			?>

			<footer class="navbar navbar-static-top">
				<div class="container">
					<div class="col-md-4">
						<div class="foot-title h3">Bài dịch</div>
						<ul class="list-unstyled">
						<?php  
							$sql_1 = "SELECT * FROM trans ORDER BY id DESC LIMIT 4";
							$query_1 = mysqli_query($conn,$sql_1);
							while($result = mysqli_fetch_array($query_1)){ 
						?>
							<li><a href="/draff-trans.php?t=trans&id=<?php echo $result['id']; ?>"><?php echo $result['eng_title']; ?></a></li>
						<?php } ?>
						</ul>
					</div>

					<div class="col-md-4">
						<div class="foot-title h3">Truyện ngắn</div>
						<ul class="list-unstyled">
							<?php  
							$sql_2 = "SELECT * FROM story ORDER BY id DESC LIMIT 4";
							$query_2 = mysqli_query($conn,$sql_2);
							while($result = mysqli_fetch_array($query_2)){ 
						?>
							<li><a href="/draff-trans.php?t=story&id=<?php echo $result['id']; ?>"><?php echo $result['eng_title']; ?></a></li>
						<?php } ?>
						</ul>
					</div>

					<div class="col-md-4">
						<div class="foot-title h3">Bài viết</div>
						<ul class="list-unstyled">
							<?php  
							$sql_3 = "SELECT * FROM post ORDER BY id DESC LIMIT 4";
							$query_3 = mysqli_query($conn,$sql_3);
							while($result = mysqli_fetch_array($query_3)){ 
						?>
							<li><a href="/draff-post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></li>
						<?php } ?>
						</ul>
					</div>

					<div class="col-md-12" style="border-top:1px solid #7d7d7d; padding:15px 0px;">
						<!--Logo-->
						<div class="col-md-2" style="height:50px;">
							<img src="/img/face/logo.png" height="50px">
						</div>
						<!--/Logo-->

						<div class="col-md-4" style="height:50px; line-height:50px; color:#b9b9b9; white-space: nowrap;">
							Copyright 2016 Powered & Design By Randy Liu
						</div>

						<!--Social-->
						<div class="col-md-3 social-footer" style="padding:5px 0px;height:50px; padding-left:25px;">
							<a rel="nofollow" href="https://www.facebook.com/hoctienganhgiaotiep.etrans"><i class="fa fa-facebook-official"></i></a>
							<a rel="nofollow" href="https://plus.google.com/b/104333787602103169408/104333787602103169408/about?pageId=104333787602103169408&hl=vi&_ga=1.39501285.731353894.1464426657"><i class="fa fa-google-plus-square"></i></a>
							<a rel="nofollow" href="#"><i class="fa fa-twitter-square"></i></a>
							<a rel="nofollow" href="https://www.youtube.com/channel/UC3WKitZ-QSPuJ_cvYSGy1Ow"><i class="fa fa-youtube-square"></i></a>
						</div>
						<!--/Social-->

						<!--View-->
						<div class="col-md-3" style="height:50px; line-height:50px;">
							<div class="views"> Tổng lượt xem: 
								<?php
									$sql_view_now = "SELECT * FROM views WHERE view_name = 'all'";
									$query_view_now = mysqli_query($conn,$sql_view_now);
									$result_view_n = mysqli_fetch_array($query_view_now);

									$view_now = $result_view_n['view'];
									$view_now++;

									echo $view_now;

									$sql_view_up = "UPDATE views SET view='$view_now' WHERE view_name = 'all'";
									$query_view_up = mysqli_query($conn,$sql_view_up);

								?>
							</div>
						</div>
						<!--/view-->
					</div>
				</div>
			</footer>

			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
			<script type="text/javascript">
				$(function(){  
				$(window).scroll(function () {
				if ($(this).scrollTop() > 100) $('#goTop').fadeIn();
				else $('#goTop').fadeOut();
				});
				$('#goTop').click(function () {
				$('body,html').animate({scrollTop: 0}, 'slow');
				});
				});
			</script>

			<div id="goTop">
				<i class="fa fa-arrow-circle-o-up"></i>
			</div>	

