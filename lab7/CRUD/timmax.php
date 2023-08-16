<?php
include "connect.php";

// Truy vấn sản phẩm có giá cao nhất
$query = "SELECT * FROM sanpham ORDER BY price DESC LIMIT 1";//thấp nhất DESC -> ASC
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin sản phẩm có giá cao nhất</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <h2>Thông tin sản phẩm có giá cao nhất</h2><br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Mô tả</th>
                    <th>Giá</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Hiển thị thông tin sản phẩm có giá cao nhất
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>";
                    echo "<a class='btn btn-success btn-sm' href='update.php?id=" . (int)($row['id']) . "' >Sửa</a> ";
                    echo "<a class='btn btn-danger btn-sm' href='delete.php?id=" . (int)($row['id']) . "'>xoá</a> ";
                    echo "<tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php
// Đóng kết nối
mysqli_close($conn);
?>