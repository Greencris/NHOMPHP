<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Thong tin nhân viên</title>
<style type="text/css">
      
        img{
        	width: 50px;
        	height: 50px;
        	border-radius:50%;
			-moz-border-radius:50%;
			-webkit-border-radius:50%;
        }
       
    </style>
</head>
<body>
<?php 
include ('header.html');
// Ket noi CSDL
require("connect.php");
// Chuan bi cau truy van & Thuc thi cau truy van
$strSQL = "SELECT * FROM nhanvien";
$result = mysqli_query($dbc,$strSQL);
// Xu ly du lieu tra ve
if(mysqli_num_rows($result) == 0)
{
	echo "Chưa có dữ liệu";
}
else
{	echo "<h1 style='color: blue;' align='center'>THÔNG TIN NHÂN VIÊN</h1>
		  <table align='center' width='800' border='1' cellpadding='2' cellspacing='2' 
				style='border-collapse: collapse;'>
		  	<tr style='background-color: #0084ab;' align='center'>
				<td><b>Mã NV</b></td>
                <td><b>Họ NV</b></td>
				<td><b>Tên NV</b></td>
                <td><b>Ngày sinh</b></td>
                <td><b>Giới tính</b></td>
				<td><b>Địa chỉ</b></td>
				<td><b>Ảnh</b></td>
				<td><b>Mã loại</b></td>
				<td><b>Mã phòng</b></td>
                <td colspan ='3'><b>Action</b></td>
		  	</tr>";
	$stt=1;
	while ($row = mysqli_fetch_array($result))
	{
		if($stt%2!=0)
		{	echo "<tr>";
			echo "<td>$row[0]</td>";
			echo "<td>$row[1]</td>";
			echo "<td>$row[2]</td>";
			echo "<td>$row[3]</td>";
			echo "<td>$row[4]</td>";
            echo "<td>$row[5]</td>";
			echo "<td><img style='width:20px;'  src='hinh_nv/$row[6]'></td>";
            echo "<td>$row[7]</td>";
            echo "<td>$row[8]</td>";?>
            <td><a href="edit_nv.php?id=<?php echo $row['MaNV'];?>">Sửa</a></td>
			<td><a href="delete_nv.php?id=<?php echo $row['MaNV'];?>"
            onclick="return confirm('Bạn có muốn xóa?');">Xóa</a></td>
			<?php 
			// echo "<td><a href=\"themnv.php\">Thêm</a></td>";
			echo "</tr>";
		}
		else
		{
			echo "<tr style='background-color: #ffb1007a;'>";
			echo "<td>$row[0]</td>";
			echo "<td>$row[1]</td>";
			echo "<td>$row[2]</td>";
			echo "<td>$row[3]</td>";
			echo "<td>$row[4]</td>";
            echo "<td>$row[5]</td>";
			echo "<td><img style='width:20px;'  src='hinh_nv/$row[6]'></td>";
            echo "<td>$row[7]</td>";
            echo "<td>$row[8]</td>";?>
            <td><a href="edit_nv.php?id=<?php echo $row['MaNV'];?>">Sửa</a></td>
           <td><a href="delete_nv.php?id=<?php echo $row['MaNV'];?>"
           onclick="return confirm('Bạn có muốn xóa?');">Xóa</a></td>
           <?php 
           echo "</tr>";
           echo "</tr>";
		}
			$stt+=1;
	}
	echo '</table>';
	echo "<button align='center' class=\"btn btn-succes\"> <a href=\"themnv.php\">Thêm</a></button>"."<br>";

}
//Dong ket noi
mysqli_close($dbc);
echo "<a href=\"index.php\">Trở lại</a>";
?>
</body>
</html>
