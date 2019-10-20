<?php

	$conn = mysqli_connect(HOST,USER,PASS,DB);
	$lang = mysqli_query($conn,"SET NAMES 'utf8'");

	$sql_1 = "SELECT * FROM kinds";
	$query_1 = mysqli_query($conn,$sql_1);

?>

<!--title-->

<div class=row>
	<div class="col-md-12">
		<h1 class=page-header>
			Đăng bài viết
			<small>Post Blog</small>
		</h1>
	</div>
</div>

<!--/title-->

<!--breadcrumb-->

<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href=""><i class="fa fa-cog fa-fw"></i> Admin</a></li>
			<li><a href="/admin/index.php?url=control-post"><i class="fa fa-fw fa-pencil"></i> Bài viết</a></li>
			<li class="active"><i class="fa fa-plus fa-fw"></i> Đăng bài viết</li>
		</ul>
	</div>
</div>

<!--/breadcrumb-->

<!--add form-->

<div class="row">
	<div class="col-md-10">
		<form method="post" enctype="multipart/form-data">

			<div class="form-group">
				<label>Tiêu đề</label>
				<input type="text" name="title" class="form-control">
			</div>

			<div class="form-group">
				<label>Đoạn mở bài</label>
				<textarea name="head_cont" class="form-control"></textarea> 
			</div>

			<div class="form-group">
				<label>Nội dung bài viết</label>
				<textarea name="cont" class="form-control ckeditor"></textarea> 
			</div>

			<div class="form-group">
				<label>Chuyên mục</label>
				<select name="kind" class="form-control">
					<?php  while($result_1 = mysqli_fetch_array($query_1)) { ?>
					<option value="<?php echo $result_1['kind_id'] ?>"><?php echo $result_1['kind_name'] ?></option>
					<?php } ?>
				</select>
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

	$title = $_POST['title'];
	$head_cont = $_POST['head_cont'];
	$cont = $_POST['cont'];
	$kind = $_POST['kind'];
	$img_name = $_FILES['img']['name'];
	$img_path = $_FILES['img']['tmp_name'];
	
	$title_r = htmlspecialchars($title);
	$cont_r = addslashes($cont);
	$head_cont_r =htmlspecialchars($head_cont);
	$img_name_r = addslashes($img_name);

	$author = $_SESSION['user'];
	$time = date('M-d-Y');

	$new_img_url = "../img/post/".$img_name_r;
	$upload_img = move_uploaded_file($img_path,$new_img_url);

	


	$sql = "INSERT INTO post(title,head_cont,cont,kind_id,img, author, date) VALUES ('$title_r','$head_cont_r','$cont_r','$kind','$img_name_r','$author','$time')";
	$query = mysqli_query($conn,$sql);

	$close = mysqli_close($conn);

	if($query) header("location: /admin/index.php?url=control-post");

}

?>