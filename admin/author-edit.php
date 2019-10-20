<?php

	$id = $_GET['id'];

	$conn = mysqli_connect(HOST,USER,PASS,DB);
	$lang = mysqli_query($conn,"SET NAMES 'utf8'");

	$sql = "SELECT * FROM author WHERE id='$id'";
	$query = mysqli_query($conn,$sql);
	$result = mysqli_fetch_array($query);

?>

<!--title-->

<div class=row>
	<div class="col-md-12">
		<h1 class=page-header>
			Sửa thông tin tác giả
			<small>Edit Author</small>
		</h1>
	</div>
</div>

<!--/title-->

<!--breadcrumb-->

<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href=""><i class="fa fa-cog fa-fw"></i> Admin</a></li>
			<li><a href="/admin/index.php?url=control-author"><i class="fa fa-fw fa-users"></i> Tác giả</a></li>
			<li class="active"><i class="fa fa-pencil fa-fw"></i> Sửa thông tin tác giả</li>
		</ul>
	</div>
</div>

<!--/breadcrumb-->

<!--add form-->

<div class="row">
	<div class="col-md-10">
		<form method="post" enctype="multipart/form-data">
			
			<div class="form-group">
				<label>Tự giới thiệu</label>
				<textarea required maxlength="255" name="intro" class="form-control" placeholder="Tối đa 255 ký tự"><?php if(isset($_POST['intro'])) echo $_POST['intro']; else echo $result['intro']; ?></textarea> 
			</div>

			<div class="form-group">
				<label>Ảnh bìa</label><br>
				<img class="img-thumbnail" src="/img/member/<?php echo $result['img']; ?>">
			</div>

			<div class="form-group">
				<label>Thay đổi ảnh bìa</label>
				<input class="update-img" type="file" name="img">
			</div>

			<div class="form-group">
				<label>Link Facebook</label>
				<input type="text" name="link_face" class="form-control" value="<?php if(isset($_POST['link_face'])) echo $_POST['link_face']; else echo $result['link_face']; ?>">
			</div>

			<div class="form-group">
				<label>Link Google+</label>
				<input type="text" name="link_go" class="form-control" value="<?php if(isset($_POST['link_go'])) echo $_POST['link_go']; else echo $result['link_go']; ?>">
			</div>

			<div class="form-group">
				<label>Link Twitter</label>
				<input type="text" name="link_twitter" class="form-control" value="<?php if(isset($_POST['link_twitter'])) echo $_POST['link_twitter']; else echo $result['link_twitter']; ?>">
			</div>

			<button type="submit" name=submit class="btn btn-md btn-info"><i class="fa fa-refresh fa-fw"></i> Cập nhật</button>

		</form>
	</div>
</div>

<!--/add form-->

<?php

if(isset($_POST['submit'])){
	
	$intro = $_POST['intro'];
	$link_face = $_POST['link_face'];
	$link_go = $_POST['link_go'];
	$link_twitter = $_POST['link_twitter'];

	$intro_r = htmlspecialchars($intro);
	$link_face_r = htmlspecialchars($link_face);
	$link_go_r = htmlspecialchars($link_go);
	$link_twitter_r = htmlspecialchars($link_twitter);
	

	if($_FILES['img']['name']){

		$file_path = "../img/member/".$result['img'];
		if (file_exists($file_path) && $result['img'] != 'auto.png') unlink($file_path);

		$img_name = $_FILES['img']['name'];
		$img_path = $_FILES['img']['tmp_name'];

		$img_name_r = addslashes($img_name);

		$new_img_url = "../img/member/".$img_name_r;
		$upload_img = move_uploaded_file($img_path,$new_img_url);

		$sql = "UPDATE author SET intro = '$intro_r', link_face = '$link_face_r', link_go='$link_go_r', link_twitter='$link_twitter_r', img='$img_name_r' WHERE id='$id'";
	}

	else $sql = "UPDATE author SET intro = '$intro_r', link_face = '$link_face_r', link_go='$link_go_r', link_twitter='$link_twitter_r' WHERE id='$id'";

	$conn = mysqli_connect(HOST,USER,PASS,DB);
	$lang = mysqli_query($conn,"SET NAMES 'utf8'");

	
	$query = mysqli_query($conn,$sql);

	$close = mysqli_close($conn);

	if($query) header('location: /admin/index.php?url=control-author');

}

?>