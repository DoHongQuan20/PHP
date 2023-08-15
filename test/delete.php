<?php
include "connect.php" ;

if(isset($_GET['id'])){
    $id = $_GET['id'] ;

    $query = "DELETE FROM sinhven WHERE id ='$id' ";
    $result = mysqli_query($conn,$query);

    if($result){
        header("location:read.php");
        echo "xoá thành công" ;
    }else{
        echo "Invalid query :" . $conn->error;
    }
    
}
mysqli_close($conn);
?>
<?php
include "connect.php" ;
$query = " SELECT * FROM sinhven ;" ;
$result = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container my-5">
    <h2>Danh sách sinh viên</h2><br>
    <a class="btn btn-primary" href="create.php" role="button">Thêm sinh viên</a><br>
    <table class="table">
        
        <tr>
            <th>ID</th>
            <th>Họ Tên</th>
            <th>SĐT</th>
            <th colspan="2"></th>
        </tr>
        
        
        <?php
        //hiển thị danh sách 
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>" ;
            echo "<td>" . $row['id'] . "</td>" ;
            echo "<td>" . $row['hoten'] . "</td>" ;
            echo "<td>" . $row['sdt'] . "</td>" ;
            echo "<td>" ;
            echo "<a class='btn btn-primary btn-sm' href='update.php?id=".(int)($row['id'])."' >Sửa</a> " ;
            echo "<a class='btn btn-danger btn-sm' href='delete.php?id=".(int)($row['id'])."'>xoá</a> " ;
            echo "<tr>" ;
        }
        ?>
        
    </table>
    </div>
</body>
</html>