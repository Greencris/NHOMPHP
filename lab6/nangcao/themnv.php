<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Thêm nhân viên</title>
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
						<h2>THÊM NHÂN VIÊN MỚI</h2>
					</font>
				</td>
			</tr>
			<tr>
				<td>Mã NV: </td>
				<td><input type="text" name="MaNV" size="20" value="<?php if (isset($_POST['MaNV'])) echo $_POST['MaNV']; ?>" /></td>
			</tr>
			<tr>
				<td>Họ nhân viên: </td>
				<td><input type="text" name="Ho" size="30" value="<?php if (isset($_POST['Ho'])) echo $_POST['Ho']; ?>" /></td>
			</tr>
			<tr>
				<td>Tên nhân viên: </td>
				<td><input type="text" name="Ten" size="30" value="<?php if (isset($_POST['Ten'])) echo $_POST['Ten']; ?>" /></td>
			</tr>
			<tr>
				<td>Ngày sinh: </td>
				<td><input type="date" name="NgaySinh" size="30" value="<?php if (isset($_POST['NgaySinh'])) echo $_POST['NgaySinh']; ?>" /></td>
			</tr>
			<tr>
				<td>Giới tính: </td>
				<td><input type="bool" name="GioiTinh" size="30" value="<?php if (isset($_POST['GioiTinh'])) echo $_POST['GioiTinh']; ?>" /></td>
			</tr>
			<tr>
				<td>Địa chỉ: </td>
				<td><input type="text" name="DiaChi" size="30" value="<?php if (isset($_POST['DiaChi'])) echo $_POST['DiaChi']; ?>" /></td>
			</tr>
			<tr>
				<td>Ảnh: </td>
				<td><input type="FILE" name="Anh" size="30" value="<?php if (isset($_POST['Anh'])) echo $_POST['Anh']; ?>" /></td>
			</tr>
			<tr>
				<td>Mã loại:</td>
				<td><select name="loainv">
						<?php
						$query = "select * from loainv";	//Hiển thị tên các hãng sữa
						$result = mysqli_query($dbc, $query);
						if (mysqli_num_rows($result) <> 0) {
							while ($row = mysqli_fetch_array($result)) {
								$MaLoai = $row['MaLoai'];
								$TenLoai = $row['TenLoai'];
								echo "<option value='$MaLoai' ";
								if (isset($_REQUEST['loainv']) && ($_REQUEST['loainv'] == $MaLoai)) echo "selected='selected'";
								echo ">$TenLoai</option>";
							}
						}
						mysqli_free_result($result);
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Mã phòng: </td>
				<td><select name="phongban">
						<?php
						$query = "select * from phongban";	//Hiển thị tên các loại sữa
						$result = mysqli_query($dbc, $query);
						if (mysqli_num_rows($result) <> 0) {
							while ($row = mysqli_fetch_array($result)) {
								$MaPhong = $row['MaPhong'];
								$TenPhong = $row['TenPhong'];
								echo "<option value='" . $MaPhong . "' ";
								if (isset($_REQUEST['phongban']) && ($_REQUEST['phongban'] == $MaPhong)) echo "selected='selected'";
								echo ">" . $TenPhong . "</option>";
							}
						}
						mysqli_free_result($result);
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="them" size="10" value="Thêm mới" /></td>
			</tr>
	</form>

	<?php
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$errors = array(); //khởi tạo 1 mảng chứa lỗi
		//kiem tra ma nhan vien
		if (empty($_POST['MaNV'])) {
			$errors[] = "Bạn chưa nhập mã nv";
		} else {
			$MaNV = trim($_POST['MaNV']);
		}
		//kiểm tra ho nhân viên
		if (empty($_POST['Ho'])) {
			$errors[] = "Bạn chưa nhập họ nv";
		} else {
			$Ho = trim($_POST['Ho']);
		}
		//ktra ten nv
		if (empty($_POST['Ten'])) {
			$errors[] = "Bạn chưa nhập tên nv";
		} else {
			$Ten = trim($_POST['Ten']);
		}
		//ktra ngay sinh nv
		if (empty($_POST['NgaySinh'])) {
			$errors[] = "Bạn chưa nhập ngày sinh";
		} else {
			$NgaySinh = trim($_POST['NgaySinh']);
		}
		//ktra gtinh nv
		if (empty($_POST['GioiTinh'])) {
			$errors[] = "Bạn chưa nhập giới tính";
		} else {
			$GioiTinh = trim($_POST['GioiTinh']);
		}
		//ktra Dia chỉ nv
		if (empty($_POST['DiaChi'])) {
			$errors[] = "Bạn chưa nhập địa chỉ";
		} else {
			$DiaChi = trim($_POST['DiaChi']);
		}
		//kiểm tra hình và thực hiện upload file
		if ($_FILES['Anh']['name'] != "") {
			$Anh = $_FILES['Anh'];
			$ten_hinh = $Anh['name'];
			$type = $Anh['type'];
			$size = $Anh['size'];
			$tmp = $Anh['tmp_name'];
			if (($type == 'image/jpeg' || ($type == 'image/bmp') || ($type == 'image/gif') && $size < 8000)) {
				move_uploaded_file($tmp, "hinh_nv/" . $ten_hinh);
			}
		}
		//cap nhat ma phong va ma loai nv
		$MaLoai = $_POST['loainv'];
		$MaPhong = $_POST['phongban'];

		if (empty($errors)) //neu khong co loi xay ra
		{
			$query = "INSERT INTO nhanvien VALUES ('$MaNV','$Ho','$Ten',
				'$NgaySinh','$GioiTinh','$DiaChi','$ten_hinh','$MaLoai','$MaPhong')";
			$result = mysqli_query($dbc, $query);
			if (mysqli_affected_rows($dbc) == 1) { //neu them thanh cong
				echo "<div align='center'>Thêm mới thành công!</div>";
				$query = "Select nhanvien.*, MaNV from nhanvien,loainv,phongban WHERE nhanvien.MaLoai=loainv.MaLoai AND nhanvien.MaPhong= phongban.MaPhong
						AND MaNV ='" . $MaNV . "'";
				$result = mysqli_query($dbc, $query);
				if (mysqli_num_rows($result) == 1) {
					$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
					echo '<table align="center" border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse;">
							<tr bgcolor="#eeeeee"><td colspan="2" align="center"><h3>' . $row['MaNV'] . ' - ' . $row['MaLoai'] . '</h3></td></tr>';
					echo '<tr><td width="50" align="center"><img src="hinh_nv/' . $row['Anh'] . '"/></td>';
					echo '<td><i><b>Họ nhân viên:</i></b><br />' . $row['Ho'] . '<br />';
					echo '<td><i><b>Tên nhân viên:</i></b><br />' . $row['Ten'] . '<br />';
					echo '<td><i><b>Ngày sinh:</i></b><br />' . $row['NgaySinh'] . '<br />';
					echo '<td><i><b>Giới tính:</i></b><br />' . $row['GioiTinh'] . '<br />';
					echo '<td><i><b>Địa chỉ:</i></b><br />' . $row['DiaChi'] . '<br />';
					echo '<i><b>Mã loại nhân viên:</b></i>' . $row['MaLoai'] . '<br />';
					echo '<i><b>Mã loại phòng:</b></i>' . $row['MaPhong'] . '<br />';
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
	<a href="thongtinnv.php">Hiển thị thông tin nhân viên</a>
	
</body>

</html>