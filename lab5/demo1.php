<?php
$thongbao = "";
$kq = 0;
$arrLoi = array();
$ok = true ;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $so1 = $_POST["so1"];
    $so2 = $_POST["so2"];
    $pheptinh = $_POST["pheptinh"];
    if (empty($so1) && empty($so1) && empty($pheptinh)) {
        $thongbao = "không được để trống";
    } elseif (ctype_alpha($so1)) {
        $thongbao = "vui lòng nhập số";
    } elseif (ctype_alpha($so2)) {
        $thongbao = "vui lòng nhập số";
    } else {

        if ($pheptinh === "+") {
            $kq = cong($so1, $so2);
        } elseif ($pheptinh === "-") {
            $kq = tru($so1, $so2);
        } elseif ($pheptinh === "*") {
            $kq = nhan($so1, $so2);
        } elseif ($pheptinh === "/") {
            $kq = chia($so1, $so2);
        }
    }
}

function cong($s1, $s2)
{
    return $s1 + $s2;
}
function tru($s1, $s2)
{
    return $s1 - $s2;
}
function nhan($s1, $s2)
{
    return $s1 * $s2;
}
function chia($s1, $s2)
{
    return $s1 / $s2;
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
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        width: 160px;
    }

    form {
        width: 160px;
        display: flex;
        flex-direction: column;

    }

    .nut {
        display: flex;
        flex-direction: row;
        margin-top: 5px;
    }

    input[type="submit"] {
        width: 100%;
        padding: 5px;
        margin-top: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 3px;
    }

    span {
        color: red;
    }
</style>

<body>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
            <label for="so1">Số 1</label>
            <input type="text" name="so1" id="so1"><br>
            <label for="so2">số 2</label>
            <input type="text" name="so2" id="so2"><br>
            <label for="so2">phép tính</label>
            <input type="text" name="pheptinh" id="pheptinh">
            <span class="thongbao"><?php echo $thongbao; ?></span>
            <span>Kết quả : <?php echo $kq; ?></span>

            <input type="submit" value="=">
        </form>
    </div>
</body>

</html>