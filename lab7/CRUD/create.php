<?php
include "conect.php";

$errorMassange = "";
$successMassange = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $name = $_POST["name"];
        $description = $_POST["description"];
        $price = $_POST["price"];

        do {
            if (empty($name) || empty($description) || empty($price)) {
                $errorMassange = "Hãy điền hết tất cả các trường dữ liệu";
                break;
            }
            //add new client to database
            $query = "INSERT INTO sanpham (name , description, price )" .
                "VALUES ('$name ', '$description','$price')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $successMassange = "Thêm thành công";
            }else{
                $errorMassange = "Invalid query :" . $conn->error;
                break;
            }

            header("location: read.php");
        } while (false);
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
        <?php
        if (!empty($errorMassange)) {
            echo "
            <div class = 'alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMassange</strong>
            <button type='button' class = 'btn-close' data-bs-dismiss ='alert' aria-label='Close'></button>
            </div>";
        }
        ?>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
            <label for="name"> Tên Sản phẩm</label>
            <input type="text" name="name" required><br>
            <label for="description">Mô tả</label>
            <input type="text" name="description" required><br>
            <label for="price">Giá</label>
            <input type="number" name="price" required><br>
            <?php
            if (!empty($successMassange)) {
                echo "
            <div class= 'alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$successMassange</strong>
            <button type='button' class = 'btn-close' data-bs-dismiss ='alert' aria-label='Close'></button>
            </div>";
            }
            ?>
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