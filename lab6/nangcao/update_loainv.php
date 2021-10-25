<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <?php
        // Ket noi CSDL
        require("connect.php");
        $id=$_POST['MaLoai'];
        $TenLoai=$_POST['TenLoai'];
        //khai bao và thuc hiện câu lệnh sql
        $sql = "UPDATE loainv set TenLoai='$TenLoai' where MaLoai='$id'";
        mysqli_query($dbc,$sql);
        header('Location:thongtinloainv.php');
    ?>
</body>

</html>