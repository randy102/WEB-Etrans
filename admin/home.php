<!--title-->

<div class=row>
	<div class="col-md-12">
		<h1 class=page-header>
			Trang chủ
			<small>Home</small>
		</h1>
	</div>
</div>

<!--/title-->

<!--breadcrumb-->

<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href=""><i class="fa fa-cog fa-fw"></i> Admin</a></li>
			<li class="active"><i class="fa fa-fw fa-home"></i> Trang chủ</li>
		</ul>
	</div>
</div>

<!--/breadcrumb-->

<?php

	$conn = mysqli_connect(HOST,USER,PASS,DB);
	$lang = mysqli_query($conn,"SET NAMES 'utf8'");

	$sql_view = "SELECT view FROM views WHERE view_name = 'all'";
	$query_view = mysqli_query($conn,$sql_view);
	$num_view = mysqli_fetch_array($query_view);

	$sql_au = "SELECT * FROM member WHERE level <= 2";
	$query_au = mysqli_query($conn,$sql_au);
	$num_au = mysqli_num_rows($query_au);

	$sql_mem = "SELECT * FROM member";
	$query_mem = mysqli_query($conn,$sql_mem);
	$num_mem = mysqli_num_rows($query_mem);

	$sql_trans = "SELECT * FROM trans";
	$query_trans = mysqli_query($conn,$sql_trans);
	$num_trans = mysqli_num_rows($query_trans);

	$sql_sto = "SELECT * FROM story";
	$query_sto = mysqli_query($conn,$sql_sto);
	$num_sto = mysqli_num_rows($query_sto);

	$sql_po = "SELECT * FROM post";
	$query_po = mysqli_query($conn,$sql_po);
	$num_po = mysqli_num_rows($query_po);	

?>

<!--Thong ke-->

<div class="row">
	<!--Lượt xem-->

	<div class="col-lg-4 col-md-6">
		<div class="panel" style="border-color: #92599c;">

			<div class="panel-heading" style="border-color: #92599c; color: #fff;background-color: #92599c;">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-eye fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $num_view['view'] ?></div>
						<div>Lượt xem</div>
					</div>
				</div>
			</div>

			<a href="" style="color:#92599c">
				<div class="panel-footer">
					<span class="pull-left">Xem thêm</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		
		</div>
	</div>

	<!--/Lượt xem-->

	<!--Author-->

	<div class="col-lg-4 col-md-6">
		<div class="panel" style="border-color: #87caff;">

			<div class="panel-heading" style="border-color: #87caff; color: #fff;background-color: #87caff;">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-users fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $num_au; ?></div>
						<div>Tác giả</div>
					</div>
				</div>
			</div>

			<a href="/admin/index.php?url=control-author" style="color:#87caff">
				<div class="panel-footer">
					<span class="pull-left">Xem thêm</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		
		</div>
	</div>

	<!--/Author-->

	<!--member-->

	<div class="col-lg-4 col-md-6">
		<div class="panel panel-primary">

			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-user fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $num_mem; ?></div>
						<div>Thành viên!</div>
					</div>
				</div>
			</div>

			<a href="<?php if($_SESSION['level'] == 1) echo"/admin/index.php?url=control-member" ?>">
				<div class="panel-footer">
					<span class="pull-left">Xêm thêm</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		
		</div>
	</div>

	<!--/member-->

	<!--Bài dịch-->
	<div class="col-lg-4 col-md-6">
		<div class="panel" style="border-color: #d9534f;">

			<div class="panel-heading" style="border-color: #d9534f; color: #fff;background-color: #d9534f;">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-book fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $num_trans ?></div>
						<div>Bài dịch!</div>
					</div>
				</div>
			</div>

			<a href="/admin/index.php?url=control-trans" style="color:#d9534f">
				<div class="panel-footer">
					<span class="pull-left">Xem thêm</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		
		</div>
	</div>
	<!--/Bài dịch-->

	<!--Truyện ngắn-->

	<div class="col-lg-4 col-md-6">
		<div class="panel" style="border-color: #5cb85c;">

			<div class="panel-heading" style="border-color:#5cb85c; color:#fff; background-color: #5cb85c;">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-commenting fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $num_sto ?></div>
						<div>Truyện ngắn!</div>
					</div>
				</div>
			</div>

			<a href="/admin/index.php?url=control-story" style="color: #5cb85c;">
				<div class="panel-footer">
					<span class="pull-left">Xêm thêm</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		
		</div>
	</div>

	<!--/Truyện ngắn-->

	<!--Bài viết-->

	<div class="col-lg-4 col-md-6">
		<div class="panel" style="border-color: #f0ad4e;">

			<div class="panel-heading" style="border-color:#f0ad4e; color:#fff; background-color: #f0ad4e;">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-pencil fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $num_po ?></div>
						<div>Bài viết!</div>
					</div>
				</div>
			</div>

			<a href=/admin/index.php?url=control-post style="color: #f0ad4e;">
				<div class="panel-footer">
					<span class="pull-left">Xêm thêm</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		
		</div>
	</div>

	<!--/Bài viết-->

</div>

<!--/Thong ke-->

<!--rule-->
	
<div class=row>
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<b><i class="fa fa-fw fa-bell"></i> Qui tắt đăng bài</b>
			</div>
			<div class="panel-body">
				<ul class="list-unstyled list-group">
					<li class="list-group-item">Bài viết phải được duyệt qua bởi Admin trước khi đăng.</li>
					<li class="list-group-item">Khi copy bài viết của trang khác phải ghi nguồn đầy đủ.</li>
					<li class="list-group-item">Người viết chịu trách nhiệm toàn bộ về nội dung, bản quyền, riêng tư...</li>
					<li class="list-group-item">Không viết sai sự thật, không chứa các nội dung nhạy cảm, chính trị hay lăng mạ, sỉ nhục người khác...</li>
					<li class="list-group-item">Các thành viên vi phạm những điều trên sẽ bị khóa tài khoản.</li>
					
				</ul>
			</div>
		</div>
	</div>
</div>

<!--/rule-->

<!--danh ngon-->
<div class="row">
	<div class="col-md-12">
		<blockquote>
			<p>
				Văn học có thể giống như ánh sáng, chỉ cần mọi người sử dụng một cách thích hợp, nó có thể xuyên thấu mọi thứ.
			</p>
			<small>
				<cite>Huxley</cite>
			</small>
		</blockquote>
	</div>
</div>
<!--/danh ngon-->

