
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
    $sql = "SELECT * FROM loainv where MaLoai='$id'";
    $result = mysqli_query($dbc, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <form name="form" method="post" action="update_loainv.php">
        <table width="800" border="0">
            <tr>
                <td colspan="2" align="center"><strong>Cập nhập</strong></td>
            </tr>
            <tr>
                <td>Mã loai: </td>
                <td><input type="text" name="MaLoai" size="20" readonly value="<?php echo $row['MaLoai']; ?>"  /></td>
            </tr>
            <tr>
                <td>Tên loại nhân viên: </td>
                <td><input type="text" name="TenLoai" size="30" value="<?php echo $row['TenLoai']; ?>" /></td>
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