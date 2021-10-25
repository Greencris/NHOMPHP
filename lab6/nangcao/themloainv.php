<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Thêm loại nv</title>
</head>

<body>
	<?php
	require('connect.php');
	?>
	<form action="" method="post" enctype="multipart/form-data">
		<table bgcolor="#eeeeee" align="center" width="60%" border="0">
			<tr bgcolor="#eeee10">
				<td colspan="2" align="center">
					<font color="blue">
						<h2>THÊM LOẠI NHÂN VIÊN</h2>
					</font>
				</td>
			</tr>
			<tr>
				<td>Mã loại nv: </td>
				<td><input type="text" name="MaLoai" size="20" value="<?php if (isset($_POST['MaLoai'])) echo $_POST['MaLoai']; ?>" /></td>
			</tr>
			<tr>
				<td>Tên loại: </td>
				<td><input type="text" name="TenLoai" size="30" value="<?php if (isset($_POST['TenLoai'])) echo $_POST['TenLoai']; ?>" /></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="them" size="10" value="Thêm mới" /></td>
			</tr>
	</form>

	<?php
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$errors = array(); //khởi tạo 1 mảng chứa lỗi
		//kiem tra ma phong
		if (empty($_POST['MaLoai'])) {
			$errors[] = "Bạn chưa nhập mã ";
		} else {
			$MaLoai = trim($_POST['MaLoai']);
		}
		//kiểm tra tên phong
		if (empty($_POST['TenLoai'])) {
			$errors[] = "Bạn chưa nhập phòng nv";
		} else {
			$TenLoai = trim($_POST['TenLoai']);
		}
		if (empty($errors)) //neu khong co loi xay ra
		{
			$query = "INSERT INTO loainv VALUES ('$MaLoai','$TenLoai')";
			$result = mysqli_query($dbc, $query);
			if (mysqli_affected_rows($dbc) == 1) { //neu them thanh cong
				echo "<div align='center'>Thêm mới thành công!</div>";
				$query = "Select loainv.* from loainv where MaLoai ='" . $MaLoai . "'";
				$result = mysqli_query($dbc, $query);
				if (mysqli_num_rows($result) == 1) {
					$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
					echo '<table align="center" border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse;">
							<tr bgcolor="#eeeeee"><td colspan="2" align="center"><h3>' . $row['MaLoai']. '</h3></td></tr>';
					echo '<td><i><b>Tên loại:</i></b><br />' . $row['TenLoai'] . '<br />';
					echo '</td></tr></table>';
				}
			} else //neu khong them duoc
			{
				echo "<p>Có lỗi, không thể thêm được</p>";
				echo "<p>" . mysqli_error($dbc) . "<br/><br />Query: " . $query . "</p>";
			}
		} else { //neu co loi
			echo "<h2>Lá»—i</h2><p>Có lỗi xảy ra:<br/>";
			foreach ($errors as $msg) {
				echo "- $msg<br /><\n>";
			}
			echo "</p><p>Hãy thử lại.</p>";
		}
	}

	mysqli_close($dbc);	
	?>
	<a href="thongtinloainv.php">Hiển thị thông tin loại nv</a>
	
</body>

</html>