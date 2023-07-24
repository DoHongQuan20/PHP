<?php
$thongbao = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $confirmPassword = $_POST['confirm'];

    if(!empty($username) && !empty($email) && !empty($password) && !empty($confirmPassword)){
        if ($password === $confirmPassword) {
            
            $thongbao ="<p>Đăng ký thành công!</p>";
        } else {
            
            $thongbao = "<p>Mật khẩu xác nhận không khớp.</p>";
        }
    } else {
        
        $thongbao = "<p>Vui lòng điền đầy đủ thông tin đăng ký.</p>";
    }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signin.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
            <h3>Register form</h3>
            <label for="user" >Username</label>
            <input type="text" name="user" id="user" placeholder="Enter username">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Enter email">
            <label for="pass">Password</label>
            <input type="password" name="pass" id="pass">
            <label for="confirm">Confirm password</label>
            <input type="password" name="confirm" id="confirm">
            <input type="submit" value="Register" name="register" id="register">
            <span><?php echo $thongbao?></span>
        </form>
    </div>
</body>
</html>