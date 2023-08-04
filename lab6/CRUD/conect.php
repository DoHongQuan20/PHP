<?php
//ket noi voi mysql
$severname = "localhost";
$username = "root";
$password = "";
$dbname = "test";
//ket nối csdl
$conn = new mysqli($severname, $username, $password, $dbname);

//kiểm trs kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
} else {
    echo "";
}
?>