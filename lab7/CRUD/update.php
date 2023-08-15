<?php
include "connect.php";
$thongbao = "";

if (isset($_POST['submit'])) {
    //lấy giá trị từ form
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    //thực thi truy vấn đề cập nhật sp trong CSDL
    $query = "UPDATE sanpham SET name = '$name', description =' $description ', price ='$price' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $thongbao = "cập nhật sản phẩm thành công";
    } else {
        $thongbao = "có lỗi xảy ra" . mysqli_error($conn);
    }
  
    mysqli_close($conn);
} elseif (isset($_GET['id'])) { //trong trường hợp lấy id khi click vào link ở trang sách
    
    $id = $_GET['id'];
    
    $query = "SELECT * FROM sanpham WHERE id= '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $description = $row['description'];
        $price = $row['price'];
    } else {
        $thongbao = "có lỗi xảy ra" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
} else {
    $thongbao = "Không tìm thấy sản phẩm để cập nhật";
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
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 5px;
    }

    h2 {
        text-align: center;
    }

    .doc {
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
        font-size: medium;
        width: 460px;
    }


    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    
</style>

<body>
    <div class="container my-5">
        <h2>Cập nhật sản phẩm</h2><br>
        
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="doc">
                <label for="name"> Tên Sản phẩm</label>
                <input type="text" name="name" value="<?php echo $name; ?>" required><br>
            </div>
            <div class="doc">
                <label for="description">Mô tả</label>
                <input type="text" name="description" value="<?php echo $description; ?>" required><br>
            </div>
            <div class="doc">
                <label for="price">Giá</label>
                <input type="number" name="price" value="<?php echo $price; ?>" required><br>
            </div>
            <?php
            if (!empty($thongbao)) {
                echo "
            <div class= 'alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$thongbao</strong>
            <button type='button' class = 'btn-close' data-bs-dismiss ='alert' aria-label='Close'></button>
            </div>";
            }
            ?>
            <input type="submit" name="submit" value="Cập nhật sản phẩm"><br><br>
            <a class="btn btn-danger" href="read.php" role="button" style="width: 460px;">Trở về trang Sản phẩm</a><br>
        </form>
    </div>
</body>

</html>