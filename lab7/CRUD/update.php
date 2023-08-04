<?php
include "conect.php";
$thongbao ="";
//kiểm tra xem form đã được submit hay chưa trong trường hợp lưu
if (isset($_POST['submit'])) {
    //lấy giá trị từ form
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    //thực thi truy vấn đề cập nhật sp trong CSDL
    $query = "UPDATE sanpham SET name = '$name', description =' $description ', price ='$price' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    //kiểm tra kq truy vấn
    if ($result) {
        $thongbao = "cập nhật sản phẩm thành công";
    } else {
        $thongbao = "có lỗi xảy ra" . mysqli_error($conn);
    }
    //đóng kết nối
    mysqli_close($conn);
} elseif (isset($_GET['id'])) { //trong trường hợp lấy id khi click vào link ở trang sách
    //lấy giá trị ID từ parameter
    $id = $_GET['id'];
    //truy vấn sản phẩm dựa trên id
    $query = "SELECT * FROM sanpham WHERE id= '$id'";
    $result = mysqli_query($conn, $query);
    //ktra kết quả truy vấn 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $description = $row['description'];
        $price = $row['price'];
    } else {
        echo "có lỗi xảy ra" . mysqli_error($conn);
    }
    //đóng kết nối
    mysqli_close($conn);
} else{
    echo "Không tìm thấy sản phẩm để cập nhật";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật sản phẩm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
    }

    .container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 5px;
    }

    h2 {
        text-align: center;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="text"] {
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
    }

    input[type="number"] {
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: large;
    }


    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .cancel {
        height: 40px;
        width: 360px;
        background-color: red;
        text-align: center;
        border-radius: 5px;
        margin-bottom: 30px;
    }

    a {
        color: white;
        text-decoration: none;
        margin-bottom: 30px;
        font-size: medium;

    }

    a:hover {
        background-color: red;
    }
</style>

<body>
    <div class="container my-5">
        <h2>Cập nhật sản phẩm</h2><br>
        <a class="btn btn-primary" href="read.php" role="button">Danh Sách sản phẩm</a><br>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="name"> Tên Sản phẩm</label>
            <input type="text" name="name" value="<?php echo $name; ?>" required><br>
            <label for="description">Mô tả</label>
            <input type="text" name="description" value="<?php echo $description; ?>" required><br>
            <label for="price">Giá</label>
            <input type="number" name="price" value="<?php echo $price; ?>" required><br>
            <input type="submit" name="submit" value="Cập nhật sản phẩm"><br>
            <label for="thongbao"><?php echo $thongbao; ?></label>
        </form>
    </div>
</body>

</html>