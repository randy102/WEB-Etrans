<?php
	$conn = mysqli_connect(HOST,USER,PASS,DB);
	$lang = mysqli_query($conn,"SET NAMES 'utf8'");

	$sql = "SELECT * FROM member INNER JOIN author ON member.id = author.id WHERE level <= 2";
	$query = mysqli_query($conn,$sql);
?>

<!--title-->

<div class=row>
	<div class="col-md-12">
		<h1 class=page-header>
			Nhóm tác giả
			<small>Authors</small>
		</h1>
	</div>
</div>

<!--/title-->

<!--breadcrumb-->

<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href=""><i class="fa fa-cog fa-fw"></i> Admin</a></li>
			<li class="active"><i class="fa fa-fw fa-users"></i> Tác giả</li>
		</ul>
	</div>
</div>

<!--/breadcrumb-->

<!--authors-->

<div class="row">
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

					<?php if($_SESSION['user'] == $result['user']){ ?>

					<a href="/admin/index.php?url=author-edit&id=<?php echo $result['id'] ?>" id=edit-author><i class="fa fa-pencil-square-o"></i>Sửa</a>

					<?php } ?>
				</div>
			</div>
			
		</div>
	</div>

	<!--/authors item-->
	<?php } ?>

</div>

<!--/authors-->

<script type="text/javascript">
	$(document).ready(function(){
		var width = $('.author-item img').width();
		$('.author-item img').height(width);
	})
</script>