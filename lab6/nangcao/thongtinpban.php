<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Thong tin phòng ban</title>
</head>
<body>
<?php 
include ('header.html');
// Ket noi CSDL
require("connect.php");
// Chuan bi cau truy van & Thuc thi cau truy van
$strSQL = "SELECT * FROM phongban";
$result = mysqli_query($dbc,$strSQL);
// Xu ly du lieu tra ve
if(mysqli_num_rows($result) == 0)
{
	echo "Chưa có dữ liệu";
}
else
{	echo "<h1 style='color: blue;' align='center'>THÔNG TIN PHÒNG BAN</h1>
		  <table align='center' width='800' border='1' cellpadding='2' cellspacing='2' 
				style='border-collapse: collapse;'>
		  	<tr style='background-color: #0084ab;' align='center'>
				<td><b>Mã phòng</b></td>
				<td><b>Tên tên phòng</b></td>
				<td><b>Action</b></td>
		  	</tr>";
	$stt=1;
	while ($row = mysqli_fetch_array($result))
	{
		if($stt%2!=0)
		{	echo "<tr>";
			echo "<td>$row[0]</td>";
			echo "<td>$row[1]</td>";
			echo "<td><a href=\"edit_pban.php?id=".$row['MaPhong']."\">Sửa</a></td>";
			echo "</tr>";
		}
		else
		{
			echo "<tr style='background-color: #ffb1007a;'>";
			echo "<td>$row[0]</td>";
			echo "<td>$row[1]</td>";
			echo "<td><a href=\"edit_pban.php?id=".$row['MaPhong']."\">Sửa</a></td>";
			echo "</tr>";
		}
			$stt+=1;
	}
	echo '</table>';
	echo "<button class='btn btn_success'><a href=\"thempban.php\">Thêm</a></button>"."<br>";
}
//Dong ket noi
mysqli_close($dbc);
echo "<a href=\"index.php\">Trở lại</a>";
?>
</body>
</html>