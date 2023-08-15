<?php
include "connect.php";

$thongbao = "";

    if (isset($_POST['submit'])) {
        $name = $_POST["name"];
        $description = $_POST["description"];
        $price = $_POST["price"];

        do {
            if (empty($name) || empty($description) || empty($price)) {
                $thongbao = "Hãy điền hết tất cả các trường dữ liệu";
                break;
            }
            //add new client to database
            $query = "INSERT INTO sanpham (name , description, price )" .
                "VALUES ('$name ', '$description','$price')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $thongbao = "Thêm thành công";
            }else{
                $thongbao = "Invalid query :" . $conn->error;
                break;
            }

           
        } while (false);
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <title>Thêm sản phẩm</title>
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
        <h2>Thêm sản phẩm</h2><br>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="doc">
                <label for="name"> Tên Sản phẩm</label>
                <input type="text" name="name"  required><br>
            </div>
            <div class="doc">
                <label for="description">Mô tả</label>
                <input type="text" name="description"  required><br>
            </div>
            <div class="doc">
                <label for="price">Giá</label>
                <input type="number" name="price"  required><br>
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
            <input type="submit" name="submit" value="Thêm sản phẩm"><br><br>
            <a class="btn btn-danger " href="read.php" style="width: 460px;">Trở về trang sản phẩm</a>

        </form>
    </div>
</body>

</html>
<?php
//đóng kết nối
mysqli_close($conn);
?>