<?php
include "conect.php" ;

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $query = "DELETE FROM sanpham WHERE id= '$id'";
    mysqli_query($conn,$query);
    $result = mysqli_query($conn,$query);

    if ($result) {
        echo "Xoá thành công" ;
        header('location : read.php');
    }else{
        echo "Invalid query :" . $conn->error;
    }
}
// đóng kết nối
mysqli_close($conn);
?>
