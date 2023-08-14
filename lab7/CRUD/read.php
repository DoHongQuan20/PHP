<?php
include "connect.php" ;
//truy vấn danh sách các sản phẩm
$query = "SELECT * FROM sanpham";
$result = mysqli_query($conn ,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
    <h2>Danh sách sản phẩm</h2><br>
    <a class="btn btn-primary" href="create.php" role="button">Thêm sản phẩm mới</a><br>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Mô tả</th>
            <th>Giá</th>
            <th colspan="2"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        //hiển thị danh sách 
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>" ;
            echo "<td>" . $row['id'] . "</td>" ;
            echo "<td>" . $row['name'] . "</td>" ;
            echo "<td>" . $row['description'] . "</td>" ;
            echo "<td>" . $row['price'] . "</td>" ;
            echo "<td>" ;
            echo "<a class='btn btn-primary btn-sm' href='update.php?id=".(int)($row['id'])."' >Sửa</a> " ;
            echo "<a class='btn btn-danger btn-sm' href='delete.php?id=".(int)($row['id'])."'>xoá</a> " ;
            echo "<tr>" ;
        }
        ?>
        </tbody>
    </table>
    </div>
</body>
</html>
<?php
//đóng kết nối
mysqli_close($conn);
?>