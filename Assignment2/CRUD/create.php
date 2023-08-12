<?php
include "connect.php";
$thongbao ="";
$thongbao2 ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $name = $_POST["name"];
        $target_dir = "uploads/";
        $description = $_POST["description"];
        $price = $_POST["price"];
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        //gán trạng thái up load file = 1(thành công)
        $uploadOk = 1;
        //lấy định dạng ảnh
        $imageFiletype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Kiểm tra xem file đã tồn tại hay chưa
        if (file_exists($target_file)) {
            $thongbao2 = "file đã tồn tại";
            //bật trạng thái upload khi file lỗi
            $uploadOk = 0;
        }
        //kiểm tra kích thước file
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $thongbao2 = "file quá lớn";
            $uploadOk = 0;
        }
        //kiểm tra định dạng file
        if ($imageFiletype != "jpg" && $imageFiletype != "png" && $imageFiletype != "jpeg" && $imageFiletype != "gif") {
            $thongbao2 = "chỉ chấp nhận file JPG, JPEG, PNG và GIF";
            $uploadOk = 0;
        }
        //kiểm tra nếu uploadOk = 0 , tức là có lỗi xảy ra 
        if ($uploadOk == 0) {
            $thongbao = "Tập tin không được tải lên";
        } else {

            do {
                if (empty($name) || empty($description) || empty($price)) {
                    $thongbao ="Hãy điền hết tất cả các trường dữ liệu";
                    break;
                }
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $path = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                    //add new client to database
                    $query = "INSERT INTO sanpham2 (name ,image_url,description, price )" .
                        "VALUES ('$name ','$path' ,'$description','$price')";
                    $result = mysqli_query($conn, $query);
                }
                if ($result) {
                    $thongbao = "Thêm thành công";
                } else {
                    $thongbao = "Invalid query :" . $conn->error;
                    break;
                }

                header("location: read.php");
            } while (false);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
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
        <h2>Thêm sản phẩm</h2><br>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" enctype="multipart/form-data">
            <label for="name"> Tên Sản phẩm</label>
            <input type="text" name="name" required><br>
            <input type="file" name="fileToUpload" required><br>
            <label for="description">Mô tả</label>
            <input type="text" name="description" required><br>
            <label for="price">Giá</label>
            <input type="number" name="price" required><br>
            <label for=""><?php echo $thongbao;?></label>
            <label for=""><?php echo $thongbao2;?></label>
            <input type="submit" name="submit" value="create"><br>
            <a class="cancel" href="read.php" role="button">Cancel</a>

        </form>
    </div>
</body>

</html>
<?php
//đóng kết nối
mysqli_close($conn);
?>