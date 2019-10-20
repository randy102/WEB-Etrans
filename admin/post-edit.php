<?php

	$id = $_GET['id'];

	$conn = mysqli_connect(HOST,USER,PASS,DB);
	$lang = mysqli_query($conn,"SET NAMES 'utf8'");

	$sql = "SELECT * FROM post WHERE id='$id'";
	$query = mysqli_query($conn,$sql);
	$result = mysqli_fetch_array($query);

	$sql_1 = "SELECT * FROM kinds";
	$query_1 = mysqli_query($conn,$sql_1);

?>

<!--title-->

<div class=row>
	<div class="col-md-12">
		<h1 class=page-header>
			Sửa bài viết
			<small>Edit Blog</small>
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
			<li class="active"><i class="fa fa-pencil fa-fw"></i> Sửa bài viết</li>
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
				<input type="text" name="title" class="form-control" value="<?php if(isset($_POST['title'])) echo $_POST['title']; else echo $result['title']; ?>">
			</div>

			<div class="form-group">
				<label>Đoạn mở bài</label>
				<textarea name="head_cont" class="form-control"><?php if(isset($_POST['head_cont'])) echo $_POST['head_cont']; else echo $result['head_cont']; ?></textarea> 
			</div>

			<div class="form-group">
				<label>Nội dung bài viết</label>
				<textarea name="cont" class="form-control ckeditor"><?php if(isset($_POST['cont'])) echo $_POST['cont']; else echo $result['cont']; ?></textarea> 
			</div>

			<div class="form-group">
				<label>Chuyên mục</label>
				<select name="kind" class="form-control">
					<?php  while($result_1 = mysqli_fetch_array($query_1)) { ?>
					<option <?php if($result['kind_id'] == $result_1['kind_id']) echo"selected=selected" ?> value="<?php if($_POST['kind']) echo $_POST['kind']; else echo $result_1['kind_id']; ?>">
						<?php echo $result_1['kind_name'] ?>
					</option>
					<?php } ?>
				</select>
			</div>
			
			<div class="form-group">
				<label>Ảnh bìa</label><br>
				<img class="img-thumbnail" src="/img/post/<?php echo $result['img']; ?>">
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
	date_default_timezone_set('Asia/Ho_Chi_Minh');

	$title = $_POST['title'];
	$head_cont = $_POST['head_cont'];
	$cont = $_POST['cont'];
	$kind = $_POST['kind'];

	$title_r = htmlspecialchars($title);
	$head_cont_r = htmlspecialchars($head_cont);
	$cont_r = addslashes($cont);

	if($_FILES['img']['name']){

		$file_path = "../img/post/".$result['img'];
		if (file_exists($file_path)) unlink($file_path);

		$img_name = $_FILES['img']['name'];
		$img_path = $_FILES['img']['tmp_name'];

		$img_name_r = addslashes($img_name);

		$new_img_url = "../img/post/".$img_name_r;
		$upload_img = move_uploaded_file($img_path,$new_img_url);

		$sql = "UPDATE post SET title = '$title_r', head_cont = '$head_cont_r', cont='$cont_r', kind_id='$kind', img='$img_name_r' WHERE id='$id'";
	}

	else $sql = "UPDATE post SET title = '$title_r', head_cont = '$head_cont_r', cont='$cont_r', kind_id='$kind' WHERE id='$id'";

	$conn = mysqli_connect(HOST,USER,PASS,DB);
	$lang = mysqli_query($conn,"SET NAMES 'utf8'");

	
	$query = mysqli_query($conn,$sql);

	$close = mysqli_close($conn);

	if($query) header('location: /admin/index.php?url=control-post');

}

?>