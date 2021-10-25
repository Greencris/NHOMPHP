<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Xóa nhân viên </title>
</head>

<body>
	<?php
	require('connect.php');
	$id = $_GET['id'];
	$sql = "DELETE FROM nhanvien WHERE MaNV='$id'";
	mysqli_query($dbc, $sql);
	header('Location:thongtinnv.php');

	// ngắt kết nối
	mysqli_close($dbc);
	?>
</body>

</html>