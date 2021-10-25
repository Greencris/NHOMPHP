<?php
    if(isset($_FILES['image'])!=NULL){
        $error = array();
        $file_name=$_FILES['image']['name'];
        $file_size=$_FILES['image']['size'];
        $file_tmp=$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext = @strtolower(end(explode('.',$_FILES['image']['name'])));

        $expension = array("jpg","jpeg","png");
        if(in_array($file_ext,$expension)==false){
            $error[]="không timg thấy file, vui lòng chọn đúng file jpg hoặc png";
        }
        if($file_size>2097152){
            $error[]="File upload phải dưới 2mb";
        }
        if(empty($error)==true){
            move_uploaded_file($file_tmp,"..\hinh_nv".$file_name);
            echo "Upload thành công";
        }
        else{
            print_r($error);
        }
    }
?>
<?php
echo "<div id='img_div'>";
echo "<img src='hinh_nv/'>";
echo "</div>";
?>
<form method="POST" action="" enctype="multipart/form-data">
<input type="FILE" name ="image"><br>
<input type="submit" value="Submit">
<ul>
    <li>File name: <?php echo $_FILES['image']['name'];?></li>
    <li>File size:<?php echo $_FILES['image']['size'];?></li>
    <li>File type: <?php echo $_FILES['image']['type']?></li>
</ul>

</form>