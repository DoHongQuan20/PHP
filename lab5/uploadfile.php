<?php
if(isset($_POST['submit'])){
    $target_dir = "uploads/" ;
    //đường dẫn đến thư mục lưu trữ file
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    //gán trạng thái up load file = 1(thành công)
    $uploadOk = 1 ;
    //lấy định dạng ảnh
    $imageFiletype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Kiểm tra xem file đã tồn tại hay chưa
    if(file_exists($target_file)){
        echo "file đã tồn tại";
        //bật trạng thái upload khi file lỗi
        $uploadOk = 0 ;
    }
    //kiểm tra kích thước file
    if($_FILES["fileToUpload"]["size"] > 500000){
        echo "file quá lớn";
        $uploadOk = 0 ;
    }
    //kiểm tra định dạng file
    if($imageFiletype != "jpg" &&$imageFiletype != "png" &&$imageFiletype != "jpeg" &&$imageFiletype != "gif" ){
        echo "chỉ chấp nhận file JPG, JPEG, PNG và GIF";
        $uploadOk = 0;
    }
    //kiểm tra nếu uploadOk = 0 , tức là có lỗi xảy ra 
    if($uploadOk == 0){
        echo "Tập tin không được tải lên";
    }else{
        //Di chuyển file từ thư mục tạm lên thư mục đích
        if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
            echo "file" . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . "Đã được tải lên thành công" ;
        }else{
            echo "có lỗi xảy ra khi tải file" ;
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
</head>
<style>

</style>
<body>
    <h2>Upload File</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload"><br>
        <input type="submit" value="Upload File" name="submit">
    </form>
</body>
</html>