<?php include 'tinhtien.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
        so luong <input type="text" name="soluong" id="soluong"><br>
        don gia <input type="text" name="dongia" id="dongia"><br>
        <input type="submit" name="tinhtien" value="tinhtien">                                      
    </form>
</body>
</html>