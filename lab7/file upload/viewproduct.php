<?php
include "conect.php";
//truy vấn danh sách các sp
$query = "SELECT * FROM product";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<style>
    body {
        margin-left: 350px;
    }

    table {
        width: 70%;
        border-collapse: collapse;
        align-items: center;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f4f3f2;
    }

    img {
        width: 100px;
        height: 100px;
    }
</style>

<body>
    <h2>Danh sách sản phẩm</h2><br>
    <div class="them" role="button">
    <a  class="btn btn-primary" role="button"href="addproduct.php" >Thêm sản phẩm mới</a><br>
    </div>
    <table><br>
        <tr>
            <th>ID</th>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
        </tr>
        <?php
        //hiển thị các sản phẩm từ csdl
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td> <img src='" . $row['image_url'] . "'></td>";
            echo "<td>" . $row['namepro'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>
<?php
//đóng kết nối
mysqli_close($conn);
?>