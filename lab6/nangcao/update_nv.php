<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <?php
        // Ket noi CSDL
        require("connect.php");
        $id=$_POST['MaNV'];
        $Ho=$_POST['Ho'];
        $Ten=$_POST['Ten'];
        $NgaySinh=$_POST['NgaySinh'];
        $GioiTinh=$_POST['GioiTinh'];
        $DiaChi=$_POST['DiaChi'];
        $Anh=$_POST['Anh'];
        $MaLoai=$_POST['MaLoai'];
        $MaPhong=$_POST['MaPhong'];
        //khai bao và thuc hiện câu lệnh sql
        $sql = "UPDATE nhanvien set Ho='$Ho',Ten='$Ten',NgaySinh='$NgaySinh',
        GioiTinh='$GioiTinh',DiaChi='$DiaChi',Anh='$Anh',MaLoai='$MaLoai',MaPhong='$MaPhong' where MaNV='$id'";
        mysqli_query($dbc,$sql);
        header('Location:thongtinnv.php');
    ?>
</body>

</html>