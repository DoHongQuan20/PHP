<?php
$sanpham = array("CCTV", "Computer Set", "Hard Disk", "Keyboard", "Laptop", "Meomory", "Mouse");

// Hàm để kiểm tra xem một sản phẩm có tồn tại trong mảng không
function isProductExist($product, $sanpham)
{
    return in_array($product, $sanpham);
}

// Xử lý khi người dùng nhấn nút Edit hoặc Remove
if (isset($_GET['action']) && isset($_GET['product'])) {
    $action = $_GET['action'];
    $product = $_GET['product'];

    if ($action === 'edit') {
        if (isProductExist($product, $sanpham)) {
            // Xử lý chức năng sửa ở đây (ví dụ: chuyển hướng đến trang sửa sản phẩm)
            // Ví dụ: header("Location: edit_product.php?product=$product");
            // Chú ý: Đảm bảo rằng biến $product được xử lý an toàn để tránh các lỗ hổng bảo mật (ví dụ: sử dụng hàm urlencode).
            exit;
        }
    } elseif ($action === 'remove') {
        if (isProductExist($product, $sanpham)) {
            // Xử lý chức năng xoá ở đây (ví dụ: gọi hàm để xoá sản phẩm)
            // Ví dụ: removeProduct($product);
            // Chú ý: Đảm bảo rằng biến $product được xử lý an toàn để tránh các lỗ hổng bảo mật (ví dụ: sử dụng hàm urlencode).
            // Sau khi xoá xong, bạn có thể chuyển hướng người dùng về trang hiển thị sản phẩm hoặc trang chủ.
            exit;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="css/category.css">
</head>

<body>
    <div class="container">
        <table border="3px">
            <tr class="hang1">
                <td>Name</td>
                <td colspan="2">Action</td>

            </tr>
            <?php
            for ($i = 0; $i < sizeof($sanpham); $i++) { ?>
                <tr>
                    <td><?php print($sanpham[$i]); ?></td>
                    <td> <a href="edit_product.php?action=edit&product=<?php echo urlencode($product); ?>"><img src="img/edit.jpg"  width="20px" height="20px" alt="" srcset=""> Edit</td>
                    <td> <a href="your_delete_script.php?action=remove&product=<?php echo urlencode($product); ?>"><img src="img/remove.jpg"  width="20px" height="20px" alt="" srcset=""> Remove</td>
                </tr>
            <?php }
            ?>

        </table>
    </div>
</body>

</html>