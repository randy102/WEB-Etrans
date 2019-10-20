<!--title-->

<div class=row>
	<div class="col-md-12">
		<h1 class=page-header>
			Đăng truyện ngắn
			<small>Post story</small>
		</h1>
	</div>
</div>

<!--/title-->

<!--breadcrumb-->

<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href=""><i class="fa fa-cog fa-fw"></i> Admin</a></li>
			<li><a href="/admin/index.php?url=control-story"><i class="fa fa-fw fa-commenting"></i> Truyện ngắn</a></li>
			<li class="active"><i class="fa fa-plus fa-fw"></i> Đăng truyện ngắn</li>
		</ul>
	</div>
</div>

<!--/breadcrumb-->

<!--add form-->

<div class="row">
	<div class="col-md-10">
		<form method="post" enctype="multipart/form-data">

			<div class="form-group">
				<label>Tiêu đề tiếng Anh</label>
				<input type="text" name="e_title" class="form-control">
			</div>

			<div class="form-group">
				<label>Nội dung gốc</label>
				<textarea name="e_cont" class="form-control ckeditor"></textarea> 
			</div>

			<div class="form-group">
				<label>Tiêu đề tiếng Việt</label>
				<input type="text" name="v_title" class="form-control">
			</div>

			<div class="form-group">
				<label>Nội dung bản dịch</label>
				<textarea name="v_cont" class="form-control ckeditor"></textarea> 
			</div>
			
			<div class="form-group">
				<label>Ảnh bìa</label>
				<input class="update-img" type="file" name="img">
			</div>

			<button type="submit" name=submit class="btn btn-md btn-success"><i class="fa fa-plus fa-fw"></i> Đăng bài</button>

		</form>
	</div>
</div>

<!--/add form-->

<?php

if(isset($_POST['submit'])){
	date_default_timezone_set('Asia/Ho_Chi_Minh');

	$e_title = $_POST['e_title'];
	$v_title = $_POST['v_title'];
	$e_cont = $_POST['e_cont'];
	$v_cont = $_POST['v_cont'];
	$img_name = $_FILES['img']['name'];
	$img_path = $_FILES['img']['tmp_name'];

	$e_cont_r = addslashes($e_cont);
	$v_cont_r = addslashes($v_cont);
	$e_title_r = htmlspecialchars($e_title);
	$v_title_r = htmlspecialchars($v_title);
	$img_name_r = addslashes($img_name);
	
	$author = $_SESSION['user'];
	$time = date('M-d-Y');

	$new_img_url = "../img/story/".$img_name;
	$upload_img = move_uploaded_file($img_path,$new_img_url);

	$conn = mysqli_connect(HOST,USER,PASS,DB);
	$lang = mysqli_query($conn,"SET NAMES 'utf8'");

	$sql = "INSERT INTO story(eng_title,eng_cont,vi_title,vi_cont,img, author, date) VALUES ('$e_title_r','$e_cont_r','$v_title_r','$v_cont_r','$img_name_r','$author','$time')";
	$query = mysqli_query($conn,$sql);

	$close = mysqli_close($conn);

	if($query) header("location: /admin/index.php?url=control-story");

}

?>