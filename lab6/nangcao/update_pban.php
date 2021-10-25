<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
<?php
        // Ket noi CSDL
        require("connect.php");
        $id=$_POST['MaPhong'];
        $TenPhong=$_POST['TenPhong'];
        //khai bao và thuc hiện câu lệnh sql
        $sql = "UPDATE phongban set TenPhong='$TenPhong' where MaPhong='$id'";
        mysqli_query($dbc,$sql);
        header('Location:thongtinpban.php');
    ?>
</body>

</html>