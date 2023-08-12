<?php
include "connect.php";
$thongbao= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $hoten = $_POST["hoten"];
        $sdt = $_POST["sdt"];
    }

    do {
        if (empty($hoten) || empty($sdt)) {
            $thongbao= "Hãy điền hết tất cả các trường dữ liệu";
            break;
        } else {

            $query = "INSERT INTO sinhven (hoten , sdt )" .
                "VALUES ('$hoten ','$sdt')";
            $result = mysqli_query($conn, $query);
        }
        if ($result) {
            $thongbao= "Thêm thành công";
        } else {
            $thongbao= "Invalid query :" . $conn->error;
            break;
        }

        header("location: read.php");
    } while (false);
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

   
</style>

<body>
    <div class="container my-5">
        <h2>Thêm sinh viên</h2><br>
        
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" >
            <label for="name"> Họ tên</label>
            <input type="text" name="hoten" required><br>
            <label for="price">SĐT</label>
            <input type="number" name="sdt" required><br>
            <label for=""><?php echo $thongbao;?></label>
            <input type="submit" name="submit" value="Create"><br>
            <a class='btn btn-danger' href="read.php" role="button">Cancel</a>

        </form>
    </div>
</body>

</html>
<?php
//đóng kết nối
mysqli_close($conn);
?>