
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Trang đăng ký</title>
        <link rel="stylesheet" href="style_login.css"/> 
    </head>
    <body>
        <h1>Trang đăng ký thành viên</h1>
        <form action="xuly_dky.php" method="POST">
            <table cellpadding="1" cellspacing="1" border="0">
                <tr>
                    <td>
                        Tên đăng nhập : 
                    </td>
                    <td>
                        <input type="text" name="username" size="50" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Mật khẩu :
                    </td>
                    <td>
                        <input type="password" name="password" size="50" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Email :
                    </td>
                    <td>
                        <input type="text" name="email" size="50" />
                    </td>
                </tr>
            </table>
            <input type="submit" name="dangky" value="Đăng ký" />
            <input type="reset" value="Nhập lại" />
        </form>
    </body>
</html>