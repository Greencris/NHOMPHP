<!DOCTYPE html> 
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<link rel="stylesheet" href="style_login.css"/> 
</head> 
<body> 
<form action='login.php' class="dangnhap" method='POST'> 
Tên đăng nhập : <input type='text' name='username' /> 
Mật khẩu : <input type='password' name='password' /> 
<input type='submit' class="button" name="dangnhap" value='Đăng nhập' />
<?php require 'xuly_login.php';?> 
<form> 
</body> 
</html>