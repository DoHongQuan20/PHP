<?php
//khởi tạo biên session
session_start();
//kiểm tra xem sessionuser có tồn tại không
if(isset($_SESSION["user"])){
 ?>   
welcome <?php echo $_SESSION["user"];?>
Nháy chuột vào đây để thoát <a href="logout.php" tite="Logout">Logout.</a>
<?php 
}else echo "<a href='login.php' tite='login'> Vui lòng đăng nhập</a>"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/product.css">
</head>
<body>
    <div class="container">
        <div class="col">
            <div class="im-product">
                <img src="img/product.PNG">
            </div>
            <div class="name-product">
                <h1>Product</h1>
            </div>
            <div class="price">
                <p>100.3</p>
            </div>
            <div class="category">
            <p>Category: Hard disk</p>
            </div>
            <div class="btn-view">
                <input type="button" value="View detail">
            </div>
        </div>
        <div class="col">
        <div class="im-product">
                <img src="img/product.PNG">
            </div>
            <div class="name-product">
                <h1>Product</h1>
            </div>
            <div class="price">
                <p>100.3</p>
            </div>
            <div class="category"></div>
            <div class="btn-view">
                <input type="button" value="View detail">
            </div>
        </div>
        <div class="col">
        <div class="im-product">
                <img src="img/product.PNG">
            </div>
            <div class="name-product">
                <h1>Product</h1>
            </div>
            <div class="price">
                <p>100.3</p>
            </div>
            <div class="category"></div>
            <div class="btn-view">
                <input type="button" value="View detail">
            </div>
        </div>
    </div>
</body>
</html>