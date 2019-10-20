<?php

	$id = $_GET['id'];

	$conn = mysqli_connect(HOST,USER,PASS,DB);
	$lang = mysqli_query($conn,"SET NAMES 'utf8'");

	$sql = "SELECT * FROM story WHERE id='$id'";
	$query = mysqli_query($conn,$sql);
	$result = mysqli_fetch_array($query);

?>

<!--title-->

<div class=row>
	<div class="col-md-12">
		<h1 class=page-header>
			Sửa truyện ngắn
			<small>Edit story</small>
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
			<li class="active"><i class="fa fa-pencil fa-fw"></i> Sửa truyện ngắn</li>
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
				<input type="text" name="e_title" class="form-control" value="<?php if(isset($_POST['e_title'])) echo $_POST['e_title']; else echo $result['eng_title']; ?>">
			</div>

			<div class="form-group">
				<label>Nội dung gốc</label>
				<textarea name="e_cont" class="form-control ckeditor"><?php if(isset($_POST['e_cont'])) echo $_POST['e_cont']; else echo $result['eng_cont']; ?></textarea> 
			</div>

			<div class="form-group">
				<label>Tiêu đề tiếng Việt</label>
				<input type="text" name="v_title" class="form-control" value="<?php if(isset($_POST['v_title'])) echo $_POST['v_title']; else echo $result['vi_title']; ?>">
			</div>

			<div class="form-group">
				<label>Nội dung bản dịch</label>
				<textarea name="v_cont" class="form-control ckeditor"><?php if(isset($_POST['v_cont'])) echo $_POST['v_cont']; else echo $result['vi_cont']; ?></textarea> 
			</div>

			<div class="form-group">
				<label>Ảnh bìa</label><br>
				<img class="img-thumbnail" src="/img/story/<?php echo $result['img']; ?>">
			</div>
			
			<div class="form-group">
				<label>Thay đổi ảnh bìa</label>
				<input class="update-img" type="file" name="img">
			</div>

			<button type="submit" name=submit class="btn btn-md btn-info"><i class="fa fa-refresh fa-fw"></i> Cập nhật</button>

		</form>
	</div>
</div>

<!--/add form-->

<?php

if(isset($_POST['submit'])){

	$e_title = $_POST['e_title'];
	$v_title = $_POST['v_title'];
	$e_cont = $_POST['e_cont'];
	$v_cont = $_POST['v_cont'];

	$e_cont_r = addslashes($e_cont);
	$v_cont_r = addslashes($v_cont);
	$e_title_r = htmlspecialchars($e_title);
	$v_title_r = htmlspecialchars($v_title);

	if($_FILES['img']['name']){

		$file_path = "../img/story/".$result['img'];
		if (file_exists($file_path)) unlink($file_path);

		$img_name = $_FILES['img']['name'];
		$img_path = $_FILES['img']['tmp_name'];

		$img_name_r = addslashes($img_name);

		$new_img_url = "../img/story/".$img_name_r;
		$upload_img = move_uploaded_file($img_path,$new_img_url);

		$sql = "UPDATE story SET eng_title = '$e_title_r', eng_cont = '$e_cont_r', vi_title='$v_title_r', vi_cont='$v_cont_r', img='$img_name_r' WHERE id='$id'";
	}

	else $sql = "UPDATE story SET eng_title = '$e_title_r', eng_cont = '$e_cont_r', vi_title='$v_title_r', vi_cont='$v_cont_r' WHERE id='$id'";

	$conn = mysqli_connect(HOST,USER,PASS,DB);
	$lang = mysqli_query($conn,"SET NAMES 'utf8'");

	
	$query = mysqli_query($conn,$sql);

	$close = mysqli_close($conn);

	if($query) header('location: /admin/index.php?url=control-story');
}

?>