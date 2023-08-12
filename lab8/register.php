<?php
include "connect.php";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //lấy thông tin từ form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm'];

    if (!empty($username) && !empty($email) && !empty($password) && !empty($confirmPassword)) {
        if ($password === $confirmPassword) {

            //kiểm tra người đã tồn tại chưa
            $check_query = "SELECT * FROM user  WHERE username ='$username' ";
            $result = $conn->query($check_query);
            if ($result->num_rows > 0) {
                $message = "tài khoản đã đăng kí";
            } else {
                //THÊM TÀI khoản vào csdl
                $insert_query = "INSERT INTO user (username, email, password) VALUES ('$username','$email','$password')";
                if ($conn->query($insert_query) === TRUE) {
                    $message = "Thành công";
                } else {
                    $message = "thất bại";
                }
            }
        } else {
            $message = "<p>Mật khẩu xác nhận không khớp.</p>";
        }

    } else {

        $message = "<p>Vui lòng điền đầy đủ thông tin đăng ký.</p>";
    }
}
//đóng kết nối
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <style>
        /* Thêm CSS của bạn tại đây */
    </style>
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
        text-align: center;
        margin-bottom: 20px;
    }

    h3 {
        color: #333333;
        margin-bottom: 10px;
        text-align: center;
    }

    label {
        margin-top: 5px;
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
        cursor: pointer;
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
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <div class="row">
                <h3>REGISTER</h3>
            </div>
            <div class="row">
                <label for="username">User name</label>
                <input type="text" name="username" id="username" placeholder="Enter username">
            </div>
            <div class="row">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="Enter Email">
            </div>
            <div class="row">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter password">
            </div>
            <div class="row">
                <label for="confirm">Confirm password</label>
                <input type="password" name="confirm" id="confirm" placeholder="Enter the password"><br>
            </div>
            <div class="row">
                <div id="message_line" class="message"><?php echo $message; ?></div>
            </div>
            <div class="btn">
                <input type="submit" name="register" value="Register"><br><br>
            </div>

            Click here to <a href="login.php">Login</a>
        </form>
    </div>
</body>

</html>
</body>

</html>