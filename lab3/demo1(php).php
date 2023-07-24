<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $soluong = $_POST['soluong'];
    $dongia = $_POST['dongia'];

    function tongtien($soluong, $dongia)
    {

        $tien = $soluong * $dongia;
        return $tien;
    }
    echo "Tong tien la" . tongtien($soluong, $dongia);
}
?>
