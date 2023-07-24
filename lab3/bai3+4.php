<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'xulychuoi.php' ?>
    
    <style>
        .a {
            width: 250px;
            height: fit-content;
            background-color: wheat;
            border-radius: 1px gray;

        }

        .form {
            display: flex;
            flex-direction: column;
            width: 200px;
            margin: auto;
            margin-bottom: 10px;
        }
    </style>

<body>
    <div class="a">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" class="form">
            Nhap chuoi<input type="text" name="dulieu">
            Nhap chuoi<input type="text" name="tachchuoi">
            <span>Kết quả:<?php echo $kq; ?> <br></span>
            <span>Kết quả:<?php echo $kq2; ?> <br></span>

            <input type="submit" name="hienthi" value="Hiển thị">
        </form>
    </div>
</body>

</html>