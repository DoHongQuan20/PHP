<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo "Đăng xuất thành công" ;
    session_start();
    session_destroy();
    ?>
    Đăng nhập <a href="login.php" tite="Login">Login.</a>
</body>
</html>