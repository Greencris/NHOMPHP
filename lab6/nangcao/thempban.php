<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Thêm phòng ban</title>
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
						<h2>THÊM PHÒNG BAN</h2>
					</font>
				</td>
			</tr>
			<tr>
				<td>Mã phòng: </td>
				<td><input type="text" name="MaPhong" size="20" value="<?php if (isset($_POST['MaPhong'])) echo $_POST['MaPhong']; ?>" /></td>
			</tr>
			<tr>
				<td>Tên phòng: </td>
				<td><input type="text" name="TenPhong" size="30" value="<?php if (isset($_POST['TenPhong'])) echo $_POST['TenPhong']; ?>" /></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="them" size="10" value="Thêm mới" /></td>
			</tr>
	</form>

	<?php
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$errors = array(); //khởi tạo 1 mảng chứa lỗi
		//kiem tra ma phong
		if (empty($_POST['MaPhong'])) {
			$errors[] = "Bạn chưa nhập mã ";
		} else {
			$MaPhong = trim($_POST['MaPhong']);
		}
		//kiểm tra tên phong
		if (empty($_POST['TenPhong'])) {
			$errors[] = "Bạn chưa nhập phòng nv";
		} else {
			$TenPhong = trim($_POST['TenPhong']);
		}
		if (empty($errors)) //neu khong co loi xay ra
		{
			$query = "INSERT INTO phongban VALUES ('$MaPhong','$TenPhong')";
			$result = mysqli_query($dbc, $query);
			if (mysqli_affected_rows($dbc) == 1) { //neu them thanh cong
				echo "<div align='center'>Thêm mới thành công!</div>";
				$query = "Select phongban.* from phongban where MaPhong ='" . $MaPhong . "'";
				$result = mysqli_query($dbc, $query);
				if (mysqli_num_rows($result) == 1) {
					$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
					echo '<table align="center" border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse;">
							<tr bgcolor="#eeeeee"><td colspan="2" align="center"><h3>' . $row['MaPhong']. '</h3></td></tr>';
					echo '<td><i><b>Tên phòng:</i></b><br />' . $row['TenPhong'] . '<br />';
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
	<a href="thongtinpban.php">Hiển thị thông tin phòng ban</a>
	
</body>

</html>