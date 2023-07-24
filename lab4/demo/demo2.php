<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="xuly.php">
        User Name <input type="text" id="user" name="user"><br>
        <select name="myArray[]" size="3" multiple=true>
            <option value="apple">Apple</option>
            <option value="orange">Orange</option>
            <option value="banana">banana</option>
        </select>
<br>
        <input type="submit" value="Đăng kí">
    </form>
</body>

</html>