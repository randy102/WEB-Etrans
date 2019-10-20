<!--title-->

<div class=row>
	<div class="col-md-12">
		<h1 class=page-header>
			Thêm thành viên
			<small>Add member</small>
		</h1>
	</div>
</div>

<!--/title-->

<!--breadcrumb-->

<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href=""><i class="fa fa-cog fa-fw"></i> Admin</a></li>
			<li><a href="/admin/index.php?url=control-member"><i class="fa fa-fw fa-user"></i> Thành viên</a></li>
			<li class="active"><i class="fa fa-plus fa-fw"></i> Thêm mới</li>
		</ul>
	</div>
</div>

<!--/breadcrumb-->

<!--add form-->

<div class="row">
	<div class="col-md-5">
		<form method="post">

			<div class="form-group">
				<label>Tên đăng nhập</label>
				<input type="text" name="user" class="form-control">
			</div>

			<div class="form-group">
				<label>Mật khẩu</label>
				<input type="text" name="pass" class="form-control">
			</div>

			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" class="form-control">
			</div>

			<div class="form-group">
				<label>Level</label>
				<select name="level" class="form-control">
					<option selected="selected" value="2">Tác giả</option>
					<option value="3">Thành viên thường</option>
					<option value="1">Admin</option>
				</select>
			</div>

			<button type="submit" name=submit class="btn btn-md btn-success"><i class="fa fa-plus fa-fw"></i>Thêm mới</button>

		</form>
	</div>
</div>

<!--/add form-->

<?php

if(isset($_POST['submit'])){
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$email = $_POST['email'];
	$level = $_POST['level'];

	$conn = mysqli_connect(HOST,USER,PASS,DB);
	$lang = mysqli_query($conn,"SET NAMES 'utf8'");

	$sql = "INSERT INTO member(user,pass,email,level) VALUES ('$user','$pass','$email','$level')";

	$query = mysqli_query($conn,$sql);

	if($level <= 2 && $query){
		$lastid = mysqli_insert_id($conn);
		$sql_author = "INSERT INTO author(id,intro,img) VALUES ('$lastid','Tự giới thiệu...','auto.png')";
		$query_author = mysqli_query($conn,$sql_author);
	} 
	$close = mysqli_close($conn);

	if($query) header("location: /admin/index.php?url=control-member");


	
}

?>