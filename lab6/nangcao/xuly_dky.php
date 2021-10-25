
<?php
 
 // Nếu không phải là sự kiện đăng ký thì không xử lý
 if (!isset($_POST['dangky'])){
    die('');
    // exit;
 }
  
 //Nhúng file kết nối với database
 include('connect.php');
       
 //Khai báo utf-8 để hiển thị được tiếng việt
 header('Content-Type: text/html; charset=UTF-8');
       
 //Lấy dữ liệu từ file dangky.php
 $username   = addslashes($_POST['username']);
 $password   = addslashes($_POST['password']);
 $email      = addslashes($_POST['email']);
       
 //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
 if (!$username || !$password || !$email)
 {
     echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
     exit;
 }
       
     // Mã khóa mật khẩu
    //$password = md5($password);
       
 //Kiểm tra tên đăng nhập có tồn tại không
$query = "SELECT username FROM users WHERE username='$username'";

$result = mysqli_query($dbc, $query) or die( mysqli_error($dbc));
if (mysqli_num_rows($result) > 0) {
    echo "Tên đăng nhập này đã có người dùng. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}
       
 //Kiểm tra email có đúng định dạng hay không
 if (!mb_eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email))
 {
     echo "Email này không hợp lệ. Vui long nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
     exit;
 }
 //Kiểm tra email đã có người dùng chưa
 $query1 = "SELECT email FROM users WHERE email='$email'";
 $result1 = mysqli_query($dbc, $query1) or die( mysqli_error($dbc));
 if (mysqli_num_rows($result1) > 0)
 {
     echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
     exit;
 }
       
 //Lưu thông tin thành viên vào bảng

@$addusers= "INSERT INTO users(username,pass,email) VALUE ('$username','$password','$email')";
$result2 = mysqli_query($dbc, $addusers);
                       
 //Thông báo quá trình lưu
 if ($result2)
     echo "Quá trình đăng ký thành công. <a href='login.php'>Về trang đăng nhập</a>";
 else
     echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='form_dky.php'>Thử lại</a>";
?>