<?php
include "connect.php";
session_start();
$message = "";
//kiểm tra nút đăng nhập đã đc nhấn hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    //xây dụng câu truy vấn csdl
    $query = "SELECT * FROM user WHERE username='$username'";

    //thực thi truy vấn
    $result = mysqli_query($conn, $query);

    //kểm tra kq trả về
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        //kiểm tra mk hợp lệ
        if ($row['password'] === $password) {
            //đăng nhập thành công
            $_SESSION['user'] = "$username";
            header("location:product.php");
        } else {
            //sai mk
            $message = "sai mật khẩu. Vui long thử lại";
        }
    }else{
        $message = "người dùng không tồn tại";
    }
    //đóng kết nối
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    width: 300px;
}

.form-content {
    width: 300px;
}

h3 {
    color: #333333;
    text-align: center;
}

label {
    display: block;
    margin-top: 10px;
    color: #333333;
    font-weight: bold;
}

input[type="text"],
input[type="password"] {
    width: 280px;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #cccccc;
    border-radius: 3px;
    margin-right: 100px;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 3px;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

span {
    color: red;
}

a {
    color: #007bff;
    margin-left: 10px;
}

a:hover {
    color: #0800ff;
}
</style>

<body>
    <div class="container">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

            <h3>Login</h3>
            <label for="">Username</label><br>
            <input type="text" name="username" id="username" placeholder="Enter username"><br>
            <label for="">Password</label><br>
            <input type="text" name="password" id="password" placeholder="Enter password"><br>
            <input type="submit" value="login" name="btn-regis" id="btn-regis"><br>
            <div id="message_line1" class="message"><?php echo $message; ?><br>
            </div>
            Click here to <a href="register.php">register</a>
        </form>
    </div>
</body>

</html>