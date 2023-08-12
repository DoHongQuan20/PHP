<?php
include "connect.php";
$thongbao= "";
if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $hoten = $_POST['hoten'];
    $sdt = $_POST['sdt'];

    $query = "UPDATE sinhven SET hoten = '$hoten' , sdt ='$sdt' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

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
    $query = "SELECT * FROM sinhven WHERE id= '$id'";
    $result = mysqli_query($conn, $query);
    //ktra kết quả truy vấn 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $hoten = $row['hoten'];
        $sdt = $row['sdt'];
    } else {
        echo "có lỗi xảy ra" . mysqli_error($conn);
    }
    //đóng kết nối
    mysqli_close($conn);
} else {
    echo "Không tìm thấy sản phẩm để cập nhật";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta hoten="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật DS Sinh viên</title>
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

    
</style>

<body>
    <div class="container my-5">
        <h2>Sửa DS sinh viên</h2><br>
        <?php
        if (!empty($errorMassange)) {
            echo "
            <div class = 'alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMassange</strong>
            <button type='button' class = 'btn-close' data-bs-dismiss ='alert' aria-label='Close'></button>
            </div>";
        }
        ?>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id ;?>">
            <label for="hoten"> Họ tên</label>
            <input type="text" name="hoten" required value="<?php echo $hoten; ?>"><br>
            <label for="sdt">SĐT</label>
            <input type="number" name="sdt" required value="<?php echo $sdt; ?>"><br>
            <label for=""> <?Php echo $thongbao ;?></label>
            <input type="submit" name="submit" value="Create"><br>
            <a class='btn btn-danger'href="read.php" role="button">Cancel</a>

        </form>
    </div>
</body>

</html>