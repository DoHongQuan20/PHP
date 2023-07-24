<?php
$thong_bao = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$user = $_POST["username"] ;
$pass = $_POST["password"];
if(empty($user) || strlen($user) <6){
    $thong_bao =  "User name không được để trống và nhỏ hơn 6 kí tự" ;
}else if(empty($pass)){
    $thong_bao= "password không được để trống" ;
}else{
    $thong_bao = " Chào mừng ".$user;
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<style>

</style>

<body>
    <div class="container">
        <div class="form-content">
            <h3>Login Form </h3>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                <label for="user">UserName </label>
                <input type="text" name="username" id="username" placeholder="Enter user"><br>
                <label for="password">Password </label>
                <input type="password" name="password" id="password"><br>
                <input type="submit" value="Login" name="login" id="login" ><br>
                <span><?php echo $thong_bao?></span><br>
            </form>
            Click here to <a href="signin.php">register</a>
        </div>
    </div>
</body>

</html>