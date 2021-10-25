<html>

<head>
    <meta charset="utf-8">
    <title>Form cập nhật thông tin nhân viên</title>
</head>

<body>
    <?php
    // Ket noi CSDL
    require("connect.php");
    $id = $_GET['id'];
    // Chuan bi cau truy van & Thuc thi cau truy van
    $sql = "SELECT * FROM nhanvien where MaNV='$id'";
    $result = mysqli_query($dbc, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <form name="form" method="post" action="update_nv.php">
        <table width="800" border="0">
            <tr>
                <td colspan="2" align="center"><strong>Cập nhập</strong></td>
            </tr>
            <tr>
                <td>Mã NV: </td>
                <td><input type="text" name="MaNV" size="20" readonly value="<?php echo $row['MaNV']; ?>"  /></td>
            </tr>
            <tr>
                <td>Họ nhân viên: </td>
                <td><input type="text" name="Ho" size="30" value="<?php echo $row['Ho']; ?>" /></td>
            </tr>
            <tr>
                <td>Tên nhân viên: </td>
                <td><input type="text" name="Ten" size="30" value="<?php echo $row['Ten']; ?>" /></td>
            </tr>
            <tr>
                <td>Ngày sinh: </td>
                <td><input type="date" name="NgaySinh" size="30" value="<?php echo $row['NgaySinh']; ?>" /></td>
            </tr>
            <tr>
                <td>Giới tính: </td>
                <td><input type="bool" name="GioiTinh" size="30" value="<?php echo $row['GioiTinh']; ?>" /></td>
            </tr>
            <tr>
                <td>Địa chỉ: </td>
                <td><input type="text" name="DiaChi" size="30" value="<?php echo $row['DiaChi']; ?>" /></td>
            </tr>
            <tr>
                <td>Ảnh: </td>
                <td><input type="text" name="Anh" size="30" value="<?php echo $row['Anh']; ?>" /></td>
            </tr>
            <tr>
                <td>Mã loại:</td>
                <td><input type="text" name="MaLoai" size="30" value="<?php echo $row['MaLoai']; ?>" /></td>
                </td>
            </tr>
            <tr>
                <td>Mã phòng:</td>
                <td><input type="text" name="MaPhong" size="30" value="<?php echo $row['MaPhong']; ?>" /></td>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="button" id="button" value="Cập nhật">
                    <input type="reset" name="button1" value="Nhập lại">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>