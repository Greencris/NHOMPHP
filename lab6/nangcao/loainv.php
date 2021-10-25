<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Thong tin loại nhân viên</title>
</head>
<body>
<?php 
// Ket noi CSDL
require("connect.php");
// Chuan bi cau truy van & Thuc thi cau truy van
$strSQL = "SELECT * FROM loainv";
$result = mysqli_query($dbc,$strSQL);
// $loainv =
// Xu ly du lieu tra ve
if(mysqli_num_rows($result) == 0)
{
	echo "Chưa có dữ liệu";
}
else
{	echo "<h1 style='color: blue;' align='center'>THÔNG TIN LOẠI NHÂN VIÊN</h1>
		  <table align='center' width='500' border='1' cellpadding='2' cellspacing='2' 
				style='border-collapse: collapse;'>
		  	<tr style='background-color: #0084ab;' align='center'>
				<td><b>Mã loại</b></td>
				<td><b>Tên loại</b></td>
				<td colspan ='3'><b>Action</b></td>
		  	</tr>";
	$stt=1;
	while ($row = mysqli_fetch_assoc($result))
	{
		if($stt%2!=0)
		{?>	
			<tr>
			<td><?php echo $row['MaLoai']?></td>
			<td><?php echo $row['TenLoai']?></td>
            <td><a href="update_loainv.php?id=<?php echo $row['MaLoai'];?>">Sửa</a></td>
			<td><a href="delete_loainv.php?id=<?php echo $row['MaLoai'];?>"
            onclick="return confirm('Bạn có muốn xóa?');">Xóa</a></td>
			<?php echo "<td><a href=\"themloainv.php\">Thêm</a></td>";
			echo "</tr>";
		}
		else
		{?>
			<tr style='background-color: #ffb1007a;'>
			<td><?php echo $row['MaLoai']?></td>
			<td><?php echo $row['TenLoai']?></td>
			<td><a href="update_loainv.php?id=<?php echo $row['MaLoai'];?>">Sửa</a></td>
			<td><a href="delete_loainv.php?id=<?php echo $row['MaLoai'];?>"
            onclick="return confirm('Bạn có muốn xóa?');">Xóa</a></td>
			<?php echo "<td><a href=\"themloainv.php\">Thêm</a></td>";
			echo "</tr>";
		}
			$stt+=1;
	}
	echo '</table>';
}
//Dong ket noi
mysqli_close($dbc);
echo "<a href=\"index.php\">Trở lại</a>";
?>
</body>
</html>