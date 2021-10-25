<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Tìm kiếm nhân viên</title>
</head>

<body>
    <?php
    include ('header.html');
    ?>
    <form action="" method="get">
        <table bgcolor="#eeeeee" align="center" width="70%" border="1" cellpadding="5" cellspacing="5" style="border-collapse: collapse;">
            <tr>
                <td align="center">
                    <font color="blue">
                        <h3>TÌM KIẾM THÔNG TIN NHÂN VIÊN</h3>
                    </font>
                </td>
            </tr>
            <tr>
                <td align="center">Tên nv: <input type="text" name="Ten" size="30" value="<?php if (isset($_GET['Ten'])) echo $_GET['Ten']; ?>">
            </tr>
            <tr>
                <td align="center">Tên phòng: <input type="text" name="TenPhong" size="30" value="<?php if (isset($_GET['TenPhong'])) echo $_GET['TenPhong']; ?>">
                    <input type="submit" name="tim" value="Tìm Kiếm">
                </td>
            </tr>
        </table>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (empty($_GET['Ten']) && empty($_GET['TenPhong'])) echo "<p align='center'>Vui lòng nhập </p>";
        else {
            require('connect.php');
            if ($_GET['Ten']) {
                $Ten = $_GET['Ten'];
                $query = "Select nhanvien.*
		      from nhanvien
		      WHERE Ten like '%$Ten%'";
                $result = mysqli_query($dbc, $query);
                if (mysqli_num_rows($result) <> 0) {
                    $rows = mysqli_num_rows($result);
                    echo "<div align='center'><b>Có $rows nhân viên được tìm thấy.</b></div>";
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo '<table border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse;">
					<tr bgcolor="#eeeeee"><td colspan="2" align="center"><h3>' .
                            $row['Ho'] . " " . $row['Ten'] . '</h3></td></tr>';
                        echo '<tr><td width="100" align="center"><img src="hinh_nv/' . $row['Anh'] . '"/></td>';
                        echo '<td><i><b>Địa chỉ:</i></b><br />' . $row['DiaChi'] . '<br />';
                        echo '<i><b>Ngày sinh:</b></i>' . $row['NgaySinh'] . '<br />';
                        echo '<i><b>Mã phòng: </b></i>' . $row['MaPhong'] . '<br />';
                        echo '<i><b>Mã loại: </b></i>' . $row['MaLoai'] . '<br />';

                        echo '</td></tr></table>';
                    }
                } else echo "<div><b>Không tìm thấy nhân viên này.</b></div>";
            }
            if ($_GET['TenPhong']) {
                $TenPhong = $_GET['TenPhong'];
                $query = "Select phongban.*,Ho,Ten
                      from phongban,nhanvien
                      WHERE phongban.MaPhong=nhanvien.MaPhong
                      AND TenPhong like '%$TenPhong%'";
                $result = mysqli_query($dbc, $query);
                if (mysqli_num_rows($result) <> 0) {
                    $rows = mysqli_num_rows($result);
                    echo "<div align='center'><b>Có $rows phòng được tìm thấy.</b></div>";
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo '<table border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse;">
                            <tr bgcolor="#eeeeee"><td align="center"><h3>' .
                            $row['MaPhong'] . '<br />' . $row['TenPhong'] . '</h3></td></tr>';
                        echo '<td><i><b>nhân viên làm tại phòng: </i></b><br />' . $row['Ho'] . " " . $row['Ten'] . '<br />';
                        echo '</td></tr></table>';
                    }
                } else echo "<div><b>Không tìm thấy phòng này.</b></div>";
            }
        }
    }
    // }
    ?>
</body>

</html>