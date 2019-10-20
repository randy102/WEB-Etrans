<?php

	$conn = mysqli_connect(HOST,USER,PASS,DB);
	$lang = mysqli_query($conn,"SET NAMES 'utf8'");

	if(!$_GET['p']) $p = 1;
	else $p = $_GET['p'];
		
	$max_unit = 10;
	$first = $p*$max_unit - $max_unit;

	$sql = "SELECT * FROM story ORDER BY id DESC LIMIT $first, $max_unit";
	$query = mysqli_query($conn,$sql);

?>

<!--title-->

<div class=row>
	<div class="col-md-12">
		<h1 class=page-header>
			Truyện ngắn
			<small>Story</small>
		</h1>
	</div>
</div>

<!--/title-->

<!--breadcrumb-->

<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href=""><i class="fa fa-cog fa-fw"></i> Admin</a></li>
			<li class="active"><i class="fa fa-fw fa-commenting"></i> Truyện ngắn</li>
		</ul>
	</div>
</div>

<!--/breadcrumb-->

<!--trans list-->

<div class="row">
	<div class="col-md-12">
		<table class="table table-hover table-striped trans-list">
			<thead>
				<tr>
					
					<th>Tiêu để truyện</th>
					<th>Tác giả</th>
					<th>Ngày đăng</th>
					<th>Tùy chọn</th>
				</tr>				
			</thead>
			<tbody>
				<?php while($result = mysqli_fetch_array($query)){ ?>

				<tr>
					
					<td><?php  echo $result['eng_title'] ?></td>
					<td><?php  echo $result['author'] ?></td>
					<td><?php  echo $result['date'] ?></td>
					<td>
						<a class="delete" href="/admin/delete.php?t=story&id=<?php echo $result['id']; ?>"><i class="fa fa-fw fa-trash"></i> Xóa</a> 
						<a href="/admin/index.php?url=story-edit&id=<?php echo $result['id']; ?>"><i class="fa fa-fw fa-pencil"></i> Sửa</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<!--/trans list-->

<!--options-->

<div class="row">
	<div class="col-md-12">
		<a href="/admin/index.php?url=story-add" class="btn btn-default btn-md"><i class="fa fa-fw fa-plus"></i> Đăng bài</a>
	</div>
</div>

<!--/options-->

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

<script type="text/javascript">
	$(document).ready(function(){
		$('.delete').click(function(){
			var choose = confirm("Bạn có muốn xóa?");
			return choose;
		})
	})
</script>