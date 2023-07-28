<?php
$kq = 0;
$arrLoi = array();// tạo mảng để chứa các lỗi
$ok = true;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $so1 = $_POST["so1"];// lấy giá trị trong ô input có tên là so1
    $so2 = $_POST["so2"];
    $pheptinh = $_POST["pheptinh"];

    //kiểm tra số thứ 1
    if ($so1 === "") {//isset là hàm kiểm tra cái biến đó có gì hay không
        $arrLoi["err_so1"] = "số 1 chưa được nhập giá trị";
        $ok = false;
    } elseif (!is_numeric($so1)) {
        $arrLoi["err_so1"] = "vui lòng nhập số";
        $ok = false;
    } else {
        $arrLoi["err_so1"] = null;
        $ok = true;
    }
    //kiểm tra số thứ 2
    if ($so2 === "") {
        $arrLoi["err_so2"] = "số 2 chưa được nhập giá trị";
        $ok = false;
    } elseif (!is_numeric($so2)) {
        $arrLoi["err_so2"] = "vui lòng nhập số";
        $ok = false;
    } else {
        $arrLoi["err_so2"] = null;
        $ok = true;
    }
    //nếu thoả mãn các đk trên thì tiếp tục tinhs toán
    if ($ok == true) {
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
// tạo hàm cộng trừ nhân chia có hai tham số là s1, s2 
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
    }

    input[type="submit"] {
        width: 170px;
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

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <label for="so1">Số 1</label><br>
        <input type="text" name="so1" id="so1"> <?php isset($arrLoi["err_so1"]) ? print($arrLoi["err_so1"]) : print(""); ?><br><br>
        <label for="so2">số 2</label><br>
        <input type="text" name="so2" id="so2"> <?php isset($arrLoi["err_so2"]) ? print($arrLoi["err_so2"]) : print(""); ?><br><br>
        <label for="so2">phép tính</label><br>
        <input type="text" name="pheptinh" id="pheptinh"><br>
        <span>Kết quả : <?php echo $kq; ?></span><br>
        <input type="submit" value="="><br>
    </form>

</body>

</html>