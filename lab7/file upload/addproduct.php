<?php
include "conect.php";
$thongbao ="";
if (isset($_POST['submit'])) {
    $namepro = $_POST['namepro'];
    $target_dir = "uploads/";
    //đường dẫn đến thư mục lưu trữ file
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    //gán trạng thái up load file = 1(thành công)
    $uploadOk = 1;
    //lấy định dạng ảnh
    $imageFiletype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Kiểm tra xem file đã tồn tại hay chưa
    if (file_exists($target_file)) {
        $thongbao = "file đã tồn tại";
        //bật trạng thái upload khi file lỗi
        $uploadOk = 0;
    }
    //kiểm tra kích thước file
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $thongbao = "file quá lớn";
        $uploadOk = 0;
    }
    //kiểm tra định dạng file
    if ($imageFiletype != "jpg" && $imageFiletype != "png" && $imageFiletype != "jpeg" && $imageFiletype != "gif") {
        $thongbao = "chỉ chấp nhận file JPG, JPEG, PNG và GIF";
        $uploadOk = 0;
    }
    //kiểm tra nếu uploadOk = 0 , tức là có lỗi xảy ra 
    if ($uploadOk == 0) {
        $thongbao = "Tập tin không được tải lên";
    } else {
        //Di chuyển file từ thư mục tạm lên thư mục đích
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $path = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $query = " INSERT INTO product (namepro,image_url) VALUES ('$namepro','$path')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $thongbao =  "thêm sản phẩm thành công";
            } else {
                echo "có lỗi xảy ra" . mysqli_error($conn);
            }
        } else {
            $thongbao = "có lỗi xảy ra khi tải file";
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;

            margin: 0;
            padding: 20px;
        }

        .container {
            width: 500px;
            height: 400px;
            box-shadow: 1px dotted red;
        }

        a {
            text-decoration: none;
        }

        form {
            margin-top: 20px;
        }

        input[type="text"],
        input[type="file"],
        input[type="submit"] {
            display: block;
            margin-bottom: 10px;
            padding: 5px;
        }

        input[type="submit"] {
            background-color: green;
            color: white;
        }
        input[type="submit"]:hover{
            background-color: red;
            color: white;
        }
        label{
            color: red;
        }
    </style>

</head>

<body>
    <div class="container">
    <a class="btn btn-primary" role="button" href="viewproduct.php">Danh sach</a><br>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
        Name <input type="text" name="namepro" id="namepro"><br>
        <input type="file" name="fileToUpload" id="fileToUpload"><br>
        <input type="submit" name="submit" value="Upload file">
        <label for="thong bao"><?php echo $thongbao?></label>
    </form>
    </div>
</body>

</html>