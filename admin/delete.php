<?php
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED); ob_start(); session_start();
	require"../module/connectdb.php";

	$table = $_GET['t'];
	$id = $_GET['id'];

	$conn = mysqli_connect(HOST,USER,PASS,DB);
	$lang = mysqli_query($conn,"SET NAMES 'utf8'");

	$sql_1 = "SELECT * FROM $table WHERE id=$id";
	$query_1 = mysqli_query($conn,$sql_1);
	$result_1 = mysqli_fetch_array($query_1);

	$file_path = "../img/".$table."/".$result_1['img'];
	if (file_exists($file_path)) unlink($file_path);


	$sql = "DELETE FROM $table WHERE id = '$id'";
	$query = mysqli_query($conn,$sql);

	$close = mysqli_close($conn);

	if($query){
?>
<script type=text/javascript>
	 history.back(-1);
</script>

<?php } ?>